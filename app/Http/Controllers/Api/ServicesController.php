<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Http\Resources\ServiceResource;


class ServicesController extends Controller
{

    public function index(){

        $services = Services::where('status',1)->get();
        return ServiceResource::collection($services);

    }

}
