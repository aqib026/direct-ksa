<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countries;


class CountryController extends Controller
{

   /////////////////////////////////////////////////
   public function create()
   {
      $url = url('admin/country-form');
      $title = "Add Country";
      $data = compact('url', 'title');
      return view('admin.country.country-form')->with($data);
   }
   ///////////////////////////////////////////////////////////////////////////

   public function store(request $request)
   {
      $request->validate([
         'name' => 'required'


      ]);


      $countries = new countries;
      $countries->name = $request['name'];

      $filename = time() . "fp." . $request->file('flag_pic')->getClientOriginalExtension();
      $countries->flag_pic = $request->file('flag_pic')->storeas('flagpic', $filename);
      $countryname = time() . "cp." . $request->file('cover_pic')->getClientOriginalExtension();
      $countries->cover_pic = $request->file('cover_pic')->storeAs('coverpic', $countryname);
      $countries->status = $request['status'];

      $countries->save();
      return redirect('admin/countries');
   }

   /////////////////////////////////////////////////////////////////////////////////////

   public function show(request $request)
   {
      $search = $request["search"] ?? "";
      if ($search != "") {
         $countries = countries::where('name', 'like', "%$search%")->get();
      } else {
         $countries = countries::paginate(6);
      }
      $data = compact('countries', 'search');
      return view('admin.country.countries')->with($data);
   }
   /////////////////////////////////////////////////////////////////

   public function destroy($id)
   {
      $countries = countries::find($id);
      if (!is_null($countries)) {

         $countries->delete();
      }


      return redirect('admin/countries');
   }
   ////////////////////////////////////////////////


   public function edit($id)
   {
      $countries = countries::find($id);
      if (is_null($countries)) {    //not found
         return redirect('admin/countries');
      } else {
         $url = url('admin/country-form/update') . "/" . $id;
         $title = "Update Country";

         $data = compact('countries', 'url', 'title');
         return view('admin/country/country-form')->with($data);
      }
   }

   //////////////////////////////////////////////////////////////



   public function update($id, Request $request)
   {
      //flagpic/1686146027fp.png
      //coverpic/1686146027cp.png
      $request->validate([
         'name' => 'required'
      ]);
      $countries = countries::find($id);
   
      $countries->name = $request['name'];
      if(isset($request) && !empty($request->file('flag_pic'))){
         $filename = time() . "fp." . $request->file('flag_pic')->getClientOriginalExtension();
         $countries->flag_pic = $request->file('flag_pic')->storeas('flagpic', $filename);
      }
      if(isset($request) && !empty($request->file('cover_pic'))){
         $countryname = time() . "cp." . $request->file('cover_pic')->getClientOriginalExtension();
         $countries->cover_pic = $request->file('cover_pic')->storeAs('coverpic', $countryname);
      }
      
      $countries->status = $request['status'];


      $countries->save();
      return redirect('admin/countries');
   }

   /////////////////////////////////////////////////////////////


   public function slider()
   {

      $countries = countries::all();

      $data = compact('countries');

      return view('admin.slider')->with($data);
   }
}
