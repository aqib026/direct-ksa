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
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\BankController;
use App\Http\Controllers\Api\CashController;
use App\Http\Controllers\Api\OnlinePaymentController;
use App\Http\Controllers\Api\OtpController;
use App\Http\Controllers\Api\VisaProcessController;

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
Route::get('/visa_request/{country_id?}/{visa_type?}',[VisaRequestController::class, 'second'])->name('visa-detail-page');
Route::Post('/visa_request/application_form',[VisaRequestController::class,'third'])->name('visa_application_form');
Route::Post('/visa_request/payment',[VisaRequestController::class,'forth'])->name('visa_payment_form');

Route::get('/page/{slug?}', [PageController::class, 'index'])->name('contentpage');
Route::get('/bank', [BankController::class, 'index'])->name('bank');
Route::get('/cash', [CashController::class, 'index'])->name('cash');

Route::middleware('auth:sanctum')->get('/user/services',[FeaturedController::class, 'services'])->name('featured-show-id');
Route::middleware('auth:sanctum')->get('/user/services/{id}', [FeaturedController::class, 'detail']);
Route::middleware('auth:sanctum')->get('/user/visarequest', [VisaRequestController::class, 'visa']);
Route::middleware('auth:sanctum')->get('/user/visarequest/{id}', [VisaRequestController::class, 'visarequest']);
Route::POST('/featured-sales', [FeaturedController::class, 'store'])->name('featured-store');

Route::POST('verify-email',[LoginController::class,'verifyEmail'])->name('verify-email');

Route::POST('register',[LoginController::class,'register'])->name('register-api');
Route::POST('login',[LoginController::class,'login'])->name('login-api');

Route::POST('otp-login',[OtpController::class,'loginOtp']);
Route::POST('otp-verification',[OtpController::class,'otpVerification']);

Route::middleware('auth:sanctum')->post('store-visa-request',[VisaProcessController::class,'storeVisaRequest']);

Route::middleware('auth:sanctum')->post('/payment-store', [OnlinePaymentController::class, 'storePaymentData']);

