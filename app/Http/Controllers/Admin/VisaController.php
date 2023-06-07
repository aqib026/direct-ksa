<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\countries;
use App\Models\Visa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class VisaController extends Controller
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
        $url = url('admin/visa_form');
        $title = "Add Visa Requirement";
        $countries = DB::table('countries')->get();
        $data = compact('url', 'title', 'countries');
        return view('admin.visa_requirement.visa_form')->with($data);
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
             'detail'=>'required'
   
         ]);
   
   
         $visa = new visa;
        
         $visa->countries_id=$request ['name'];
   
        $visa->detail =$request['detail'];
        $visa->status=$request ['status'];
   
         $visa->save();
         return redirect('admin/visa_requirement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // return countries::find(23)->visa;
        // die;
        $search = $request["search"] ?? "";
        if ($search != "") {
           $visa = visa::where('name', 'like', "%$search%")->get();
        } else {
           $visa = visa::paginate(6);
        }
        $data = compact('visa', 'search');
        return view('admin.visa_requirement.visa_requirement')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visa = visa::find($id);
      if (is_null($visa)) {    //not found
         return redirect('admin/visa_requirement');
      } else {
         $url = url('admin/visa_form/update') . "/" . $id;
         $title = "Update Visa Requirement";
        $countries = DB::table('countries')->get();
         
         $data = compact('visa', 'url','countries', 'title');
         return view('admin/visa_requirement/visa_form')->with($data);
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
            'name'=>'required'
        ]);
      $visa= visa::find($id);
 
      $visa->countries_id=$request ['name'];
      $visa->detail =$request['detail'];
     
      $visa->status=$request ['status'];
 
 
    $visa->save();
    return redirect('admin/visa_requirement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visa = visa::find($id);
        if (!is_null($visa)) {
           $visa->delete();
        }
  
        return redirect('admin/visa_requirement');
    }



    // public function one($id)
    // {
    //     return countries::find($id)->visa;   used to show one to one relation 
      
    // }
}
