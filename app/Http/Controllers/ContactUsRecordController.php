<?php

namespace App\Http\Controllers;

use App\Models\ContactUsRecord;
use Illuminate\Http\Request;

class ContactUsRecordController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
            'category' => 'required',
            'message' => 'required',
            'number' => 'regex:/^[0-9]{9,20}$/',
        ],[
            'number.regex'    => 'Enter valid  mobile number',
        ] );
     
        ContactUsRecord::create([
            'name'  => $request->get('name'),
            'number' => $request->get('number')??null,
            'category' => $request->get('category'),
            'message' => $request->get('message'),
            'email' => $request->get('email')
        ]);

        return redirect()->back()->with('success', 'Your query is submitted successfully,our team will contact as soon as possible');
    }
}
