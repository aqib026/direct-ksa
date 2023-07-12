<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url('admin/bank-form');
        $title = "Add bank";
        $data = compact('url', 'title');
        return view('admin.bank.bank-form')->with($data);
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
            'name' => 'required',
            'name_ar' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
        
        
        ]);
        
        
        $bank = new Bank;
        $bank->name = $request['name'];
        $bank->name_ar = $request['name_ar'];
        $bank->address = $request['address'];
        $bank->address_ar = $request['address_ar'];
        
        $filename = time() . "bank." . $request->file('banner')->getClientOriginalExtension();
        $bank->banner = $request->file('banner')->storeas('bank', $filename);
        
        $bank->status = $request['status'];
        
        $bank->save();
        return redirect('admin/bank');
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
            $bank = Bank::where('name', 'like', "%$search%")->paginate(20);
        } else {
            $bank = Bank::paginate(6);
        }
        $data = compact('bank', 'search');
        return view('admin.bank.bank')->with($data);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        if (!is_null($bank)) {
            $bank->delete();
        }
        
        return redirect('admin/bank');
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::find($id);
        if (is_null($bank)) {    //not found
            return redirect('admin/bank');
        } else {
            $url = url('admin/bank-form/update') . "/" . $id;
            $title = "Update bank";
            
            $data = compact('bank', 'url', 'title');
            return view('admin/bank/bank-form')->with($data);
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
            'name' => 'required',
            'name_ar' => 'required',
            'address' => 'required',
            'address_ar' => 'required',
        ]);
        $bank = Bank::find($id);
        
        $bank->name = $request['name'];
        $bank->name_ar = $request['name_ar'];
        $bank->address = $request['address'];
        $bank->address_ar = $request['address_ar'];
        
        if(isset($request) && !empty($request->file('banner'))){
            $filename = time() . "bank." . $request->file('banner')->getClientOriginalExtension();
            $bank->banner = $request->file('banner')->storeas('bank', $filename);
        }
        $bank->status = $request['status'];
        
        
        $bank->save();
        return redirect('admin/bank');
    }

    
}
