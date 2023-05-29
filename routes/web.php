<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Country\CountryController;


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
   



});