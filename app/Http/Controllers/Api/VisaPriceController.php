<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VisaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisaPriceController extends Controller
{
    //
    public function priceList(Request $request)
    {
        $input=$request->input();
        $validator =Validator::make($request->all(), [
            'visa_type'=>'required',
            'country_id'=>'required|exists:countries,id']);
        if ($validator->fails()) {
            $response=[
                'success'=> false,
                'message'=>$validator->errors()
            ];
            return response()->json($response, 400);
        }
        $price_list = VisaRequest::where('countries_id', $input['country_id'])
            ->where('visa_type', $input['visa_type'])
            ->first();
        if (isset($price_list)) {
            $response=[
                'success'=> true,
                'data'=>$price_list
            ];
            return response()->json($response, 200);
        } else {
            $response=[
                'success'=> false,
                'message'=>"Not found record against given country data"
            ];
            return response()->json($response, 404);
        }
    }
}
