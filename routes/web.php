<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


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



});