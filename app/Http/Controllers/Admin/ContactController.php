<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
   /*
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request){

   }

   public function create()
   {
       $url = url('admin/contact_form');
       $title = "Add Contact ";

       $data = compact('url', 'title');
       return view('admin.contact_location.location_form')->with($data);
     
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
           'name_ar' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
           'lat' => 'required',
           'long' => 'required',
           
       ]);


       $location = new Contact();

       $location->name = $request['name'];
        $location->name_ar = $request['name_ar'];
        $location->address = $request['address'];
        $location->address_ar = $request['address_ar'];
        $location->latitude = $request['lat'];
       $location->longitude = $request['long'];
       $location->status = $request['status'];
       $location->save();
      
       return redirect('admin/contact_location');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show()
   {
       $search = $request["search"] ?? "";
       if ($search != "") {
           $location =Contact::where('name', 'like', "%$search%")->paginate(20);
       } else {
           $location = Contact::paginate(20);
       }
       $data = compact('location', 'search');
       return view('admin.contact_location.contact_location')->with($data);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $location = Contact::find($id);
       if (is_null($location)) {    //not found
           return redirect('admin/contact_location');
       } else {
           $url = url('admin/contact_form/update') . "/" . $id;
           $title = "Update Contact location";


           $data = compact('location', 'url', 'title');
           return view('admin/contact_location/location_form')->with($data);
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
        'name_ar' => 'required',
        'address' => 'required',
        'address_ar' => 'required',
        'lat' => 'required',
        'long' => 'required',
       ]);

       $location = Contact::find($id);

       $location->name = $request['name'];
       $location->name_ar = $request['name_ar'];
       $location->address = $request['address'];
       $location->address_ar = $request['address_ar'];
       $location->latitude = $request['lat'];
       $location->longitude = $request['long'];
       $location->status = $request['status'];
       $location->save();
       return redirect('admin/contact_location');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $location = Contact::find($id);
       if (!is_null($location)) {
           $location->delete();
       }

       return redirect('admin/contact_location');
   }

}
