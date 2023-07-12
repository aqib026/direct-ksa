<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaRequest;

use Illuminate\Http\Request;
use App\Models\countries;
use App\Models\UserVisaApplications;
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
        }else{
            return redirect('visa_request');
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
     * Store post data of step three and redirecct to payment form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function application_form(Request $request)
    {
        $form_data = $request->all();
    
        $stepthreedata = Session::get('form_data');
        
        if(isset($stepthreedata) && $stepthreedata['adult_count'] > 0){
            $adult_count = $stepthreedata['adult_count'];
            for($i = 1; $i <= $adult_count; $i++){
                $filename = time() . $i . "." .  $request->file('adult_passport_'.$i)->getClientOriginalExtension();
                $form_data['adult_passport_'.$i] = $request->file('adult_passport_'.$i)->storeas('passportpic', $filename);
            }
        }
        
        if(isset($stepthreedata) && $stepthreedata['child_count'] > 0){
            $child_count = $stepthreedata['child_count'];
            for($i = 1; $i <= $child_count; $i++){
                $filename = time() . $i . "." . $request->file('child_passport_'.$i)->getClientOriginalExtension();
                $form_data['child_passport_'.$i] = $request->file('child_passport_'.$i)->storeas('passportpic', $filename);
            }
        }
       
        if(isset($stepthreedata) && $stepthreedata['passport_count'] > 0){
            $passport_count = $stepthreedata['passport_count'];
            for($i = 1; $i <= $passport_count; $i++){
                $filename = time() . $i . "." . $request->file('passport_'.$i)->getClientOriginalExtension();
                $form_data['passport_'.$i] = $request->file('passport_'.$i)->storeas('passportpic', $filename);
            }
        }
        
        Session::put('application_form_data', $form_data);
        if (auth()->check()) {
            return redirect('visa_request/payment');
        }else {
            return redirect('user/login');
        }
    }

    public function save_payment_form(Request $request)
    {
        $form_data = $request->all();
        $data = '';
    
        if(Session::has('form_data') && Session::has('application_form_data')) {
            $data = Session::get('form_data');
            $data['application_form_data'] = Session::get('application_form_data');
            $data['payment_form_data'] = $form_data['payment_method'];
        }else{
            return redirect('visa_request');
        }
        
        $VisaRequest = new UserVisaApplications();

        $VisaRequest->user_id = auth()->user()->id;
        $VisaRequest->content = serialize($data);
        $VisaRequest->save();
        
        return view('frontend.thankyou');
    }

    public function stepfour()
    {
        $form_data = '';
        $country = '';
        if(Session::has('form_data') && Session::has('application_form_data')) {
            $form_data = Session::get('form_data');
            
            $country = countries::where('id', $form_data['country'])->first();
        }else{
            return redirect('visa_request');
        }
        
        return view('frontend.visa_request_stepfour', compact('form_data', 'country'));
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
