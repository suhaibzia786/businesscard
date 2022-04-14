@extends('layouts.card_layout')

@section('title', 'Business Card')

@section('content')
    {{-- @if ($template)
    @endif --}}
    <style>
        .bcard div {
            border: 1px solid black;
            margin-top: 30px
                /* border-radius: 10px; */
        }

    </style>
    <div class="vh-100 card rounded-0 m-auto" style="width: 70%">
        <div class="card-header rounded-0 border-bottom d-flex justify-content-center align-items-center">
            <button class="btn btn-primary mx-3">Download</button>
            <button class="btn btn-success">Print</button>
        </div>
        <div class="card-body">
            <div class="bcard d-flex justify-content-center m-auto">
                <div class="logside d-flex flex-column justify-content-center align-items-center"
                    style="background-color: {{ $card[0]->card_color }}; height:300px; width:40%;border-top-left-radius: 10px;border-bottom-left-radius: 10px">
                    <img src="{{ asset('img/logo') . '/' . $card[0]->logo }}" style="max-width: 120px" alt="">
                    <h4 class="text-uppercase">{{ $card[0]->name }}</h4>
                    <h6 class="text-uppercase">{{ $card[0]->slogan }}</h6>
                </div>
                <div class="contentside d-flex flex-column justify-content-center align-items-center"
                    style="width:40%;border-top-right-radius: 10px;border-bottom-right-radius: 10px">
                    <h4>{{ $card[0]->first_name . ' ' . $card[0]->last_name }}</h4>
                    <p class="text-center my-3">
                        {{ $card[0]->office_phone }} <br>
                        {{ $card[0]->email }} <br>
                        {{ $card[0]->website }}
                    </p>
                    <p class="text-center">
                        {{ $card[0]->name }} <br>
                        {{ $card[0]->address_line1 . ' ' . $card[0]->address_line2 }} <br>
                        {{ $card[0]->city . ', ' . $card[0]->state }} <br>
                        {{ $card[0]->zip_code }} <br>
                        {{ $card[0]->country }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
