@extends('layouts.clp_layout')

@section('content')
    {{-- @if ($template)
    @endif --}}
    <div class="card vh-100" style="border-radius: 0 !important">
        <div class="card-body d-flex flex-column h-75 text-center justify-content-center align-items-center">
            <img src="{{ asset('img/logo') . '/' . $company[0]->logo }}" style="max-width: 150px" alt="">
            <h2 class="text-uppercase">{{ $company[0]->name }}</h2>
            <h4 class="text-uppercase">{{ $company[0]->slogan }}</h4>
        </div>
        <div class="card-footer d-flex flex-column h-25 justify-content-center align-items-center"
            style="background-color: #444544;border-radius: 0 !important; font-size:12px">
            <h6 class="text-white" style="margin-top:30px">{{ $company[0]->name }}</h6>
            <p class="text-center text-white">{{ $company[0]->address_line1 . ' ' . $company[0]->address_line2 }} <br>
                {{ $company[0]->city . ', ' . $company[0]->state }} <br>
                {{ $company[0]->zip_code }}</p>
            <small>&copy;{{ date('Y') . ' ' . $company[0]->name }}. All Rights Reserved</small>
        </div>
    </div>
@endsection
