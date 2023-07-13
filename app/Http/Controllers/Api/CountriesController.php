<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResource;
use App\Http\Resources\RequirementResource;
use App\Models\Countries;
use App\Models\Visa;
use Illuminate\Http\Request;
use function Symfony\Component\Routing\Loader\Configurator\collection;

class CountriesController extends Controller
{
    public function index()
    {
        $country = Countries::where('status', 1)->get();
        return CountryResource::collection($country);
    }
}
