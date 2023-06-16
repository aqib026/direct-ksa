<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;


use Illuminate\Http\Request;

class ServicesController extends Controller
{
   public function create()
   {
      $url = url('admin/special_services_form');
      $title = "Add Special Services";
      $data = compact('url', 'title');
      return view('admin.special_services.special_services_form')->with($data);
   }
   ///////////////////////////////////////////////////////////////////////////

   public function store(request $request)
   {
      $request->validate([
         'name' => 'required'


      ]);


      $services = new services;
      $services->name = $request['name'];

      $filename = time() . "bn." . $request->file('banner')->getClientOriginalExtension();
      $services->banner = $request->file('banner')->storeas('banner', $filename);



      $services->save();
      return redirect('admin/special_services');
   }

   /////////////////////////////////////////////////////////////////////////////////////

   public function show()
   {

      $search = $request["search"] ?? "";
      if ($search != "") {
         $services = services::where('name', 'like', "%$search%")->get();
      } else {
         $services = services::paginate(6);
      }
      $data = compact('services', 'search');
      return view('admin.special_services.special_services')->with($data);
   }
   /////////////////////////////////////////////////////////////////

   public function destroy($id)
   {
      $services = services::find($id);
      if (!is_null($services)) {
         $services->delete();
      }

      return redirect('admin/special_services');
   }
   ////////////////////////////////////////////////


   public function edit($id)
   {
      $services = services::find($id);
      if (is_null($services)) {    //not found
         return redirect('admin/special_services');
      } else {
         $url = url('admin/special_services_form/update') . "/" . $id;
         $title = "Update Special Services";

         $data = compact('services', 'url', 'title');
         return view('admin/special_services/special_services_form')->with($data);
      }
   }

   //////////////////////////////////////////////////////////////



   public function update($id, Request $request)
   {
      $services = services::find($id);

      $services->name = $request['name'];
      if(isset($request) && !empty($request->file('banner'))){
      $filename = time() . "bn" . $request->file('banner')->getClientOriginalExtension();
      $services->banner = $request->file('banner')->storeas('banner', $filename);
      }


      $services->save();
      return redirect('admin/special_services');
   }
}
