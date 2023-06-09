<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Illuminate\Http\Request;


class AccreditationController extends Controller
{
   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $url = url('admin/accreditation-form');
      $title = "Add accreditation";
      $data = compact('url', 'title');
      return view('admin.accreditation.accreditation-form')->with($data);
   }
   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

   public function store(request $request)
   {
      $request->validate([
         'name' => 'required'


      ]);


      $accreditation = new accreditation;
      $accreditation->name = $request['name'];

      $filename = time() . "acc." . $request->file('banner')->getClientOriginalExtension();
      $accreditation->banner = $request->file('banner')->storeas('banner', $filename);

      $accreditation->status = $request['status'];

      $accreditation->save();
      return redirect('admin/accreditation');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show(request $request)
   {
      $search = $request["search"] ?? "";
      if ($search != "") {
         $accreditation = accreditation::where('name', 'like', "%$search%")->get();
      } else {
         $accreditation = accreditation::paginate(6);
      }
      $data = compact('accreditation', 'search');
      return view('admin.accreditation.accreditation')->with($data);
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $accreditation = accreditation::find($id);
      if (!is_null($accreditation)) {
         $accreditation->delete();
      }

      return redirect('admin/accreditation');
   }


   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $accreditation = accreditation::find($id);
      if (is_null($accreditation)) {    //not found
         return redirect('admin/accreditation');
      } else {
         $url = url('admin/accreditation-form/update') . "/" . $id;
         $title = "Update accreditation";

         $data = compact('accreditation', 'url', 'title');
         return view('admin/accreditation/accreditation-form')->with($data);
      }
   }
   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update($id, Request $request)
   {
      $request->validate([
         'name' => 'required'
      ]);
      $accreditation = accreditation::find($id);

      $accreditation->name = $request['name'];
      $filename = time() . "acc." . $request->file('banner')->getClientOriginalExtension();
      $accreditation->banner = $request->file('banner')->storeas('banner', $filename);

      $accreditation->status = $request['status'];


      $accreditation->save();
      return redirect('admin/accreditation');
   }
}
