<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class LocalizationController extends Controller
{
    public function setlang($locale)
    {
        App::setlocale($locale);
        session::Put("locale",$locale);
        return redirect()->back();
    }
}
