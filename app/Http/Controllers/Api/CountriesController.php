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
        $country=Countries::where('status',1)->get();
        return CountryResource::collection($country);
    }
    public function show(Request $request, $countryId)
    {
        $countries = Countries::where('status', '1')->get();
        $country = Countries::find($countryId);
        $visaDetails = $country->visa()->where('status', '1')->first();
        
        if ($countries && $country && $visaDetails) {
            return response()->json([
                'countries' => $countries,
                'country' => $country,
                'visaDetails' => $visaDetails
            ]);
        } else {
            return response()->json(['error' => 'Country not found'], 404);
        }
    }
}
