<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CLPSettingController;
use App\Http\Controllers\CLPController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\SubscriptionController;
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

Auth::routes();

Route::get('', [MarketingController::class, 'index'])->name('home');
Route::get('subscription/{package_id}', [SubscriptionController::class, 'subscription'])->name('subscription');
Route::post('storeSubscription', [SubscriptionController::class, 'storeSubscription'])->name('storeSubscription');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('company', CompanyController::class);
    Route::post('getCompany', [CompanyController::class, 'getCompany'])->name('getCompany');
    Route::post('company/update', [CompanyController::class, 'update'])->name('updateCompany');

    Route::resource('employee', EmployeeController::class);
    Route::post('getEmployee', [EmployeeController::class, 'getEmployee'])->name('getEmployee');
    
    Route::resource('card', CardController::class);
    Route::resource('landing', CLPSettingController::class);
    Route::resource('template', TemplateController::class);
    Route::post('getCartTemplate', [TemplateController::class, 'getCartTemplate'])->name('getCartTemplate');
    Route::get('downloadVCard/{id}', [EmployeeController::class, 'downloadVCard'])->name('downloadVCard');
    Route::get('getBCard/{compnay_name}/{id}', [CardController::class, 'getBCard'])->name('getBCard');
    Route::get('clp/{company_name}', [CLPController::class, 'index'])->name('clp');
    Route::get('cardDesign', function(){
        return view('employee.card_design');
    })->name('cardDesign');
});