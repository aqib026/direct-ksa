<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{public function index(){
        
        $bank = Bank::all();
    return response()->json(['data' => $bank]);
    
    }
}
