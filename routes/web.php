<?php


use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AccreditationController;
use App\Http\Controllers\Admin\VisaController;
use App\Http\Controllers\FeaturedSalesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\LocationController;









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
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/slider', [CountryController::class, 'slider']);
    Route::get('/add-user',[AdminController::class, 'create'])->middleware(['auth','admin']);
    Route::POST('/add-user',[AdminController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/profile/edit/{id}',[AdminController::class, 'new']);
    Route::POST('/profile/update/{id}',[AdminController::class, 'add']);
    Route::get('/users',[AdminController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/user/delete/{id}',[AdminController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/user/edit/{id}',[AdminController::class, 'edit'])->middleware(['auth','admin']);
    Route::POST('/user/update/{id}',[AdminController::class, 'update'])->middleware(['auth','admin']);
    Route::get('/setting',[AdminController::class, 'setting'])->middleware(['auth','admin']);

    Route::get('/countries',[CountryController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/country-form',[CountryController::class, 'create'])->middleware(['auth','admin']);
    Route::POST('/country-form',[CountryController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/countries/delete/{id}',[CountryController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/country-form/edit/{id}',[CountryController::class, 'edit'])->middleware(['auth','admin']);
    Route::POST('/country-form/update/{id}',[CountryController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/special_services_form',[ServicesController::class, 'create'])->middleware(['auth','admin']);
    Route::get('/special_services',[ServicesController::class, 'show'])->middleware(['auth','admin']);
    Route::POST('/special_services_form',[ServicesController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/special_services/delete/{id}',[ServicesController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/special_services_form/edit/{id}',[ServicesController::class, 'edit'])->middleware(['auth','admin']);
    Route::POST('/special_services_form/update/{id}',[ServicesController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/feature-form',[FeatureController::class, 'create'])->middleware(['auth','admin']);
    Route::Post('/feature-form',[FeatureController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/feature',[FeatureController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/feature/delete/{id}',[FeatureController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/feature-form/edit/{id}',[FeatureController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/feature-form/update/{id}',[FeatureController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/accreditation-form',[AccreditationController::class, 'create'])->middleware(['auth','admin']);
    Route::Post('/accreditation-form',[AccreditationController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/accreditation',[AccreditationController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/accreditation/delete/{id}',[AccreditationController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/accreditation-form/edit/{id}',[AccreditationController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/accreditation-form/update/{id}',[AccreditationController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/visa_form',[VisaController::class, 'create'])->middleware(['auth','admin']);
    Route::Post('/visa_form',[VisaController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/visa_requirement',[VisaController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/visa_requirement/delete/{id}',[VisaController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/visa_form/edit/{id}',[VisaController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/visa_form/update/{id}',[VisaController::class, 'update'])->middleware(['auth','admin']);
    
    Route::get('/location_form',[LocationController::class, 'create'])->middleware(['auth','admin']);
    Route::Post('/location_form',[LocationController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/contact_location',[LocationController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/contact_location/delete/{id}',[LocationController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/location_form/edit/{id}',[LocationController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/location_form/update/{id}',[LocationController::class, 'update'])->middleware(['auth','admin']);
});



Route::get('/index',[FrontendController::class, 'index']);
Route::get('/featured_sales',[FeaturedSalesController::class, 'index'])->name('featured_sales');
Route::Post('/featured_sales',[FeaturedSalesController::class, 'store'])->name('featured_sales_post');
