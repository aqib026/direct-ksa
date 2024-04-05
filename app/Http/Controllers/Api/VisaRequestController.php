<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Models\Countries;
use App\Models\VisaRequest;
use Illuminate\Http\Request;
use App\Http\Resources\VisaTypeResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserVisaApplications;
use App\Models\VisaNote;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;
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
    
    public function third(Request $request): JsonResponse
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // User is not authenticated
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated. Please log in.',
                'redirect_url' => '/api/login'
            ]);
        }
        
        // User is authenticated, proceed with form data and passport image processing
        $form_data = $request->all();
        $stepthreedata = Session::get('form_data');
        
        // Your existing code for saving passport images...
        if (isset($stepthreedata) && !is_null($stepthreedata)) {
            if ($stepthreedata['adult_count'] > 0) {
                $adult_count = $stepthreedata['adult_count'];
                for ($i = 1; $i <= $adult_count; $i++) {
                    $filename = time() . $i . "." . $request->file('adult_passport_' . $i)->getClientOriginalExtension();
                    $form_data['adult_passport_' . $i] = $request->file('adult_passport_' . $i)->storeAs('passportpic', $filename);
                }
            }
            
            if ($stepthreedata['child_count'] > 0) {
                $child_count = $stepthreedata['child_count'];
                for ($i = 1; $i <= $child_count; $i++) {
                    $filename = time() . $i . "." . $request->file('child_passport_' . $i)->getClientOriginalExtension();
                    $form_data['child_passport_' . $i] = $request->file('child_passport_' . $i)->storeAs('passportpic', $filename);
                }
            }
            
            if ($stepthreedata['passport_count'] > 0) {
                $passport_count = $stepthreedata['passport_count'];
                for ($i = 1; $i <= $passport_count; $i++) {
                    $filename = time() . $i . "." . $request->file('passport_' . $i)->getClientOriginalExtension();
                    $form_data['passport_' . $i] = $request->file('passport_' . $i)->storeAs('passportpic', $filename);
                }
            }
        }
        
        Session::put('application_form_data', $form_data);
        
        // Return a JSON response with status, message, and redirect URL for a successful form submission
        return response()->json([
            'status' => 'success',
            'message' => 'Form data saved successfully.',
            'redirect_url' => route('visa_request_stepfour')
        ]);
    }
    public function forth(Request $request)
    {
        // Check if the user is authenticated via API authentication
        if (Auth::check()) {
            $form_data = $request->all();
            
            if (Session::has('form_data') && Session::has('application_form_data')) {
                $data = Session::get('form_data');
                $data['application_form_data'] = Session::get('application_form_data');
                $data['payment_form_data'] = $form_data['payment_method'];
            } else {
                return response()->json(['error' => 'Form data not found'], 400);
            }
            
            $visaRequest = new UserVisaApplications();
            $visaRequest->user_id = auth()->user()->id;
            $visaRequest->content = serialize($data);
            $visaRequest->save();
            
            return response()->json(['message' => 'Payment form data saved successfully']);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
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
        if (isset($id)) {
            $user = User::find($id);
            if(isset($user)){
                if ($user->usertype == 'customer' || $user->usertype == 'user') {
                    $accre = UserVisaApplications::where('user_id',$user->id)->get();
                    if (count($accre)>0) {
                        $data=[];
                        foreach($accre as $key =>$value){
                        $content = unserialize($value->content);
                        $data[$key]['content']=$content;
                        if(isset($content ['country_id'])){
                            $country = Countries::where('id', $content ['country_id'])->first();
                        }elseif(isset($content ['country_id'])){
                            $country = Countries::where('id',$content ['country_id'])->first();
                        }
                        $data[$key]['country_name'] = $country->name;
                        $notes = VisaNote::where('visa_request_id', $value->id)->get();
                        $data[$key]['visa_notes']=$notes;
                        }
                        
                        return response()->json(['success'=>true,'data' => $data], 200);
                    } else {
                        return response()->json(["success"=>false,'message' => 'Visa Request not found.'], 404);
                    }
                } else {
                    return response()->json(["success"=>false,'message' => 'Unauthorized.'], 401);
                }
            }
            else{
                return response()->json(["success"=>false,'message' => 'User is not found against given id'], 404);
            }
        } else {
            return response()->json(["success"=>false,'message' => 'Id of the user is not found'], 500);
        }
    }

}
