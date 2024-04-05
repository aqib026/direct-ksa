<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisaProcessController extends Controller
{
    //
    public function storeVisaRequest(Request $request)
    {
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/visa-request-store-api.log'),
         ])->info('request input: /n '.print_r($request->input(), true));

        Log::build([
           'driver' => 'single',
           'path' => storage_path('logs/visa-request-store-api.log'),
        ])->info('request json:  /n'.print_r($request->json(), true));
        $response = [
           'success' => true,
           'json_data'=>$request->json(),
           'form_data'=>$request->input(),
           'message' => 'thnkyou you request is in process'
        ];
        return response()->json($response, 200);
    }
}
