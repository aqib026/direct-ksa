<?php

namespace App\Http\Controllers\feature;

use App\Http\Controllers\Controller;
use App\Models\feature;



use Illuminate\Http\Request;

class FeatureController extends Controller
{


public function form()
{
   $url =url('admin/feature-form');
   $title="Add Feature";
   $data =compact('url','title');
   return view('admin.feature-form')->with($data);
}
//////////////////////////////////////////////////////////////////////////////////////
public function store(request $request)
{
    $request->validate([
'name'=>'required'
    ]);


$feature = new feature;
$feature->name=$request['name'];
$feature->status=$request['status'];
$feature->save();
return redirect('admin/feature');
}
//////////////////////////////////////////////////////////////////////////////////////
public function view(request $request)
{
$search=$request['search'] ?? "";
if($search != "")
{
    $feature =feature::where('name','like',"%$search%");
}

    else
    {
$feature =feature::all();
    }
    $data=compact('feature','search');
    return view('admin.feature')->with($data);



}
//////////////////////////////////////////////////////////////////////////////
public function delete($id)
{
    $feature = feature::find($id);
    if(!is_null($feature))
    {
        $feature->delete();
    }

   return redirect('admin/feature');
}
//////////////////////////////////////////////////////////////////////////
public function edit($id)
{

    $feature=feature::find($id);
    if(is_null($feature))
    {
       return redirect('admin/feature');
    }
    else
    {
        $url=url('admin/feature-form/update/')."/".$id;
        $title= "Edit Feature";
        $data =compact('url','title','feature');
        return view('admin/feature-form')->with($data);
    }


}
/////////////////////////////////////////////////////////////////////////////////////
public function update($id ,request $request)
{
    $request->validate([
        'name'=>'required'
    ]);

    $feature = feature::find($id);
    $feature->name=$request['name'];
        $feature->status=$request['status'];
        $feature->save();
        return redirect('admin/feature');
}
///////////////////////////////////////////////////////////////////////////////
}
