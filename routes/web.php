<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\SalesinvController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'before' => 'LaravelLocalizationRedirectFilter',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['middleware'=>['auth']],
        function (){
            Route::get('/', function () {
                return view('backend.dashboard');
            })->name('dashboard');
            Route::resource('category',CategoryController::class);
            Route::resource('product',ProductController::class);
            Route::post('product_search',[ProductController::class,'search'])->name('search');
            Route::resource('client',ClientController::class);
            Route::resource('sales',SalesinvController::class);
            Route::get('saleinv/{id}',[SalesinvController::class,'saleinv'])->name('saleinv');
            Route::get('settings',[SettingController::class,'index'])->name('index');
            Route::get('settings/add',[SettingController::class,'create'])->name('create');
            Route::post('settings/save',[SettingController::class,'store'])->name('store');
          
        });

    require __DIR__.'/auth.php';
    Route::get('/{page}', [AdminController::class,'index']);

});
