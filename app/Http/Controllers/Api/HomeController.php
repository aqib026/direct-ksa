<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\ServiceResource;
use App\Models\Countries;
use App\Models\Services;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Services::all();
        $countries = Countries::where('status', 1)->get();
        
        $data = [
            'services' => ServiceResource::collection($services),
            'countries' => CountryResource::collection($countries),
        ];
        
        return $data;
    }
    
}
