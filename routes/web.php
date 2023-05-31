<?php

use App\Http\Controllers\Accreditation\AccreditationController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Country\CountryController;
use App\Http\Controllers\feature\FeatureController;
use App\Http\Controllers\Services\ServicesController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
});

route::get('/dashboard',[HomeController::class, 'index']);

Auth::routes();
Route::group(['prefix'=>'/admin'],function(){
    Route::get('/slider', [CountryController::class, 'slider']);

    Route::get('/users',[AdminController::class, 'view'])->middleware(['auth','admin']);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/user/delete/{id}',[AdminController::class, 'delete'])->middleware(['auth','admin']);
    Route::get('/user/edit/{id}',[AdminController::class, 'edit'])->middleware(['auth','admin']);
    Route::POST('/user/update/{id}',[AdminController::class, 'update'])->middleware(['auth','admin']);
    Route::get('/setting',[AdminController::class, 'setting'])->middleware(['auth','admin']);
    Route::get('/countries',[CountryController::class, 'view'])->middleware(['auth','admin']);
    Route::get('/country-form',[CountryController::class, 'form'])->middleware(['auth','admin']);
    Route::POST('/country-form',[CountryController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/countries/delete/{id}',[CountryController::class, 'delete'])->middleware(['auth','admin']);
    Route::get('/country-form/edit/{id}',[CountryController::class, 'edit'])->middleware(['auth','admin']);
    Route::POST('/country-form/update/{id}',[CountryController::class, 'update'])->middleware(['auth','admin']);
    Route::get('/special_services_form',[ServicesController::class, 'form'])->middleware(['auth','admin']);
    Route::get('/special_services',[ServicesController::class, 'view'])->middleware(['auth','admin']);
    Route::POST('/special_services_form',[ServicesController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/special_services/delete/{id}',[ServicesController::class, 'delete'])->middleware(['auth','admin']);
    Route::get('/special_services_form/edit/{id}',[ServicesController::class, 'edit'])->middleware(['auth','admin']);
    Route::POST('/special_services_form/update/{id}',[ServicesController::class, 'update'])->middleware(['auth','admin']);
    Route::get('/feature-form',[FeatureController::class, 'form'])->middleware(['auth','admin']);
    Route::Post('/feature-form',[FeatureController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/feature',[FeatureController::class, 'view'])->middleware('auth','admin');
    Route::get('/feature/delete/{id}',[FeatureController::class, 'delete'])->middleware('auth','admin');
    Route::get('/feature-form/edit/{id}',[FeatureController::class, 'edit'])->middleware('auth','admin');
    Route::Post('/feature-form/update/{id}',[FeatureController::class, 'update'])->middleware('auth','admin');
    Route::get('/accreditation-form',[AccreditationController::class, 'form'])->middleware(['auth','admin']);
    Route::Post('/accreditation-form',[AccreditationController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/accreditation',[AccreditationController::class, 'view'])->middleware('auth','admin');
    Route::get('/accreditation/delete/{id}',[AccreditationController::class, 'delete'])->middleware('auth','admin');
    Route::get('/accreditation-form/edit/{id}',[AccreditationController::class, 'edit'])->middleware('auth','admin');
    Route::Post('/accreditation-form/update/{id}',[AccreditationController::class, 'update'])->middleware('auth','admin');






});
