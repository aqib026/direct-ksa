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

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required'


      ]);


      $services = new Services;
      $services->name = $request['name'];

      $filename = time() . "bn." . $request->file('banner')->getClientOriginalExtension();
      $services->banner = $request->file('banner')->storeas('banner', $filename);



      $services->save();
      return redirect('admin/special_services');
   }

   /////////////////////////////////////////////////////////////////////////////////////

   public function show(Request $request)
   {
      $search = $request["search"] ?? "";
      if ($search != "") {
         $services = Services::where('name', 'like', "%$search%")->orderBy('id', 'DESC')->paginate(20);
      } else {
         $services = Services::orderBy('id', 'DESC')->paginate(20);
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
      $services = Services::find($id);

      $services->name = $request['name'];
      if(isset($request) && !empty($request->file('banner'))){
      $filename = time() . "bn" . $request->file('banner')->getClientOriginalExtension();
      $services->banner = $request->file('banner')->storeas('banner', $filename);
      }


      $services->save();
      return redirect('admin/special_services');
   }
}
