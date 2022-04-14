@extends('layouts.app')

@section('title', 'Dashbard')
@section('customCss')
    <style>
        .dashboard_nav div {
            padding: 7px;
        }

    </style>
@endsection
@section('dashboardActive', 'active')
@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (Auth::user()->role_id == 2)
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center border-bottom mb-3 text-primary">Quick Links</h5>
                            <div class="d-flex dashboard_nav w-100">
                                <div class="w-100">
                                    <a href="{{ route('company.index') }}"
                                        class="d-flex flex-column justify-content-center">
                                        <div class="badge badge-center bg-label-primary p-4 m-auto">
                                            <i class="bx bx-building fs-5"></i>
                                        </div>
                                        <p class="text-center my-1">Add Company</p>
                                    </a>
                                </div>
                                <div class="w-100">
                                    <a href="" class="d-flex flex-column justify-content-center">
                                        <div class=" badge badge-center bg-label-secondary p-4 m-auto">
                                            <i class="bx bxs-id-card fs-5"></i>
                                        </div>
                                        <p class="text-center my-1 text-secondary">New Card</p>
                                    </a>
                                </div>
                                <div class="w-100">
                                    <a href="" class="d-flex flex-column justify-content-center">
                                        <div class=" badge badge-center bg-label-success p-4 m-auto">
                                            <i class="bx bx-purchase-tag-alt fs-5"></i>
                                        </div>
                                        <p class="text-center my-1 text-success">Subscriptions</p>
                                    </a>
                                </div>
                                <div class="w-100">
                                    <a href="{{ route('company.index') }}"
                                        class="d-flex flex-column justify-content-center">
                                        <span class="badge badge-center bg-label-info p-4 m-auto">
                                            <i class="bx bx-building fs-5"></i>
                                        </span>
                                        <p class="text-center my-1 text-info">Companies</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">

                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('img/icons/unicons/cc-success.png') }}" alt="Credit Card"
                                                class="rounded">
                                        </div>
                                        <div>
                                            <a href="{{ route('employee.index') }}"
                                                class="btn btn-sm btn-label-success">More</a>
                                        </div>
                                    </div>
                                    <span>Cards</span>
                                    <h3 class="card-title text-nowrap mb-1">{{ $totalCards }}</h3>
                                    @php
                                        $yesterday = $cardStatistics[0]->yesterday_percentage;
                                        $today = $cardStatistics[0]->current_percentage;
                                        $textClass = '';
                                        $iconClass = '';
                                        $value = 0;
                                        $prefix = '';
                                        if ($today >= $yesterday) {
                                            $textClass = 'text-success';
                                            $iconClass = 'bx-up-arrow-alt';
                                            $value = ($today - $yesterday) * 100;
                                            $prefix = '+';
                                        } elseif ($today < $yesterday) {
                                            $textClass = 'text-danger';
                                            $iconClass = 'bx-down-arrow-alt';
                                            $value = ($yesterday - $today) * 100;
                                            $prefix = '-';
                                        }
                                    @endphp
                                    <small class="{{ $textClass }} fw-semibold">
                                        <i class='bx {{ $iconClass }}'></i>
                                        {{ $prefix . ' ' . $value }}%
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="{{ asset('img/icons/unicons/briefcase.png') }}" alt="Credit Card"
                                                class="rounded">
                                        </div>
                                        <div>
                                            <a href="{{ route('company.index') }}"
                                                class="btn btn-sm btn-label-primary">More</a>
                                        </div>
                                    </div>
                                    <span>Companies</span>
                                    <h3 class="card-title text-nowrap mb-1">{{ $totalCompanies }}</h3>
                                    @php
                                        $yesterday = $companyStatistics[0]->yesterday_percentage;
                                        $today = $companyStatistics[0]->current_percentage;
                                        $textClass = '';
                                        $iconClass = '';
                                        $value = 0;
                                        $prefix = '';
                                        if ($today >= $yesterday) {
                                            $textClass = 'text-success';
                                            $iconClass = 'bx-up-arrow-alt';
                                            $value = ($today - $yesterday) * 100;
                                            $prefix = '+';
                                        } elseif ($today < $yesterday) {
                                            $textClass = 'text-danger';
                                            $iconClass = 'bx-down-arrow-alt';
                                            $value = ($yesterday - $today) * 100;
                                            $prefix = '-';
                                        }
                                    @endphp
                                    <small class="{{ $textClass }} fw-semibold">
                                        <i class='bx {{ $iconClass }}'></i>
                                        {{ $prefix . ' ' . $value }}%
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->role_id == 1)
            <div class="row">
                <!-- Employee List -->
                <div class="col-md-6 col-lg-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Employee List</h5>

                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @if (sizeof($employees) <= 0)
                                    <li class="d-flex mb-4 pb-1">No Employee added</li>
                                @else
                                    @foreach ($employees as $employee)
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="{{ asset('img/avatars') . '/' . $employee->photo }}" alt="User"
                                                    class="rounded">
                                            </div>
                                            <div class="d-flex w-100 align-items-start gap-2">
                                                <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                                    <div>
                                                        <h6 class="mb-0">
                                                            {{ $employee->first_name . ' ' . $employee->last_name }}</h6>
                                                        <small class="text-muted">{{ $employee->email }}</small>
                                                    </div>

                                                    <div class="user-progress d-flex align-items-center gap-2">
                                                        <h6 class="mb-0">{{ $employee->office_phone }}</h6>
                                                    </div>
                                                </div>

                                                <div class="chart-progress" data-color="secondary" data-series="85"></div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Total Team</h6>

                        </div>
                        <div class="card-body text-center">
                            <div class="avatar avatar-md border-5 border-light-success rounded-circle mx-auto mb-4">
                                <span class="avatar-initial rounded-circle bg-label-success"><i
                                        class='bx bx-user bx-sm'></i></span>
                            </div>
                            <h3 class="card-title mb-1 me-2">{{ $totalEmployee }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h6 class="card-title m-0 me-2">Cards Generated</h6>

                        </div>
                        <div class="card-body text-center">
                            <div class="avatar avatar-md border-5 border-light-success rounded-circle mx-auto mb-4">
                                <span class="avatar-initial rounded-circle bg-label-success"><i
                                        class='bx bx-credit-card bx-sm'></i></span>
                            </div>
                            <h3 class="card-title mb-1 me-2">{{ $totalCards }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">

                <div class="col-lg-8  mb-4">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title mb-5 text-primary">Welcome Back {{ Auth::user()->name }}!</h5>
                                    {{-- <p class="mb-4">Happy to see you again. We welcome you here.</p> --}}

                                    <a href="javascript:;" class="btn btn-sm btn-label-primary">View Badges</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                        alt="View Badge User" data-app-light-img="illustrations/man-with-laptop-light.png"
                                        data-app-dark-img="illustrations/man-with-laptop-dark.html">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('img/icons/unicons/cc-primary.png') }}" alt="Credit Card"
                                        class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <span class="fw-semibold d-block mb-1">Team</span> --}}
                            <h4 class="card-title mb-4 mt-4">Update Info</h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('img/icons/unicons/cube-secondary.png') }}" alt="cube"
                                        class="rounded">
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="cardOpt2" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt2">
                                        <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            {{-- <span class="fw-semibold d-block mb-1">Card</span> --}}
                            <h4 class="card-title mb-4 mt-4">Download</h4>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!--/ Content -->

@endsection
