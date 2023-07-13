<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Countries;
use App\Models\VisaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\VisaTypeResource;

class VisaRequestController extends Controller
{
    public function index(Request $request)
    {
        $visaRequests = VisaRequest::all();
        
        if ($visaRequests) {
            $data = [
                'visaRequests' => VisaTypeResource::collection($visaRequests),
            ];
        } else {
            $data = [
                'error' => 'No visa requests found',
            ];
        }
        
        return $data;
    }
    
}
