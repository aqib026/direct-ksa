<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Http\Resources\ServiceResource;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        if (count($services)>0) {
            $data =ServiceResource::collection($services);

            return response()->json(['success'=>true,'data' => $data], 200);
        }else{
            return response()->json(['success'=>true,'data' => $services], 404);
        }
    }
}
