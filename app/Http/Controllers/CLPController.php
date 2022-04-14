<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CLPSetting;

class CLPController extends Controller
{
    public function index($company_name)
    {
        $data['company'] = Company::where('slug', $company_name)->get();
        $data['template'] = CLPSetting::where('company_id', $data['company'][0]->id)->get();
        return view('clp', $data);
    }
}