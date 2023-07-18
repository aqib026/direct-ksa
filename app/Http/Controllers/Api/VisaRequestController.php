<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Countries;
use App\Models\VisaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\VisaTypeResource;
use Illuminate\Support\Facades\Auth;
use App\Models\UserVisaApplications;
use App\Models\VisaNote;
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
    
    public function visa()
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $accre = UserVisaApplications::where('user_id', Auth::user()->id)->get();
                $data = array();
                foreach ($accre as $acc) {
                    $content = unserialize($acc['content']);
                    $country = Countries::where('id', $content['country'])->first();
                    $content['country_name'] = $country;
                    $data[] = $content;
                }
                return response()->json(['data' => $data], 200);
            } else {
                return response()->json(['message' => 'Unauthorized.'], 401);
            }
        } else {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
    }
    
    public function visarequest($id)
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $accre = UserVisaApplications::find($id);
                if ($accre) {
                    $data = unserialize($accre->content);
                    $country = Countries::where('id', $data['country'])->first();
                    $data['country_name'] = $country->name;
                    $notes = VisaNote::where('visa_request_id', $id)->get();
                    return response()->json(['data' => $data, 'notes' => $notes], 200);
                } else {
                    return response()->json(['message' => 'Visa Request not found.'], 404);
                }
            } else {
                return response()->json(['message' => 'Unauthorized.'], 401);
            }
        } else {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
    }

}
