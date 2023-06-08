<?php

namespace App\Http\Controllers;

use App\Models\FeaturedSales;
use Illuminate\Http\Request;

class FeaturedSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->service)){
            $service = $request->service;
        }else{
            $service = '';
        }
        return view ('frontend.featuredSales', compact('service'));
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
        $validatedData = $request->validate([
            'required_service'  => 'required',
            'applicant_name'    => 'required',
            'mobile_number'     => 'required',
            'email'             => 'required'
        ], [
            'required_service.required' => 'Required Service is required',
            'applicant_name.required'   => 'Applicant Name is required',
            'mobile_number.required'    => 'Mobile No is required',
            'email.required'            => 'Email is required'
        ]);

        $input = $request->all();

        $images=array();
        if($files=$request->file('documents')){
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('image',$name);
                $images[]=$name;
            }
        }

        $FeaturedSales                              = new FeaturedSales();

        $FeaturedSales->required_service            = $request->required_service;
        $FeaturedSales->paper_quantity              = $request->paper_quantity;
        $FeaturedSales->documents                   = implode("|", $images);
        $FeaturedSales->translation_content         = $request->translation_content;
        $FeaturedSales->idl_card_qty                = $request->idl_card_qty;
        $FeaturedSales->lic_col_choice              = $request->lic_col_choice;
        $FeaturedSales->idl_qty                     = $request->idl_qty;
        $FeaturedSales->univ_adm_country            = $request->univ_adm_country;
        $FeaturedSales->nationality                 = $request->nationality;
        $FeaturedSales->mode_of_finance             = $request->mode_of_finance;
        $FeaturedSales->major_of_study              = $request->major_of_study;
        $FeaturedSales->current_qualification       = $request->current_qualification;
        $FeaturedSales->last_qualification_grade    = $request->last_qualification_grade;
        $FeaturedSales->certification               = $request->certification;
        $FeaturedSales->call_time                   = $request->call_time;
        $FeaturedSales->form_type                   = $request->form_type;
        $FeaturedSales->passport_quantity           = $request->passport_quantity;
        $FeaturedSales->country                     = $request->country;
        $FeaturedSales->applicant_name              = $request->applicant_name;
        $FeaturedSales->mobile_number               = $request->mobile_number;
        $FeaturedSales->email                       = $request->email;
        $FeaturedSales->service_cost                = $request->service_cost;  

        $FeaturedSales->save();
        if ($FeaturedSales) {
            return redirect(route('featured_sales'))->with('success', 'FeaturedSales Added Successfuly.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedSales $featuredSales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function edit(FeaturedSales $featuredSales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeaturedSales $featuredSales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeaturedSales $featuredSales)
    {
        //
    }
}