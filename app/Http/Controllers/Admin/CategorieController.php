<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;



use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function create()
    {
        $url = url('admin/categorie-form');
        $title = "Add Category";
        $data = compact('url', 'title');
        return view('admin.categorie.categorie-form')->with($data);
    }
    //////////////////////////////////////////////////////////////////////////////////////
    public function store(request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);


        $categorie = new categorie;
        $categorie->name = $request['name'];
        $categorie->status = $request['status'];
        $categorie->save();
        return redirect('admin/categorie');
    }
    //////////////////////////////////////////////////////////////////////////////////////
    public function show(request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $categorie = categorie::where('name', 'like', "%$search%");
        } else {
            $categorie = categorie::paginate(6);
        }
        $data = compact('categorie', 'search');
        return view('admin.categorie.categorie')->with($data);
    }
    //////////////////////////////////////////////////////////////////////////////
    public function destroy($id)
    {
        $categorie = categorie::find($id);
        if (!is_null($categorie)) {
            $categorie->delete();
        }

        return redirect('admin/categorie');
    }
    //////////////////////////////////////////////////////////////////////////
    public function edit($id)
    {

        $categorie = categorie::find($id);
        if (is_null($categorie)) {
            return redirect('admin/categorie');
        } else {
            $url = url('admin/categorie-form/update/') . "/" . $id;
            $title = "Edit Category";
            $data = compact('url', 'title', 'categorie');
            return view('admin/categorie/categorie-form')->with($data);
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function update($id, request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $categorie = categorie::find($id);
        $categorie->name = $request['name'];
        $categorie->status = $request['status'];
        $categorie->save();
        return redirect('admin/categorie');
    } //
}
