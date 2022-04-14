@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="authentication-wrapper authentication-cover">
    <div class="authentication-inner row m-0">

        <!-- Left Text -->
        <div class="d-none d-lg-flex col-lg-4 align-items-center justify-content-end p-5 pe-0">
            <div class="w-px-400">
                <img src="{{ asset('img/illustrations/create-account-light.png') }}" class="img-fluid" alt="multi-steps"
                    width="600" data-app-dark-img="illustrations/create-account-dark.png"
                    data-app-light-img="illustrations/create-account-light.png">
            </div>
        </div>
        <!-- /Left Text -->

        <!--  Multi Steps Registration -->
        <div class="d-flex col-lg-8 align-items-center authentication-bg p-sm-5 p-3">
            <div class="w-px-700 mx-auto">
                <div id="multiStepsValidation" class="bs-stepper shadow-none">
                    <div class="bs-stepper-header border-bottom-0">
                        <div class="step" data-target="#accountDetailsValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-home-alt"></i></span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Account</span>
                                    <span class="bs-stepper-subtitle">Account Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="bx bx-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#personalInfoValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-user"></i></span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Company</span>
                                    <span class="bs-stepper-subtitle">Enter Information</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i class="bx bx-chevron-right"></i>
                        </div>
                        <div class="step" data-target="#billingLinksValidation">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-circle"><i class="bx bx-detail"></i></span>
                                <span class="bs-stepper-label mt-1">
                                    <span class="bs-stepper-title">Billing</span>
                                    <span class="bs-stepper-subtitle">Payment Details</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        @if (session()->get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                        <form id="multiStepsForm" method="post" action="{{ route('storeSubscription') }}">
                            @csrf
                            <!-- Account Details -->
                            <div id="accountDetailsValidation" class="content">
                                <div class="content-header mb-3">
                                    <h3 class="mb-1">Login Information</h3>
                                    <span>Enter Your Login Details</span>
                                </div>
                                <div class="row g-3">

                                    <div class="col-sm-6">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="john.doe@email.com" aria-label="john.doe" />
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password2" />
                                            <span class="input-group-text cursor-pointer" id="password2"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-password-toggle">
                                        <label class="form-label" for="ConfirmPassword">Confirm
                                            Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="ConfirmPassword" name="ConfirmPassword"
                                                class="form-control"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="ConfirmPassword2" />
                                            <span class="input-group-text cursor-pointer" id="ConfirmPassword2"><i
                                                    class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button class="btn btn-label-secondary btn-prev" disabled> <i
                                                class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next"> <span
                                                class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- Personal Info -->
                            <div id="personalInfoValidation" class="content">
                                <div class="content-header mb-3">
                                    <h3 class="mb-1">Company Information</h3>
                                    <span>Enter Your company Information</span>
                                </div>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="name">Company Name</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="abc" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="slogan">Slogan</label>
                                        <input type="text" id="slogan" name="slogan" class="form-control"
                                            placeholder="Test Slogan" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="address_line1">Address Line 1</label>
                                        <input type="text" id="address_line1" name="address_line1" class="form-control"
                                            placeholder="Address Line 1" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="address_line2">Address Line 2</label>
                                        <input type="text" id="address_line2" name="address_line2" class="form-control"
                                            placeholder="Address Line 1" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="city">City</label>
                                        <input type="text" id="city" class="form-control" placeholder="City Name" />
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="state">State</label>
                                        <select id="state" class="select2 form-select" data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="country">Country</label>
                                        <select id="country" class="select2 form-select" data-allow-clear="true">
                                            <option value="">Select</option>
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District Of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="zip_code">Zip Code</label>
                                        <input type="text" id="zip_code" name="zip_code" class="form-control zip_code"
                                            placeholder="Postal Code" maxlength="6" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label" for="color1">Color 1</label>
                                        <input type="color" id="color1" name="color1" class="form-control color1"
                                            maxlength="6" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label" for="color1">Color 2</label>
                                        <input type="color" id="color2" name="color2" class="form-control color2"
                                            maxlength="6" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label" for="color1">Color 3</label>
                                        <input type="color" id="color3" name="color3" class="form-control color3"
                                            maxlength="6" />
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary btn-prev"> <i
                                                class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-next"> <span
                                                class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
                                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- Billing Links -->
                            <div id="billingLinksValidation" class="content">
                                <div class="content-header mb-3">
                                    <h3 class="mb-1">Select Plan</h3>
                                    <span>Select plan as per your requirement</span>
                                </div>
                                <!-- Custom plan options -->
                                <div class="row gap-md-0 gap-3 mb-4">
                                    @foreach($packages as $package)
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="basicOption">
                                                <span class="custom-option-body">
                                                    <h4 class="mb-2">{{ $package->title }}</h4>
                                                    <p class="mb-2">No of Cards:
                                                        {{ $package->no_of_cards == -1 ? 'Unlimited' : $package->no_of_cards }}
                                                    </p>
                                                    <span class="d-flex justify-content-center">
                                                        <sup class="text-primary fs-big lh-1 mt-3">$</sup>
                                                        <span
                                                            class="display-5 text-primary">{{ $package->price }}</span>
                                                        <sub class="lh-1 fs-big mt-auto mb-2 text-muted">/month</sub>
                                                    </span>
                                                </span>
                                                <input name="package_id" class="form-check-input" type="radio"
                                                    value="{{ $package->id }}" id="price{{ $package->price }}"
                                                    {{ $package->id==request('package_id') ? 'checked' : '' }}
                                                    required />
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--/ Custom plan options -->
                                <div class="content-header mb-3">
                                    <h3 class="mb-1">Payment Information</h3>
                                    <span>Enter your card information</span>
                                </div>
                                <!-- Credit Card Details -->
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label w-100" for="card_no">Card Number</label>
                                        <div class="input-group input-group-merge">
                                            <input id="card_no" class="form-control multi-steps-card" name="card_no"
                                                type="text" placeholder="1356 3215 6548 7898"
                                                aria-describedby="multiStepsCardImg" required />
                                            <span class="input-group-text cursor-pointer" id="multiStepsCardImg"><span
                                                    class="card-type"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label" for="multiStepsName">Name On Card</label>
                                        <input type="text" id="multiStepsName" class="form-control"
                                            name="multiStepsName" placeholder="John Doe" required />
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <label class="form-label" for="multiStepsExDate">Expiry Date</label>
                                        <input type="text" id="multiStepsExDate" name="ccExpiry"
                                            class="form-control multi-steps-exp-date" name="multiStepsExDate"
                                            placeholder="MM/YY" required />
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <label class="form-label" for="cvvNumber">CVV Code</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="cvvNumber" class="form-control multi-steps-cvv"
                                                name="cvvNumber" maxlength="3" placeholder="654" required />
                                            <span class="input-group-text cursor-pointer" id="cvvNumberHelp"><i
                                                    class="bx bx-help-circle text-muted" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Card Verification Value"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary btn-prev"> <i
                                                class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                        </button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                                <!--/ Credit Card Details -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Multi Steps Registration -->
    </div>
</div>
@endsection