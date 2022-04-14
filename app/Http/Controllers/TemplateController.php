<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['templates'] = Template::all();
        return view('template.card', $data);
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
     * @param  \App\Http\Requests\StoreTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemplateRequest $request)
    {
        $allRequest = $request->all();
        $data = $request->except(['_token']);
        // dd($data);
        if(!isset($request->sample_image) or $request->sample_image=='') {
            $sampleImageName = 'sample1.png';
        } else {
            $sampleImageName = time().'.'.$request->sample_image->extension();
            $request->sample_image->move(public_path('img/business_card'), $sampleImageName);
        }
        $data['sample_image'] = $sampleImageName;
        if(Template::create($data)) {
            return redirect()->back()->with('success', 'Business card template added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTemplateRequest  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateRequest $request, Template $template)
    {
        $data = $request->except(['_method', '_token']);
        if(!isset($request->sample_image) or $request->sample_image=='') {
            $sampleImageName = Template::find($template->id)->sample_image;
        } else {
            $sampleImageName = time().'.'.$request->sample_image->extension();
            $request->sample_image->move(public_path('img/business_card'), $sampleImageName);
        }
        $data['sample_image'] = $sampleImageName;
        if(Template::find($template->id)->update($data)) {
            return redirect()->back()->with('success', 'Business card template updated successfully');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        Template::destroy($template->id);
        return redirect()->back()->with('success', 'Business card template deleted successfully');
    }

    public function getCartTemplate()
    {
        $id = request('template_id');
        return json_encode(Template::find($id));
    }
}