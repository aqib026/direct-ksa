<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class CashController extends Controller
{
public function index(){
    
    $cash = Branch::all();
    if(count($cash)>0){
        return response()->json(['success'=>true,'data' => $cash],200);
    }else{
        return response()->json(['success'=>true,'data' => $cash],404);
    }
    
    
}
}
