<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use Illuminate\Http\Request;

class VisaRequestController extends Controller
{
    public function show(Request $request, $countryId)
    {
        $countries = Countries::where('status', '1')->get();
        $country = Countries::find($countryId);
        $visaDetails = $country->visatype()->where('status', '1')->first();
        
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
