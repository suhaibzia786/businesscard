@extends('layouts.app')

@section('title', 'Business Card Templates')
@section('templateActive', 'active')
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
            height: 170px;
            position: relative;
            /* border-radius: 100%; */
            /* border: 6px solid #F8F8F8;
                                                                                                                                                                                        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1); */
        }

        .avatar-upload .avatar-preview>div {
            width: 100%;
            height: 100%;
            /* border-radius: 100%; */
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

        .color {
            width: 25px;
            height: 25px;
            margin-left: 5px
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
                                <h5 class="card-title text-primary">Card Templates</h5>
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
                                        <th>Title</th>
                                        <th>Color</th>
                                        <th>Font Family</th>
                                        <th>Logo Position</th>
                                        <th>Has QrCode</th>
                                        <th>Sample Image</th>
                                        <th style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($templates as $template)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $template->title }}</td>
                                            <td>
                                                <div class="color"
                                                    style="background-color: {{ $template->color }}">
                                                </div>
                                            </td>
                                            <td style="font-family: {{ $template->font_family }}">
                                                {{ $template->font_family }}</td>
                                            <td>{{ ucfirst($template->logo_position) }}</td>
                                            <td>{{ $template->has_qrCode == 1 ? 'Yes' : 'No' }}</td>
                                            <td>
                                                <img src="{{ asset('img/business_card/' . $template->sample_image) }}"
                                                    style="max-width: 80px;border-radius: 10px;" alt="">
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <div>
                                                        <a href="javascript:void(0)"
                                                            onclick="openEditModal({{ $template->id }})"
                                                            class="btn btn-info btn-sm"><i class="bx bx-edit"></i></a>
                                                    </div>

                                                    <div class="mx-1">
                                                        <form method="post"
                                                            action="{{ route('template.destroy', $template->id) }}">
                                                            @method('Delete')
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
                    <h5 class="modal-title" id="addNewTitle">Add Card Template</h5>
                    <button type="button" onclick="$('#cardTemplateForm').reset()" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('template.store') }}" id="cardTemplateForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="avatar-upload addNewCompany">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="sample_image" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url('{{ asset('img/business_card/sample1.png') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Template Tilte</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter Template Title">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="color" class="form-label">Template Color</label>
                                <input type="color" id="color" name="color" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="font_family" class="form-label">Font Family</label>
                                <select type="text" id="font_family" name="font_family"
                                    class="form-control form-select custom-select">
                                    <option value="Arial, sans-serif" style="font-family: Arial, sans-serif">Arial
                                        (sans-serif)</option>
                                    <option value="Verdana, sans-serif" style="font-family: Verdana, sans-serif">Verdana
                                        (sans-serif)</option>
                                    <option value="Helvetica, sans-serif" style="font-family: Helvetica, sans-serif">
                                        Helvetica (sans-serif)</option>
                                    <option value="Tahoma, sans-serif" style="font-family: Tahoma, sans-serif">Tahoma
                                        (sans-serif)</option>
                                    <option value="'Trebuchet MS', sans-serif"
                                        style="font-family: 'Trebuchet MS', sans-serif">Trebuchet MS (sans-serif)</option>
                                    <option value="'Times New Roman', serif" style="font-family: 'Times New Roman', serif">
                                        Times New Roman (serif)</option>
                                    <option value="Georgia, serif" style="font-family: Georgia, serif">Georgia (serif)
                                    </option>
                                    <option value="Garamond, serif" style="font-family: Garamond, serif">Garamond (serif)
                                    </option>
                                    <option value="'Courier New', monospace" style="font-family: 'Courier New', monospace">
                                        Courier New (monospace)</option>
                                    <option value="'Brush Script MT', cursive"
                                        style="font-family: 'Brush Script MT', cursive">Brush Script MT (cursive)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="logo_position" class="form-label">Logo Position</label>
                                <select type="text" id="logo_position" name="logo_position"
                                    class="form-control form-select custom-select">
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="top">Top</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="has_qrCode" class="form-label">Has Qr Code</label>
                                <select type="text" id="has_qrCode" name="has_qrCode"
                                    class="form-control form-select custom-select">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
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
                    <h5 class="modal-title" id="addNewTitle">Update Template - <span id="templateTitle"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="templateUpdateForm" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="avatar-upload addNewCompany">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" class="sample_image" name="sample_image"
                                    accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview"
                                    style="background-image: url('{{ asset('img/business_card/sample1.png') }}');">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Template Tilte</label>
                                <input type="text" id="title" name="title" class="form-control title"
                                    placeholder="Enter Template Title">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="color" class="form-label">Template Color</label>
                                <input type="color" id="color" name="color" class="form-control card_color">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="font_family" class="form-label">Font Family</label>
                                <select type="text" id="font_family" name="font_family"
                                    class="form-control form-select custom-select font_family">
                                    <option value="Arial, sans-serif" style="font-family: Arial, sans-serif">Arial
                                        (sans-serif)</option>
                                    <option value="Verdana, sans-serif" style="font-family: Verdana, sans-serif">Verdana
                                        (sans-serif)</option>
                                    <option value="Helvetica, sans-serif" style="font-family: Helvetica, sans-serif">
                                        Helvetica (sans-serif)</option>
                                    <option value="Tahoma, sans-serif" style="font-family: Tahoma, sans-serif">Tahoma
                                        (sans-serif)</option>
                                    <option value="'Trebuchet MS', sans-serif"
                                        style="font-family: 'Trebuchet MS', sans-serif">Trebuchet MS (sans-serif)</option>
                                    <option value="'Times New Roman', serif" style="font-family: 'Times New Roman', serif">
                                        Times New Roman (serif)</option>
                                    <option value="Georgia, serif" style="font-family: Georgia, serif">Georgia (serif)
                                    </option>
                                    <option value="Garamond, serif" style="font-family: Garamond, serif">Garamond (serif)
                                    </option>
                                    <option value="'Courier New', monospace" style="font-family: 'Courier New', monospace">
                                        Courier New (monospace)</option>
                                    <option value="'Brush Script MT', cursive"
                                        style="font-family: 'Brush Script MT', cursive">Brush Script MT (cursive)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="logo_position" class="form-label">Logo Position</label>
                                <select type="text" id="logo_position" name="logo_position"
                                    class="form-control form-select custom-select logo_position">
                                    <option value="left">Left</option>
                                    <option value="right">Right</option>
                                    <option value="top">Top</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="has_qrCode" class="form-label">Has Qr Code</label>
                                <select type="text" id="has_qrCode" name="has_qrCode"
                                    class="form-control form-select custom-select has_qrCode">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
            readURL(this, 'addNewCompany');
        });
        $(".updateCompany #imageUpload").change(function() {
            readURL(this, 'updateCompany');
        });

        function openEditModal(template_id) {
            $.ajax({
                url: '{{ route('getCartTemplate') }}',
                type: 'post',
                data: {
                    template_id: template_id,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: 'json',
                success: function(res) {
                    $('#templateTitle').text(res['title'])
                    $('.title').val(res['title'])
                    $('.card_color').val(res['color'])
                    $('.font_family').val(res['font_family'])
                    $('.logo_position').val(res['logo_position'])
                    $('.has_qrCode').val(res['has_qrCode'])
                    let template_id = res['id'];
                    let url = "{{ route('template.update', ':id') }}";
                    url = url.replace(':id', template_id);
                    console.log(url);
                    $('#templateUpdateForm').attr('action', url);
                }
            })

            $('#updateData').modal('show');
        }
    </script>
@endsection
