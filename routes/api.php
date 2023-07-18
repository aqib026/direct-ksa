<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServicesController;
use App\Http\Controllers\Api\CountriesController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\RequirementsController;
use App\Http\Controllers\Api\VisaRequestController;
use App\Http\Controllers\Api\FeaturedController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [HomeController::class, 'index'])->name('Home');
Route::get('/services-list', [ServicesController::class, 'index'])->name('services-list');
Route::get('/countries-list', [CountriesController::class, 'index'])->name('countries-list');
Route::get('/requirement/{country?}',[RequirementsController::class, 'index'])->name('requirement-list');
Route::get('/visarequest',[VisaRequestController::class, 'index'])->name('visa-list');
Route::get('/featured-services',[FeaturedController::class, 'index'])->name('featured-show');
Route::middleware('auth:sanctum')->get('/user/services',[FeaturedController::class, 'services'])->name('featured-show-id');
Route::middleware('auth:sanctum')->get('/user/services/{id}', [FeaturedController::class, 'detail']);
Route::POST('/featured-sales', [FeaturedController::class, 'store'])->name('featured-store');



Route::POST('register',[LoginController::class,'register'])->name('register-api');
Route::POST('login',[LoginController::class,'login'])->name('login-api');

