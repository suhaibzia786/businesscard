@extends('layouts.app')

@section('title', 'All Cards')
@section('cardActive', 'active')
@section('customCss')
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
    <style>
        .bussiness-card {
            width: 1050px;
            height: 600px;
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
                                <h5 class="card-title text-primary">All Cards</h5>
                            </div>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCardModal"><i
                                        class="bx bx-plus"></i> Add New Card</button>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Template Name</th>
                                        <th style="width: 120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($cards as $card)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $card->first_name }}</td>
                                            <td>{{ $card->last_name }}</td>
                                            <td>{{ $card->template_id }}</td>
                                            <td>
                                                <a href="{{ route('downloadVCard', $card->employee_id) }}"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                    data-bs-html="true" title=""
                                                    data-bs-original-title="<i class='fas fa-address-card' ></i> <span>Download VCard</span>">
                                                    <i class="fas fa-address-card mt-2 text-primary"
                                                        style="font-size: 20px;"></i>
                                                </a>
                                                <a href="{{ route('getBCard', [$card->company_slug, $card->slug]) }}"
                                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                    data-bs-html="true" title=""
                                                    data-bs-original-title="<i class='bx bx-bell bx-xs' ></i> <span>View Business Card</span>"><i
                                                        class="fas fa-id-card text-info" style="font-size: 20px;"></i></a>
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
    <div class="modal fade" id="cardModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addNewTitle">Print Card</h5>
                    <button type="button" onclick="$('#companyForm').reset()" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="business-card">
                        <img src="{{ asset('img/card.png') }}" class="m-auto"
                            style="width: 700px; border:1px solid black" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newCardModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addNewTitle">Generate Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('card.store') }}" id="companyForm" method="post">
                        @csrf
                        <div class="card_sample text-center">
                            <img src="{{ asset('img/business_card/sample1.png') }}"
                                style="max-width: 50%;border:1px solid black" alt="">
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="template_id" class="form-label">Template</label>
                                <select id="template_id" name="template_id" onchange="changeTemplateView($(this))"
                                    class="form-control form-select">
                                    <option value="">Select Template</option>
                                    @foreach ($templates as $template)
                                        <option value="{{ $template->id }}">{{ $template->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="employee_id" class="form-label">Employee/Team</label>
                                <select id="employee_id" name="employee_id" class="form-control form-select">
                                    <option value="">Select Employee/Team</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">
                                            {{ $employee->first_name . ' ' . $employee->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="border-top"
                            style="display: flex;flex-wrap: wrap;flex-shrink: 0;align-items: center;justify-content: flex-end;">
                            <button type="reset" class="btn btn-label-secondary mt-3 mx-3"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary mt-3">Generate</button>
                        </div>
                    </form>
                </div>
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

    <script>
        $(document).ready(function() {
            $('.dataList').DataTable();
        })

        function openModal(employee_id) {
            $('#cardModal').modal('show')
        }

        function changeTemplateView(value) {
            var template_id = value.val();
            // console.log(template_id);
            if (template_id !== '') {
                $.ajax({
                    url: '{{ route('getCartTemplate') }}',
                    type: 'post',
                    data: {
                        template_id: template_id,
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: 'json',
                    success: function(res) {
                        // console.log(res);
                        let url = "{{ asset('img/business_card/:id') }}";
                        url = url.replace(':id', res['sample_image']);
                        $('.card_sample img').attr('src', url)
                    }
                })
            } else {
                let url = "{{ asset('img/business_card/sample1.png') }}";;
                $('.card_sample img').attr('src', url)
            }
        }
    </script>
@endsection
