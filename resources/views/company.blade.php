@extends('layouts.app')

@section('title', 'Company')
@section('companyActive', 'active')
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
            content: "\f040";
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
                                <h5 class="card-title text-primary">Companies</h5>
                            </div>
                            @if (Auth::user()->role_id == 2)
                                <div>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew"><i
                                            class="bx bx-plus"></i> Add New</button>
                                </div>
                            @endif
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
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Website</th>
                                        <th>Colors</th>
                                        <th>Landing</th>
                                        <th style="width: 100px;">Status</th>
                                        <th style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($companies as $company)
                                        @if ($company->id == Auth::user()->user_linked_id or Auth::user()->role_id == 2)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    <img src="{{ asset('img/logo/' . $company->logo) }}"
                                                        style="max-width: 50px;border-radius: 10px;" alt="">
                                                </td>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->address_line1 . ' ' . $company->address_line2 . ' ' . $company->state . ', ' . $company->zip_code }}
                                                </td>
                                                <td> <a href="{{ $company->website }}" target="_blank">Website</a></td>
                                                <td>
                                                    @php
                                                        $colors = explode(', ', $company->color);
                                                    @endphp
                                                    <div class="d-flex colors">
                                                        <div class="col"
                                                            style="background-color: {{ $colors[0] }}"></div>
                                                        <div class="col"
                                                            style="background-color: {{ $colors[1] }}"></div>
                                                        <div class="col"
                                                            style="background-color: {{ $colors[2] }}"></div>
                                                    </div>
                                                </td>
                                                <td><a href="{{ route('clp', $company->slug) }}" target="_blank">Landing
                                                        Page</a></td>
                                                <td>
                                                    @if ($company->status == 1)
                                                        <i class="fas fa-check text-success"></i>
                                                    @else
                                                        <i class="fas fa-times text-danger"></i>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div>
                                                            <a href="javascript:void(0)"
                                                                onclick="openEditModal({{ $company->id }})"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="bx bx-edit"></i></a>
                                                        </div>

                                                        <div class="mx-1">
                                                            <form method="post"
                                                                action="{{ route('company.destroy', $company->id) }}">
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
                    <form action="{{ route('company.store') }}" id="companyForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="avatar-upload addNewCompany">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="logo" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url('{{ asset('img/logo/default-logo.png') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Company Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Enter Company Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="slogan" class="form-label">Slogan</label>
                                <input type="text" id="slogan" name="slogan" class="form-control"
                                    placeholder="Enter Company Slogan">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Company Email</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="xxxx@xx.xxx">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="password" class="form-label">Company Password</label>
                                <input type="text" id="password" name="password" class="form-control"
                                    placeholder="******">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="website" class="form-label">Company Website</label>
                                <input type="text" id="website" name="website" class="form-control" placeholder="xxxx.xx">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address_line1" class="form-label">Address Line 1</label>
                                <input type="text" id="address_line1" name="address_line1" class="form-control"
                                    placeholder="Address line 1">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address_line2" class="form-label">Address Line 2</label>
                                <input type="text" id="address_line2" name="address_line2" class="form-control"
                                    placeholder="Address line 2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control"
                                    placeholder="Enter City of company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" id="state" name="state" class="form-control"
                                    placeholder="Enter state of company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" id="country" name="country" class="form-control"
                                    placeholder="Enter country of company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" id="zip_code" name="zip_code" class="form-control"
                                    placeholder="Enter zip_code of company">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="color1" class="form-label">Color 1</label>
                                <input type="color" id="color1" name="color1" class="form-control"
                                    placeholder="Select Company 1st color">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="color2" class="form-label">Color 2</label>
                                <input type="color" id="color2" name="color2" class="form-control"
                                    placeholder="Select Company 2nd color">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="color3" class="form-label">Color 3</label>
                                <input type="color" id="color3" name="color3" class="form-control"
                                    placeholder="Select Company 3rd color">
                            </div>
                            <div class="col-md-12 mb-3">
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

    <!-- Modal -->
    <div class="modal fade" id="updateData" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addNewTitle">Update Company - <span id="companyName"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="companyUpdateForm" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="avatar-upload updatedCompany">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" onchange="getEditedLogo()" name="logo"
                                    accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url('{{ asset('img/logo/default-logo.png') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Company Name</label>
                                <input type="text" id="name" name="name" class="form-control name"
                                    placeholder="Enter Company Name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="slogan" class="form-label">Slogan</label>
                                <input type="text" id="slogan" name="slogan" class="form-control slogan"
                                    placeholder="Enter Company Slogan">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="website" class="form-label">Company Website</label>
                                <input type="text" id="website" name="website" class="form-control website"
                                    placeholder="xxxx.xx">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Company Email</label>
                                <input type="email" id="email" name="email" class="form-control company_email"
                                    placeholder="xxxx@xx.xxx">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address_line1" class="form-label">Address Line 1</label>
                                <input type="text" id="address_line1" name="address_line1"
                                    class="form-control address_line1" placeholder="Address line 1">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="address_line2" class="form-label">Address Line 2</label>
                                <input type="text" id="address_line2" name="address_line2"
                                    class="form-control address_line2" placeholder="Address line 2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" id="city" name="city" class="form-control city"
                                    placeholder="Enter City of company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" id="state" name="state" class="form-control state"
                                    placeholder="Enter state of company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" id="country" name="country" class="form-control country"
                                    placeholder="Enter country of company">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" id="zip_code" name="zip_code" class="form-control zip_code"
                                    placeholder="Enter zip_code of company">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="color1" class="form-label">Color 1</label>
                                <input type="color" id="color1" name="color1" class="form-control color1"
                                    placeholder="Select Company 1st color">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="color2" class="form-label">Color 2</label>
                                <input type="color" id="color2" name="color2" class="form-control color2"
                                    placeholder="Select Company 2nd color">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="color3" class="form-label">Color 3</label>
                                <input type="color" id="color3" name="color3" class="form-control color3"
                                    placeholder="Select Company 3rd color">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select id="status" name="status" class="form-control form-select companyStatus">
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
        $(".addNewCompany #imageUpload").change(function() {
            debugger
            readURL(this, 'addNewCompany');
        });

        function getEditedLogo() {
            readURL(this, 'updatedCompany');
        }
        // $(".updatedCompany .imageUpload").change(function() {
        //     debugger

        // });

        function openEditModal(company_id) {
            $.ajax({
                url: '{{ route('getCompany') }}',
                type: 'post',
                data: {
                    company_id: company_id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(res) {
                    $('#companyName').text(res['name'])
                    $('.name').val(res['name'])
                    $('.website').val(res['website'])
                    $('.address_line1').val(res['address_line1'])
                    $('.slogan').val(res['slogan'])
                    $('.city').val(res['city'])
                    $('.state').val(res['state'])
                    $('.country').val(res['country'])
                    $('.zip_code').val(res['zip_code'])
                    let colors = res['color'].split(", ")
                    $('.color1').val(colors[0])
                    $('.color2').val(colors[1])
                    $('.color3').val(colors[2])
                    $('.company_email').val(res['email'])
                    $(`.companyStatus option[value=${res['status']}]`).attr('selected', 'selected');
                    let company_id = res['id'];
                    let url = "{{ route('company.update', ':id') }}";
                    url = url.replace(':id', company_id);
                    console.log(url);
                    $('#companyUpdateForm').attr('action', url);
                }
            })

            $('#updateData').modal('show');
        }
    </script>
@endsection
