<?php

namespace App\Http\Controllers\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\countries;


class CountryController extends Controller
{

   /////////////////////////////////////////////////
   public function form()
   {
      $url = url('admin/country-form');
      $title = "Add Country";
      $data = compact('url', 'title');
      return view('admin.country-form')->with($data);
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
     $countries->status=$request ['status'];

      $countries->save();
      return redirect('admin/countries');
   }

   /////////////////////////////////////////////////////////////////////////////////////

   public function view(request $request)
   {
      $search = $request["search"] ?? "";
      if ($search != "") {
         $countries = countries::where('name', 'like', "%$search%")->get();
      } else {
         $countries = countries::all();
      }
      $data = compact('countries', 'search');
      return view('admin.countries')->with($data);
   }
   /////////////////////////////////////////////////////////////////

   public function delete($id)
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
         return view('admin/country-form')->with($data);
      }
   }

   //////////////////////////////////////////////////////////////



   public function update ($id, Request $request)
   {
     $countries= countries::find($id);
   
     $countries->name=$request ['name'];
     $filename = time() . "fp." . $request->file('flag_pic')->getClientOriginalExtension();
     $countries->flag_pic = $request->file('flag_pic')->storeas('flagpic', $filename);
     $countryname = time() . "cp." . $request->file('cover_pic')->getClientOriginalExtension();
     $countries->cover_pic = $request->file('cover_pic')->storeAs('coverpic', $countryname);
     $countries->status=$request ['status'];
   
   
   $countries->save();
   return redirect('admin/countries');
   }

/////////////////////////////////////////////////////////////



}
