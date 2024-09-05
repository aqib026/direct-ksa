<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{public function index(){
        
        $bank = Bank::all();
        if(count($bank)>0){
            return response()->json(['success'=>true,'data' => $bank],200);
        }else{
            return response()->json(['success'=>true,'data' => $bank],404);
        }
       
    
    }
}
