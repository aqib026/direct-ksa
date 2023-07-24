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
use Illuminate\Support\Facades\Session;
class VisaRequestController extends Controller
{
    public function index(Request $request)
    {
        //$visaRequests = VisaRequest::all();
        $countries = Countries::all();
        if ($countries) {
            $data = [
                'visaRequests' => VisaTypeResource::collection($countries),
            ];
        } else {
            $data = [
                'error' => 'No visa requests found',
            ];
        }
        
        return $data;
    }
    public function second(Request $request, $country, $visatype)
    {
        $form_data = '';
        
        if (Session::has('form_data')) {
            $form_data = Session::get('form_data');
            if ($form_data['country'] !== $country || $form_data['visa_type'] !== $visatype) {
                Session::forget('form_data');
                $form_data = '';
            }
        } else {
            $form_data = array('country' => $country, 'visa_type' => $visatype);
        }
        
        $VisaRequest = VisaRequest::where('countries_id', $country)
            ->where('visa_type', $visatype)
            ->first();
        
        return response()->json([
            'VisaRequest' => $VisaRequest,
            'form_data' => $form_data,
        ]);
    }
    
    public function third(Request $request)
    {
        $form_data = $request->all();
        $stepthreedata = Session::get('form_data');
        
        if (isset($stepthreedata) && !is_null($stepthreedata) && $stepthreedata['adult_count'] > 0) {
            $adult_count = $stepthreedata['adult_count'];
            for ($i = 1; $i <= $adult_count; $i++) {
                $filename = time() . $i . "." . $request->file('adult_passport_' . $i)->getClientOriginalExtension();
                $form_data['adult_passport_' . $i] = $request->file('adult_passport_' . $i)->storeAs('passportpic', $filename);
            }
        }
        
        if (isset($stepthreedata) && !is_null($stepthreedata) && $stepthreedata['child_count'] > 0) {
            $child_count = $stepthreedata['child_count'];
            for ($i = 1; $i <= $child_count; $i++) {
                $filename = time() . $i . "." . $request->file('child_passport_' . $i)->getClientOriginalExtension();
                $form_data['child_passport_' . $i] = $request->file('child_passport_' . $i)->storeAs('passportpic', $filename);
            }
        }
        
        if (isset($stepthreedata) && !is_null($stepthreedata) && $stepthreedata['passport_count'] > 0) {
            $passport_count = $stepthreedata['passport_count'];
            for ($i = 1; $i <= $passport_count; $i++) {
                $filename = time() . $i . "." . $request->file('passport_' . $i)->getClientOriginalExtension();
                $form_data['passport_' . $i] = $request->file('passport_' . $i)->storeAs('passportpic', $filename);
            }
        }
        
        Session::put('application_form_data', $form_data);
        
        // Return a JSON response indicating the status and any relevant data
        if (auth()->check()) {
            return response()->json(['status' => 'success', 'message' => 'Form data saved successfully.', 'redirect_url' => route('visa_request_stepfour')]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'User not authenticated. Please log in.', 'redirect_url' => '/api/login']);
        }
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
