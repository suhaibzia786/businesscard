<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageFeature;

class MarketingController extends Controller
{
    public function index()
    {
        $data['packages'] = Package::orderBy('price', 'asc')->get();
        $data['features'] = PackageFeature::all();
        return view('marketing.index', $data);
    }
}