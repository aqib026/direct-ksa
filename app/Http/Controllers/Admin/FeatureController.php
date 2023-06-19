<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;



use Illuminate\Http\Request;

class FeatureController extends Controller
{


    public function create()
    {
        $url = url('admin/feature-form');
        $title = "Add Feature";
        $data = compact('url', 'title');
        return view('admin.feature.feature-form')->with($data);
    }
    //////////////////////////////////////////////////////////////////////////////////////
    public function store(request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);


        $feature = new Feature;
        $feature->name = $request['name'];
        $feature->status = $request['status'];
        $feature->save();
        return redirect('admin/feature');
    }
    //////////////////////////////////////////////////////////////////////////////////////
    public function show(request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $feature = Feature::where('name', 'like', "%$search%")->orderby('id', 'desc')->paginate(20);
        } else {
            $feature = Feature::orderby('id', 'desc')->paginate(20);
        }
        $data = compact('feature', 'search');
        return view('admin.feature.feature')->with($data);
    }
    //////////////////////////////////////////////////////////////////////////////
    public function destroy($id)
    {
        $feature = Feature::find($id);
        if (!is_null($feature)) {
            $feature->delete();
        }

        return redirect('admin/feature');
    }
    //////////////////////////////////////////////////////////////////////////
    public function edit($id)
    {

        $feature = Feature::find($id);
        if (is_null($feature)) {
            return redirect('admin/feature');
        } else {
            $url = url('admin/feature-form/update/') . "/" . $id;
            $title = "Edit Feature";
            $data = compact('url', 'title', 'feature');
            return view('admin/feature/feature-form')->with($data);
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function update($id, request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $feature = Feature::find($id);
        $feature->name = $request['name'];
        $feature->status = $request['status'];
        $feature->save();
        return redirect('admin/feature');
    }
    ///////////////////////////////////////////////////////////////////////////////
}
