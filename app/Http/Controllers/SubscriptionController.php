<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Package;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use Stripe\Error\Card;
use App\Models\Company;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
// use Stripe;
use Validator;
use URL;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function subscription($package_id)
    {
        $data['packages'] = Package::orderBy('price', 'asc')->get();
        return view('auth.register', $data);
    }

    public function storeSubscription(Request $request)
    {
        // dd($package = Package::find($request->get('package_id'))->price);
        $validator = Validator::make($request->all(), [
                        'card_no' => 'required',
                        // 'ccExpiryMonth' => 'required',
                        'ccExpiry' => 'required',
                        'cvvNumber' => 'required',
                        //'amount' => 'required',
                    ]);
        $input = $request->all();
        if ($validator->passes()) { 
            $input = $request->except(['_token']);
            $stripeObj = new Stripe();
            $stripe = $stripeObj->setApiKey(env('STRIPE_SECRET'));
            try {

                if(Package::find($request->get('package_id'))->price!=0) {

    
                $ccExpiry = explode("/", $request->get('ccExpiry'));
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $ccExpiry[0],
                        'exp_year' => $ccExpiry[1],
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);
                // dd($token);
                if (!isset($token['id'])) {
                    return redirect()->back();
                }
                

                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => Package::find($request->get('package_id'))->price,
                    'description' => 'test payment charges',
                ]);
                if($charge['status'] == 'succeeded') {
                    
                    $data = $request->except(['color1', 'color2', 'color3']);
                    $color = $input['color1'] . ', ' . $input['color2'] . ', ' . $input['color3'];
                    $data['color'] = $color;
                    $data['created_by'] = 1;
                    // if(!isset($request->logo) or $request->logo=='') {
                    //     $logoName = 'default-logo.png';
                    // } else {
                    //     $logoName = time().'.'.$request->logo->extension();
                    //     $request->logo->move(public_path('img/logo'), $logoName);
                    // }
                    $password = Hash::make($data['password']);
                    $data['password'] = $password;
                    $data['logo'] = 'default-logo.png';
                    $data['slug'] = Str::slug($data['name'], '-');
                    $data['role_id'] = UserRole::where('role', 'Super User')->get()[0]->role_id;
                    $dataToStore = [
                      "name" => $request->name,
                        "website" => '',
                        "address_line1" => $request->address_line1,
                        "address_line2" => $request->address_line2,
                        "city" => $request->city,
                        "state" => $request->state,
                        "country" => $request->country,
                        "zip_code" => $request->zip_code,
                        "status" => $request->status,
                        "email" => $request->email,
                        "color" => $color,
                        "logo" => 'default-logo.png',
                        "slug" => Str::slug($request->name, '-'),
                        'created_by' => 1
                    ];
                    if($company = Company::create($data)) {
                        $userData  = [
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $password,
                            'role_id' => UserRole::where('role', 'Super User')->get()[0]->role_id,
                            'user_type' => 'Company',
                            'status' => 1,
                            'user_linked_id' => $company->id
                        ];
                        $subscriptionData = [
                            'company_id' => $company->id,
                            'package_id' => Package::find($request->get('package_id'))->id,
                            'payment_status' => 1
                        ];
                        Subscription::create($subscriptionData);
                        if(User::create($userData)) {
                            $credentials = $request->only('email', 'password');
                            if (Auth::attempt($credentials)) {
                                return redirect()->intended('dashboard');
                            }
                        }
                    }
                } else {
                    \Session::put('error','Transaction NOt Successfull');
                    return redirect()->back();
                }
            } else {
                $data = $request->except(['color1', 'color2', 'color3']);
                    $color = $input['color1'] . ', ' . $input['color2'] . ', ' . $input['color3'];
                    $data['color'] = $color;
                    $data['created_by'] = 1;
                    // if(!isset($request->logo) or $request->logo=='') {
                    //     $logoName = 'default-logo.png';
                    // } else {
                    //     $logoName = time().'.'.$request->logo->extension();
                    //     $request->logo->move(public_path('img/logo'), $logoName);
                    // }
                    $password = Hash::make($data['password']);
                    $data['password'] = $password;
                    $data['logo'] = 'default-logo.png';
                    $data['slug'] = Str::slug($data['name'], '-');
                    $data['role_id'] = UserRole::where('role', 'Super User')->get()[0]->role_id;
                    $dataToStore = [
                      "name" => $request->name,
                        "website" => '',
                        "address_line1" => $request->address_line1,
                        "address_line2" => $request->address_line2,
                        "city" => $request->city,
                        "state" => $request->state,
                        "country" => $request->country,
                        "zip_code" => $request->zip_code,
                        "status" => $request->status,
                        "email" => $request->email,
                        "color" => $color,
                        "logo" => 'default-logo.png',
                        "slug" => Str::slug($request->name, '-'),
                        'created_by' => 1
                    ];
                    if($company = Company::create($data)) {
                        $userData  = [
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => $password,
                            'role_id' => UserRole::where('role', 'Super User')->get()[0]->role_id,
                            'user_type' => 'Company',
                            'status' => 1,
                            'user_linked_id' => $company->id
                        ];
                        $subscriptionData = [
                            'company_id' => $company->id,
                            'package_id' => Package::find($request->get('package_id'))->id,
                            'payment_status' => 1
                        ];
                        Subscription::create($subscriptionData);
                        if(User::create($userData)) {
                            $credentials = $request->only('email', 'password');
                            if (Auth::attempt($credentials)) {
                                return redirect()->intended('dashboard');
                            }
                        }
                    }
                }
            } catch (Exception $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            } 
        } else {
            return redirect()->back();
        }
    }

    // public function subscription()
    // {
    //     // try {
    //         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //         Stripe\Charge::create ([
    //                 "amount" => 100 * 100,
    //                 "currency" => "usd",
    //                 "source" => $request->stripeToken,
    //                 "description" => "Test payment" 
    //         ]);
    
    //         Session::flash('success', 'Payment successful!');
    //     // }
    // }
}