<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use App\Models\UserRole;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['companies'] = Company::all();
        return view('company', $data);
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
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
        $allRequest = $request->all();
        $data = $request->except(['_token', 'color1', 'color2', 'color3']);
        $color = $allRequest['color1'] . ', ' . $allRequest['color2'] . ', ' . $allRequest['color3'];
        $data['color'] = $color;
        $data['created_by'] = Auth::user()->id;
        if(!isset($request->logo) or $request->logo=='') {
            $logoName = 'default-logo.png';
        } else {
            $logoName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('img/logo'), $logoName);
        }
        $password = Hash::make($data['password']);
        $data['password'] = $password;
        $data['logo'] = $logoName;
        $data['slug'] = Str::slug($data['name'], '-');
        $data['role_id'] = UserRole::where('role', 'Super User')->get()[0]->role_id;
        if($company = Company::create($data)) {
            $userData  = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $password,
                'role_id' => UserRole::where('role', 'Super User')->get()[0]->role_id,
                'user_type' => 'Company',
                'status' => $data['status'],
                'user_linked_id' => $company->id
            ];
            if(User::create($userData)) {
                return redirect()->back()->with('success', 'Company added successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        
    }

    public function getCompany()
    {
        $id = request('company_id');
        $data = Company::find($id);
        return json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $allRequest = $request->all();
        $color = $allRequest['color1'] . ', ' . $allRequest['color2'] . ', ' . $allRequest['color3'];
        if(!isset($request->logo) or $request->logo=='') {
            $logoName = Company::find($company->id)->logo;
        } else {
            $logoName = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('img/logo'), $logoName);
        }
        $data = [
            "name" => $request->name,
            "website" => $request->website,
            "address_line1" => $request->address_line1,
            "address_line2" => $request->address_line2,
            "city" => $request->city,
            "state" => $request->state,
            "country" => $request->country,
            "zip_code" => $request->zip_code,
            "status" => $request->status,
            "email" => $request->email,
            "color" => $color,
            "updated_by" => Auth::user()->id,
            "logo" => $logoName,
            "slug" => Str::slug($request->name, '-')
        ];
        // dd($data, $company->id);
        if(Company::where('id', $company->id)->update($data)) {
            $userData  = [
                'name' => $data['name'],
                'email' => $data['email'],
                'status' => $data['status'],
            ];
            if(User::where('user_linked_id', $company->id)->where('user_type', 'Company')->update($userData)) {
                return redirect()->back()->with('success', 'Company updated successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Company::destroy($company->id);
        return redirect()->back()->with('success', 'Company deleted successfully');
    }
}