<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AccreditationController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\VisaController;
use App\Http\Controllers\FeaturedSalesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\VisaRequestController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ContentPageController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\user\UserController; 
use Illuminate\Support\Facades\Artisan;








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



route::get('/dashboard',[HomeController::class, 'index']);

route::get('/config-clear', function () {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('migrate');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');

    return 'Config cache cleared';
});


Auth::routes();
Route::group(['prefix'=>'/admin'],function(){

    Route::get('/login', function () {
        return view('auth.login');
    });
    
    Route::get('/dashboard', [HomeController::class, 'index']);

    Route::get('/content_pages/{page_type}', [ContentPageController::class, 'edit'])->name('content_pages');
    Route::post('/content_pages/{page_type}', [ContentPageController::class, 'update'])->name('content_pages_post');

    Route::get('/slider', [CountryController::class, 'slider']);
    Route::get('/slider/show/{id}', [VisaController::class, 'one']);

    Route::get('/add-user',[AdminController::class, 'create'])->middleware(['auth','admin']);
    Route::post('/add-user',[AdminController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/profile/edit/{id}',[AdminController::class, 'new']);
    Route::post('/profile/update/{id}',[AdminController::class, 'add']);
    Route::get('/users',[AdminController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/user/delete/{id}',[AdminController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/user/edit/{id}',[AdminController::class, 'edit'])->middleware(['auth','admin']);
    Route::post('/user/update/{id}',[AdminController::class, 'update'])->middleware(['auth','admin']);
    Route::get('/setting',[AdminController::class, 'setting'])->middleware(['auth','admin']);

    Route::get('/countries',[CountryController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/country-form',[CountryController::class, 'create'])->middleware(['auth','admin']);
    Route::post('/country-form',[CountryController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/countries/delete/{id}',[CountryController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/country-form/edit/{id}',[CountryController::class, 'edit'])->middleware(['auth','admin']);
    Route::post('/country-form/update/{id}',[CountryController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/special_services_form',[ServicesController::class, 'create'])->middleware(['auth','admin']);
    Route::get('/special_services',[ServicesController::class, 'show'])->middleware(['auth','admin']);
    Route::post('/special_services_form',[ServicesController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/special_services/delete/{id}',[ServicesController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/special_services_form/edit/{id}',[ServicesController::class, 'edit'])->middleware(['auth','admin']);
    Route::post('/special_services_form/update/{id}',[ServicesController::class, 'update'])->middleware(['auth','admin']);

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
    Route::get('/contact',[LocationController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/contact/delete/{id}',[LocationController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/location_form/edit/{id}',[LocationController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/location_form/update/{id}',[LocationController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/featured_sales',[FeaturedSalesController::class, 'list'])->middleware(['auth','admin'])->name('featured_sales_list');
    Route::get('/featured_sales/view/{id}',[FeaturedSalesController::class, 'show'])->middleware(['auth','admin'])->name('featured_sales_show');
    Route::get('/featured_sales/delete/{id}',[FeaturedSalesController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/featured_sales/edit/{id}',[FeaturedSalesController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/featured_sale/update/{id}',[FeaturedSalesController::class, 'update'])->middleware(['auth','admin']);
    Route::get('/featured_sales/edit',[FeaturedSalesController::class, 'create'])->middleware(['auth','admin']);

    Route::get('/visarequest_form',[VisaRequestController::class, 'create'])->middleware(['auth','admin']);
    Route::get('/visarequest/{country_id?}',[VisaRequestController::class, 'show'])->middleware(['auth','admin']);
    Route::post('visarequest_form',[VisaRequestController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/visarequest/delete/{id}',[VisaRequestController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/visarequest_form/edit/{id}',[VisaRequestController::class, 'edit'])->middleware(['auth','admin']);
    Route::post('/visarequest_form/update/{id}',[VisaRequestController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/contact_form',[ContactController::class, 'create'])->middleware(['auth','admin']);
    Route::get('/contact_location',[ContactController::class, 'show'])->middleware(['auth','admin']);
    Route::post('contact_form',[ContactController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/contact_location/delete/{id}',[ContactController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/contact_form/edit/{id}',[ContactController::class, 'edit'])->middleware(['auth','admin']);
    Route::post('/contact_form/update/{id}',[ContactController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/faqs_form',[FaqsController::class, 'create'])->middleware(['auth','admin']);
    Route::get('/faqs',[FaqsController::class, 'show'])->middleware(['auth','admin']);
    Route::post('faqs_form',[FaqsController::class, 'store'])->middleware(['auth', 'admin']);
    Route::Get('/faqs/delete/{id}',[FaqsController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/faqs_form/edit/{id}',[FaqsController::class, 'edit'])->middleware(['auth','admin']);
    Route::post('/faqs_form/update/{id}',[FaqsController::class, 'update'])->middleware(['auth','admin']);

    Route::get('/categorie-form',[CategorieController::class, 'create'])->middleware(['auth','admin']);
    Route::Post('/categorie-form',[CategorieController::class, 'store'])->middleware(['auth','admin']);
    Route::get('/categorie',[CategorieController::class, 'show'])->middleware(['auth','admin']);
    Route::get('/categorie/delete/{id}',[CategorieController::class, 'destroy'])->middleware(['auth','admin']);
    Route::get('/categorie-form/edit/{id}',[CategorieController::class, 'edit'])->middleware(['auth','admin']);
    Route::Post('/categorie-form/update/{id}',[CategorieController::class, 'update'])->middleware(['auth','admin']);

    
    Route::post('/notes',[NoteController::class, 'store'])->middleware(['auth', 'admin']);
    Route::get('/notes/delete/{id}',[NoteController::class, 'destroy'])->middleware(['auth','admin']);
    
});



Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/featured_sales/{service?}', [FeaturedSalesController::class, 'index'])->name('featured_sales');
Route::Post('/featured_sales', [FeaturedSalesController::class, 'store'])->name('featured_sales_post');
Route::get('/featured_sales_thankyou', [FeaturedSalesController::class, 'thankyou'])->name('featured_sales_thankyou');
Route::get('/requirement/{country}',[FrontendController::class, 'show']);





Route::get('/visa_request', [VisaRequestController::class, 'index'])->name('visa_request');
Route::get('/visa_request/{country?}/{visatype?}', [VisaRequestController::class, 'steptwo'])->name('visa_request_steptwo');
Route::post('/visa_request', [VisaRequestController::class, 'payment_form'])->name('visa_request_payment_form');
Route::get('/page/{slug?}', [PagesController::class, 'index'])->name('content_page');


Route::get('/locale/{lange}',[LocalizationController::class,'setlang']);


Route::group(['prefix'=>'/user'],function(){

Route::get('/login', function () {
    return view('user.layout.userlogin');
});
Route::get('/user/register', function () {
    return view('user.layout.userregistration');
});
Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'user']);
Route::get('/profile/edit/{id}',[UserController::class, 'edit'])->middleware(['auth','user']);
Route::post('/profile/update/{id}',[UserController::class, 'update'])->middleware(['auth','user']);
Route::get('/password/edit/{id}',[UserController::class, 'passwordedit'])->middleware(['auth','user']);
Route::post('/password/update/{id}',[UserController::class, 'passwordupdate'])->middleware(['auth','user']);

Route::get('/forgetpassword',[EmailController::class, 'create']);
Route::post('/email',[EmailController::class, 'send'])->name('email');
Route::get('/resetpassword',[EmailController::class, 'reset']);

});