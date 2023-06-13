<?php

namespace App\Http\Controllers;

use App\Models\VisaRequest;
use Illuminate\Http\Request;
use App\Models\countries;

class VisaRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = countries::all();

        $data = compact('countries');

        return view('frontend.visa_request_stepone')->with($data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisaRequest  $visaRequest
     * @return \Illuminate\Http\Response
     */
    public function show(VisaRequest $visaRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisaRequest  $visaRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(VisaRequest $visaRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisaRequest  $visaRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisaRequest $visaRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisaRequest  $visaRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisaRequest $visaRequest)
    {
        //
    }
}
