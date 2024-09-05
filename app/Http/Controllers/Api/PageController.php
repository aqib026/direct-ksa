<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FaqResource;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Page;
use App\Models\Contact;

class PageController extends Controller
{
    public function index(Page $page, $slug=null)
    {
        if (isset($slug)) {
            if ($slug == 'contact') {
                $page_data = Contact::all();
                return response()->json(['success'=>true,'data' => $page_data]);
            } elseif ($slug == 'faq') {
                $page_data = Categorie::all();
                $data= FaqResource::collection($page_data);
                return response()->json(['success'=>true ,'data' => $data], 200);
            } else {
                $page_data = Page::where('page', $slug)->first();
                if (isset($page_data)) {
                    $response = [
                        'title'=> $page_data ->title,
                        'title_ar'=> $page_data ->title_ar,
                        'content'=> strip_tags($page_data ->content),
                        'content_ar'=> strip_tags($page_data ->content_ar)
                    ];
                    return response()->json(['success'=>true ,'data' => $response], 200);
                } else {
                    return response()->json(['success'=>true ,"message"=> "No data found",'data'=>null], 404);
                }
            }
        } else {
            return response()->json(['success'=>false ,"message"=> "Please add slug in request params"], 400);
        }
    }
}
