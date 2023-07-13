<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Request;
use App\Http\Resources\RequirementResource;

class RequirementsController extends Controller
{
    public function index(Request $request, $countryId)
    {
        $countries = Countries::where('status', '1')->get();
        $country = Countries::find($countryId);
        
        if ($countries && $country ) {
            $visaDetails = $country->visa()->get();
            $data = [
                'countries' => CountryResource::collection($countries),
                'visaDetails' => RequirementResource::collection($visaDetails),
            ];
        } else {
            $data = [
                'error' => 'Country not found'
            ];
        }
        
        return $data;
    }
    
}

