<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaRequest;

use Illuminate\Http\Request;
use App\Models\countries;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
     * Second Step.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function steptwo(Request $request, $country, $visatype)
    {
        
        $form_data = '';
        
        if(Session::has('form_data')){
            $form_data = Session::get('form_data');
        }else{
            $form_data = array('country' => $country, 'visa_type' => $visatype);
        }
        //dd($form_data);
        $VisaRequest = VisaRequest::where('countries_id', $country)->where('visa_type', $visatype)->first();
        return view('frontend.visa_request_steptwo', compact('VisaRequest', 'form_data'));
    }

     /**
     * Third Step.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stepthree(Request $request)
    {
        
        $form_data = '';
        
        if(Session::has('form_data')){
            $form_data = Session::get('form_data');
        }
        //dd($form_data);
        
        return view('frontend.visa_request_stepthree', compact('form_data'));
    }

    public function create()
    {
        $url = url('admin/visarequest_form');
        $title = "Add Visa Type";
        $countries = Countries::pluck('name', 'id');

        $data = compact('url', 'title','countries');
        return view('admin.visa_type.visatypeform')->with($data);
    }

     /**
     * Store post data of step two and redirecct to payment form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment_form(Request $request)
    {
        $request->validate([
            'travel_date' => 'required',
            'appointment_city' => 'required',
            'relation' => 'required',
        ]);
        $form_data = $request->all();
        
        Session::put('form_data', $form_data);
        if (auth()->check()) {
            return redirect('visa_request/application_forms');
        }else {
            return redirect('user/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'visa_type' => 'required',
            'visa_type_ar' => 'required',
        ]);

        $VisaRequest = new VisaRequest();

        $VisaRequest->countries_id = $request['name'];

        $VisaRequest->visa_type = $request['visa_type'];
        $VisaRequest->visa_type_ar = $request['visa_type_ar'];
        $VisaRequest->adult_price = $request['adult_price'];
        $VisaRequest->child_price = $request['child_price'];
        $VisaRequest->passport_price = $request['passport_price'];

        $VisaRequest->save();
        return redirect('admin/visarequest_form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $country_id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $country_id=null)
    {

        $VisaRequest = new VisaRequest();

        $search = $request["search"] ?? "";
        if ($search != "") {
            $VisaRequest = $VisaRequest->where('name', 'like', "%$search%");
        } 
        if ($country_id != null) {
            $VisaRequest = $VisaRequest->where('countries_id', $country_id);
        } 
        
        $VisaRequest = $VisaRequest->orderby('id', 'desc')->paginate(20);

        $data = compact('VisaRequest', 'search');
        return view('admin.visa_type.visatype')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $VisaRequest = VisaRequest::find($id);
        if (is_null($VisaRequest)) {    //not found
            return redirect('admin/visarequest');
        } else {
            $url = url('admin/visarequest_form/update') . "/" . $id;
            $title = "Update Visa Type";
            $countries = Countries::pluck('name', 'id');
            $data = compact('VisaRequest', 'url', 'title','countries');
            return view('admin/visa_type/visatypeform')->with($data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'visa_type' => 'required',
            'visa_type_ar' => 'required',
        ]);
        $VisaRequest = VisaRequest::find($id);

        $VisaRequest->Countries_id = $request['name'];
        $VisaRequest->visa_type = $request['visa_type'];
        $VisaRequest->visa_type_ar = $request['visa_type_ar'];
        $VisaRequest->adult_price = $request['adult_price'];
        $VisaRequest->child_price = $request['child_price'];
        $VisaRequest->passport_price = $request['passport_price'];
      
        $VisaRequest->save();
        return redirect('admin/visarequest');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $VisaRequest = VisaRequest::find($id);
        if (!is_null($VisaRequest)) {
            $VisaRequest->delete();
        }

        return redirect('admin/visarequest');
    }

}
