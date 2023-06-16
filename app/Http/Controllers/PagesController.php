<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Contact;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page, $slug)
    {
        if($slug == 'contact'){
            $page_data = Contact::all();
            $data = compact('page_data');
            return view('frontend.contactPage')->with($data);
        }elseif($slug == 'faq'){
            $page_data = Page::where('page', $slug)->first();
            $data = compact('page_data');
            return view('frontend.faqPage')->with($data);
        }else{
            $page_data = Page::where('page', $slug)->first();
            $data = compact('page_data');
            return view('frontend.contentPage')->with($data);
        }
       
    }

    /**
     * Display a listing of the resource in admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $Page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
    }
}
