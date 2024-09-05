<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\RequirementResource;
use App\Models\Countries;
use App\Models\Visa;
use Illuminate\Http\Request;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class CountriesController extends Controller
{
    public function index()
    {
        $country = Countries::where('status', 1)->get();
        if(count($country)>0){
            $data= CountryResource::collection($country);
            return response()->json(['success'=>true,'data' => $data], 200);
        }else{
            return response()->json(['success'=>true,'data' => $country], 404);
        }
        
    }
}
