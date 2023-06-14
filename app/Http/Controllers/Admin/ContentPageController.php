<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;


class ContentPageController extends Controller
{ 
   
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($page_type)
   {
      $page = Page::where('page', $page_type)->first();
      $url = url('admin/content_pages/') . "/" . $page_type;
      $title = strtoupper( str_replace('_', ' ', $page_type));
      $title = "Update ".$title;
      return view('admin.pages.edit', compact('page', 'title', 'url'));
   }


   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update($page_type, Request $request)
   {
      $request->validate([
         'title' => 'required'
      ]);

      $page = Page::where('page', $page_type)->first();
      $page->title    = $request['title'];
      $page->content  = $request['content'];
      $page->save();

      return redirect( route('content_pages',$page_type));
   }
}
