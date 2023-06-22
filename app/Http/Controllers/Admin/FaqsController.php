<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Faqs;



use Illuminate\Http\Request;

class FaqsController extends Controller
{
     /*
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request){

   }

   public function create()
   {
       $url = url('admin/faqs_form');
       $title = "Add FAQs";
       $categorie= categorie::all();


       $data = compact('url', 'title','categorie');
       return view('admin.faqs.faqs_form')->with($data);
     
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
           'categorie' => 'required',
           'question' => 'required',
           'answer' => 'required',
           'answer_ar' => 'required',
        'question_ar' => 'required',
           
       ]);


       $faqs = new Faqs();

       $faqs->categorie_id = $request['categorie'];
       $faqs->question = $request['question'];
       $faqs->answer = $request['answer'];
       $faqs->answer_ar = $request['answer_ar'];
       $faqs->question_ar = $request['question_ar'];
       $faqs->status = $request['status'];
       $faqs->save();
      
       return redirect('admin/faqs');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show()
   {
       $search = $request["search"] ?? "";
       if ($search != "") {
           $faqs =Faqs::where('categorie', 'like', "%$search%")->get();
       } else {
           $faqs = Faqs::paginate(6);
       }
       $data = compact('faqs', 'search');
       return view('admin.faqs.faqs')->with($data);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $faqs = Faqs::find($id);
       if (is_null($faqs)) {    //not found
           return redirect('admin/faqs');
       } else {
           $url = url('admin/faqs_form/update') . "/" . $id;
           $title = "Update FAQs";
           $categorie= categorie::all();


           $data = compact('faqs', 'url', 'title','categorie');
           return view('admin/faqs/faqs_form')->with($data);
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
        'categorie' => 'required',
        'answer' => 'required',
        'question' => 'required',
        'answer_ar' => 'required',
        'question_ar' => 'required',
       ]);

       $faqs = Faqs::find($id);

       $faqs->categorie_id = $request['categorie'];
       $faqs->answer = $request['answer'];
       $faqs->question = $request['question'];
        $faqs->answer_ar = $request['answer_ar'];
       $faqs->question_ar = $request['question_ar'];
       $faqs->status = $request['status'];
       $faqs->save();
       return redirect('admin/faqs');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $faqs = Faqs::find($id);
       if (!is_null($faqs)) {
           $faqs->delete();
       }

       return redirect('admin/faqs');
   }

}
