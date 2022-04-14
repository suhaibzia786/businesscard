<?php

namespace App\Http\Controllers;

use App\Models\CLPSetting;
use App\Http\Requests\StoreCLPSettingRequest;
use App\Http\Requests\UpdateCLPSettingRequest;

class CLPSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('template.clp');
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
     * @param  \App\Http\Requests\StoreCLPSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCLPSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CLPSetting  $cLPSetting
     * @return \Illuminate\Http\Response
     */
    public function show(CLPSetting $cLPSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CLPSetting  $cLPSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(CLPSetting $cLPSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCLPSettingRequest  $request
     * @param  \App\Models\CLPSetting  $cLPSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCLPSettingRequest $request, CLPSetting $cLPSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CLPSetting  $cLPSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(CLPSetting $cLPSetting)
    {
        //
    }
}