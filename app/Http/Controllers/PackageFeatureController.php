<?php

namespace App\Http\Controllers;

use App\Models\PackageFeature;
use App\Http\Requests\StorePackageFeatureRequest;
use App\Http\Requests\UpdatePackageFeatureRequest;

class PackageFeatureController extends Controller
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
     * @param  \App\Http\Requests\StorePackageFeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageFeatureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function show(PackageFeature $packageFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageFeature $packageFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackageFeatureRequest  $request
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageFeatureRequest $request, PackageFeature $packageFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageFeature  $packageFeature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageFeature $packageFeature)
    {
        //
    }
}
