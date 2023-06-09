<?php

namespace App\Http\Controllers;

use App\Models\FeaturedSales;
use App\Models\Note;



use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function store(request $request)
    {

        $FeaturedSales = FeaturedSales::where('id', $request->post_slug)->first();
        if ($FeaturedSales) {
            Note::create([
                "featured_id" => $request->post_slug,
                "note" => $request->note

            ]);
            return redirect()->back();
        } 
    }

   
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);
        if (!is_null($note)) {
           $note->delete();
        }
  
        return redirect()->back();
    }

}
