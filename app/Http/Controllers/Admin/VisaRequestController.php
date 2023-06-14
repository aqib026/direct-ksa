<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisaRequest;

use Illuminate\Http\Request;
use App\Models\countries;
use Illuminate\Support\Facades\DB;


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

    public function create()
    {
        $url = url('admin/visarequest_form');
        $title = "Add VisaRequest ";
        $countries = DB::table('countries')->get();

        $data = compact('url', 'title','countries');
        return view('admin.visa_type.visatypeform')->with($data);
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
          


        ]);


        $VisaRequest = new VisaRequest();

        $VisaRequest->countries_id = $request['name'];

        $VisaRequest->visa_type = $request['visa_type'];

        $VisaRequest->save();
        return redirect('admin/visarequest_form');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return countries::find(23)->VisaRequest;
        // die;
        $search = $request["search"] ?? "";
        if ($search != "") {
            $VisaRequest = VisaRequest::where('name', 'like', "%$search%")->get();
        } else {
            $VisaRequest = VisaRequest::paginate(6);
        }
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
            $title = "Update Contact VisaRequest";
        $countries = DB::table('countries')->get();


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
            'name' => 'required'
        ]);
        $VisaRequest = VisaRequest::find($id);

        $VisaRequest->Countries_id = $request['name'];
        $VisaRequest->visa_type = $request['visa_type'];
      


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
