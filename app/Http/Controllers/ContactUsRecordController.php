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
            'number.regex'    => __('register.number_regex_validation'),
            'name.required'    => __('contact.name_required_validation'),
            'email.required'    => __('contact.email_required_validation'),
            'category.required'    => __('contact.category_required_validation'),
            'message.required'    => __('contact.message_required_validation'),
        ] );
        
     
        ContactUsRecord::create([
            'name'  => $request->get('name'),
            'number' => $request->get('number')??null,
            'category' => $request->get('category'),
            'message' => $request->get('message'),
            'email' => $request->get('email')
        ]);

        return redirect()->back()->with('success', __('contact.success_message'));
    }
}
