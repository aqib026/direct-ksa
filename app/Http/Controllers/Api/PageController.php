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
    public function index(Page $page, $slug)
    {
        if ($slug == 'contact') {
            $page_data = Contact::all();
            return response()->json(['data' => $page_data]);
        } elseif ($slug == 'faq') {
            $page_data = Categorie::all();
           return FaqResource::collection($page_data);
        } else {
            $page_data = Page::where('page', $slug)->first();
            $response = [
                'title'=> $page_data ->title,
                'title_ar'=> $page_data ->title_ar,
                'content'=> strip_tags($page_data ->content),
                'content_ar'=> strip_tags($page_data ->content_ar)
            ];
            return response()->json(['data' => $response]);
        }
    }
}
