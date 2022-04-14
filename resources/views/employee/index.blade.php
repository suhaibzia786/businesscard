@extends('layouts.app')

@section('title', 'Employees')
@section('employeeActive', 'active')
@section('customCss')
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
<!-- Form Validation -->
<link rel="stylesheet" href="{{ asset('vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<!-- 'classic' theme -->
<link rel="stylesheet" href="css/pick-a-color-1.2.3.min.css">

<style>
.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 0 auto;
}

.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}

.avatar-upload .avatar-edit input {
    display: none;
}

.avatar-upload .avatar-edit input+label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}

.avatar-upload .avatar-edit input+label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
}

.avatar-upload .avatar-edit input+label:after {
    /* background: url(https://i.stack.imgur.com/5Vv2z.png) no-repeat;
                                                        background-position: 0 0; */
    content: "\f030";
    font-family: 'FontAwesome';
    color: #757575;
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
}

.avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

.avatar-upload .avatar-preview>div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

.colors div {
    width: 25px;
    height: 25px;
    margin-left: 5px
}

.status {
    padding: 5px;
    text-align: center;
    border-radius: 30px;
    color: white;
    font-weight: 500;
}

input[type="color"] {
    height: 60px;
}
</style>
@endsection
@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center border-bottom pb-4">
                        <div>
                            <h5 class="card-title text-primary">Employees</h5>
                        </div>
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew"><i
                                    class="bx bx-plus"></i> Add New Employee</button>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible mt-2">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                    @endif
                    <div class="card-datatable table-responsive">
                        <table class="dataList table border-top">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    {{-- <th>Cards</th> --}}
                                    <th style="width: 120px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($employees as $employee)
                                @if ($employee->company_id == Auth::user()->user_linked_id or Auth::user()->role_id ==
                                2)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <img src="{{ asset('img/avatars/' . $employee->photo) }}"
                                            style="max-width: 50px;border-radius: 10px;" alt="">
                                    </td>
                                    <td>{{ $employee->first_name . ' ' . $employee->last_name }}</td>
                                    <td>
                                        {{ 'Mobile:' . $employee->mobile }} <br>
                                        {{ 'Fax:' . $employee->fax }} <br>
                                        {{ 'Office:' . $employee->office_phone }}
                                    </td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td class="text-center">
                                        @if ($employee->employeeStatus == 1)
                                        <i class="fas fa-check text-success"></i>
                                        @else
                                        <i class="fas fa-times text-danger"></i>
                                        @endif
                                    </td>
                                    {{-- <td>
                                                    <a href="{{ route('downloadVCard', $employee->employee_id) }}"
                                    data-bs-toggle="tooltip" data-bs-offset="0,4"
                                    data-bs-placement="top" data-bs-html="true" title=""
                                    data-bs-original-title="<i class='fas fa-address-card'></i> <span>Download
                                        VCard</span>">
                                    <i class="fas fa-address-card mt-2 text-primary" style="font-size: 20px;"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                        data-bs-placement="top" data-bs-html="true" title=""
                                        data-bs-original-title="<i class='fas fa-id-card-alt' ></i> <span>Download Business Card</span>">
                                        <i class="fas fa-id-card-alt text-danger"
                                            onclick="downloadCard(
                                                                                                                                                                    '{{ $employee->first_name }}',
                                                                                                                                                                    '{{ $employee->last_name }}',
                                                                                                                                                                    '{{ $employee->office_phone }}',
                                                                                                                                                                    '{{ $employee->email }}',
                                                                                                                                                                    '{{ $employee->website }}')"
                                            style="font-size: 20px;"></i>
                                    </a>
                                    </td> --}}
                                    <td>
                                        <div class="d-flex">
                                            <div>
                                                <a href="javascript:void(0)"
                                                    onclick="openEditModal({{ $employee->employee_id }})"
                                                    class="btn btn-info btn-sm"><i class="bx bx-edit"></i>
                                                </a>
                                            </div>
                                            <div class="mx-1">
                                                <form method="post"
                                                    action="{{ route('employee.destroy', $employee->employee_id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Content -->

<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="addNewTitle">Add New Company</h5>
                <button type="button" onclick="$('#companyForm').reset()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employee.store') }}" id="companyForm" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="avatar-upload addNewEmployee">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                style="background-image: url('{{ asset('img/avatars/default-avatar.jpg') }}');">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control"
                                placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="office_phone" class="form-label">Office Phone</label>
                            <input type="number" id="office_phone" name="office_phone" class="form-control"
                                placeholder="Office Phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" name="mobile" class="form-control"
                                placeholder="Enter Mobile Number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="number" id="fax" name="fax" class="form-control" placeholder="Enter Fax">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="city" name="email" class="form-control" placeholder="abc@xyz.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="city" name="password" class="form-control" placeholder="******">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="company_id" class="form-label">Company</label>
                            <select id="company_id" name="company_id" class="form-control form-select">
                                <option value="">Select Company</option>
                                @foreach ($Companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control form-select">
                                <option value="1">Active</option>
                                <option value="0">NotActive</option>
                            </select>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updateData" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="addNewTitle">Update Employee - <span id="employeeName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="employeeUpdateForm" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="avatar-upload updateEmployee">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" name="profile" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview"
                                style="background-image: url('{{ asset('img/avatars/default-avatar.jpg') }}');">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control first_name"
                                placeholder="Enter First Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control last_name"
                                placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="office_phone" class="form-label">Office Phone</label>
                            <input type="number" id="office_phone" name="office_phone" class="form-control office_phone"
                                placeholder="Office Phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" name="mobile" class="form-control mobile"
                                placeholder="Enter Mobile Number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fax" class="form-label">Fax</label>
                            <input type="number" id="fax" name="fax" class="form-control fax" placeholder="Enter Fax">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="city" name="email" class="form-control email"
                                placeholder="abc@xyz.com">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="company_id" class="form-label">Company</label>
                            <select id="company_id" name="company_id" class="form-control form-select company_id">
                                <option value="">Select Company</option>
                                @foreach ($Companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" name="status" class="form-control form-select employeeStatus">
                                <option value="1">Active</option>
                                <option value="0">NotActive</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="card_contentd d-none">
    <style>
    @font-face {
        font-family: "NovecentoSansW01-Book";
        src: url("//db.onlinewebfonts.com/t/d99084331b93ea456d1d0f9ce08b7777.eot");
        src: url("//db.onlinewebfonts.com/t/d99084331b93ea456d1d0f9ce08b7777.eot?#iefix") format("embedded-opentype"), url("//db.onlinewebfonts.com/t/d99084331b93ea456d1d0f9ce08b7777.woff2") format("woff2"), url("//db.onlinewebfonts.com/t/d99084331b93ea456d1d0f9ce08b7777.woff") format("woff"), url("//db.onlinewebfonts.com/t/d99084331b93ea456d1d0f9ce08b7777.ttf") format("truetype"), url("//db.onlinewebfonts.com/t/d99084331b93ea456d1d0f9ce08b7777.svg#NovecentoSansW01-Book") format("svg");
    }

    .bcard_body {
        /* width: 41.66666667%; */
        width: 1050px;
        height: 600px;
        border-radius: 0.375rem !important;
        border: 1px solid #d9dee3 !important;
    }

    .bcard_body>div {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    .bcard_body>div>div {
        padding: 1rem !important;
    }

    .textDiv {
        text-align: right;
        font-family: NovecentoSansW01-Book;
        margin-top: 1rem !important;
        margin-bottom: 1rem !important;
        margin-right: 3rem !important;
        margin-left: 3rem !important;
    }

    .textDiv h3 {
        font-weight: 600
    }

    .textDiv h6 {
        font-weight: 500
    }

    .bcard_body p {
        text-align: center;
    }
    </style>
    <div class="bcard_body">
        <div>
            <div>
                <img src="{{ asset('img/qrcodes/1646664151.png') }}" id="EmployeeVCardQR" alt="">
            </div>
            <div class="textDiv">
                <h3 id="EmployeeName">Syed Suhaib Zia</h3>
                <h6 id="OfficePhone">+923159408906</h6>
                <h6 id="OfficeEmail">suhaibzia786@gmail.com</h6>
            </div>
        </div>
        <p id="CompanyWebsite">www.suhaibzia.com</p>
    </div>
</div>


@endsection

@section('customJs')
<script src="{{ asset('vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
<script src="{{ asset('vendor/libs/jszip/jszip.js') }}"></script>
<script src="{{ asset('vendor/libs/pdfmake/pdfmake.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
<script src="{{ asset('vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
<!-- Flat Picker -->
<script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
<!-- Form Validation -->
<script src="{{ asset('vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>

<script src="js/tinycolor-0.9.14.min.js"></script>
<script src="js/pick-a-color-1.2.3.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.6/purify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
$(document).ready(function() {
    $('.dataList').DataTable();
})

function readURL(input, type) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(`.${type} #imagePreview`).css('background-image', 'url(' + e.target.result + ')');
            $(`.${type} #imagePreview`).hide();
            $(`.${type} #imagePreview`).fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(".updateEmployee #imageUpload").change(function() {
    readURL(this, 'updateEmployee');
});
$(".addNewEmployee #imageUpload").change(function() {
    readURL(this, 'updateEmployee');
});

function openEditModal(employee_id) {
    $.ajax({
        url: '{{ route('getEmployee') }}',
        type: 'post',
        data: {
            employee_id: employee_id,
            "_token": "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(res) {
            $('#employeeName').text(res['first_name'] + " " + res['last_name'])
            $('.first_name').val(res['first_name'])
            $('.last_name').val(res['last_name'])
            $('.office_phone').val(res['office_phone'])
            $('.fax').val(res['fax'])
            $('.mobile').val(res['mobile'])
            $('.email').val(res['email'])
            $('.employeeStatus').val(res['status']);
            $('.compnay_id').val(res['compnay_id']);
            let employee_id = res['id'];
            let url = "{{ route('employee.update', ':id') }}";
            url = url.replace(':id', employee_id);
            // console.log(url);
            $('#employeeUpdateForm').attr('action', url);
        }
    })

    $('#updateData').modal('show');
}

function downloadCard(firstName, lastName, Phone, Email, Website) {
    var EmployeeName = $('#EmployeeName');
    var OfficePhone = $('#OfficePhone');
    var officeEmail = $('#OfficeEmail');
    var CompanyWebsite = $('#CompanyWebsite');
    EmployeeName.empty();
    OfficePhone.empty();
    officeEmail.empty();
    CompanyWebsite.empty();

    EmployeeName.text(firstName + ' ' + lastName)
    OfficePhone.text(Phone)
    officeEmail.text(Email)
    CompanyWebsite.text(Website)
    var cardHtml = $('.card_content').html();

    var divContents = $("#dvContainer").html();
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Print or Save Card</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(cardHtml);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    // window.jsPDF = window.jspdf.jsPDF;
    // var doc = new jsPDF('landscape');
    // doc.html(cardHtml, {
    //     callback: function(doc) {
    //         doc.save();
    //     },
    //     x: 10,
    //     y: 10
    // });
}

// $(function() {
//     $('form.my_form').submit(function(event) {
//         event.preventDefault(); // Prevent the form from submitting via the browser
//         var form = $(this);
//         $.ajax({
//             type: form.attr('method'),
//             url: form.attr('action'),
//             data: form.serialize()
//         }).done(function(data) {
//             // Optionally alert the user of success here...
//         }).fail(function(data) {
//             // Optionally alert the user of an error here...
//         });
//     });
// });
</script>
@endsection