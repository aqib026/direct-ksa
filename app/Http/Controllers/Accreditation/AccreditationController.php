<?php

namespace App\Http\Controllers\Accreditation;
use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Illuminate\Http\Request;


class AccreditationController extends Controller
{
    public function form()
    {
       $url = url('admin/accreditation-form');
       $title = "Add accreditation";
       $data = compact('url', 'title');
       return view('admin.accreditation-form')->with($data);
    }
    ///////////////////////////////////////////////////////////////////////////
 
    public function store(request $request)
    {
       $request->validate([
          'name' => 'required'
 
 
       ]);
 
 
       $accreditation = new accreditation;
       $accreditation->name = $request['name'];
 
       $filename = time() . "acc." . $request->file('banner')->getClientOriginalExtension();
       $accreditation->banner = $request->file('banner')->storeas('banner', $filename);
      
      $accreditation->status=$request ['status'];
 
       $accreditation->save();
       return redirect('admin/accreditation');
    }
 
    /////////////////////////////////////////////////////////////////////////////////////
 
    public function view(request $request)
    {
       $search = $request["search"] ?? "";
       if ($search != "") {
          $accreditation = accreditation::where('name', 'like', "%$search%")->get();
       } else {
          $accreditation = accreditation::all();
       }
       $data = compact('accreditation', 'search');
       return view('admin.accreditation')->with($data);
    }
    /////////////////////////////////////////////////////////////////
 
    public function delete($id)
    {
       $accreditation = accreditation::find($id);
       if (!is_null($accreditation)) {
          $accreditation->delete();
       }
 
       return redirect('admin/accreditation');
    }
    ////////////////////////////////////////////////
 
 
    public function edit($id)
    {
       $accreditation = accreditation::find($id);
       if (is_null($accreditation)) {    //not found
          return redirect('admin/accreditation');
       } else {
          $url = url('admin/accreditation-form/update') . "/" . $id;
          $title = "Update accreditation";
 
          $data = compact('accreditation', 'url', 'title');
          return view('admin/accreditation-form')->with($data);
       }
    }
 
    //////////////////////////////////////////////////////////////
 
 
 
    public function update ($id, Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
      $accreditation= accreditation::find($id);
 
      $accreditation->name=$request ['name'];
      $filename = time() . "acc." . $request->file('banner')->getClientOriginalExtension();
      $accreditation->banner = $request->file('banner')->storeas('banner', $filename);
   
      $accreditation->status=$request ['status'];
 
 
    $accreditation->save();
    return redirect('admin/accreditation');
    }
}
