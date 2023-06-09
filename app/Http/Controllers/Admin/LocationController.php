<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\location;


use Illuminate\Http\Request;

class LocationController extends Controller
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
        $url = url('admin/location_form');
        $title = "Add Contact Location ";

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
            'address' => 'required',
            'lat' => 'required',
            'lang' => 'required'


        ]);


        $location = new location;

        $location->name = $request['name'];

        $location->address = $request['address'];
        $location->lat = $request['lat'];
        $location->lang = $request['lang'];
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
        // return countries::find(23)->location;
        // die;
        $search = $request["search"] ?? "";
        if ($search != "") {
            $location = location::where('name', 'like', "%$search%")->get();
        } else {
            $location = location::paginate(6);
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
        $location = location::find($id);
        if (is_null($location)) {    //not found
            return redirect('admin/contact_location');
        } else {
            $url = url('admin/location_form/update') . "/" . $id;
            $title = "Update Contact Location";

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
            'name' => 'required'
        ]);
        $location = location::find($id);

        $location->name = $request['name'];
        $location->address = $request['address'];
        $location->lat = $request['lat'];
        $location->lang = $request['lang'];
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
        $location = location::find($id);
        if (!is_null($location)) {
            $location->delete();
        }

        return redirect('admin/contact_location');
    }



    // public function one($id)
    // {
    //     return countries::find($id)->location;   used to show one to one relation 

    // }
}
