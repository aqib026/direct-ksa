<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class CashController extends Controller
{
public function index(){
    
    $cash = Branch::all();
    return response()->json(['data' => $cash]);
    
}
}
