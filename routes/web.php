<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientBalanceController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesinvController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\HomeController;
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::group(['middleware' => ['auth']],
        function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');


            Route::resource('category', CategoryController::class);

            Route::resource('product', ProductController::class);
            Route::resource('client', ClientController::class);
            Route::get('client_balance/{id}', [ClientController::class, 'print'])->name('print_client_balance');

            Route::resource('sales', SalesinvController::class);
            Route::get('saleinv/{id}', [SalesinvController::class, 'saleinv'])->name('saleinv');
            Route::post('salesproduct', [SalesinvController::class, 'salesproduct'])->name('salesproduct');
            Route::get('getinvoicedata', [SalesinvController::class, 'getinvoicedata'])->name('getinvoicedata');
            Route::post('deleteproduct', [SalesinvController::class, 'deleteproduct'])->name('deleteproduct');
                Route::get('print/{id}', [SalesinvController::class, 'print'])->name('printinvoice');
            Route::get('settings', [SettingController::class, 'index'])->name('index');
            Route::get('settings/add/{id}', [SettingController::class, 'edit'])->name('edit');
            Route::post('settings/save', [SettingController::class, 'update'])->name('update');
            Route::get('income/index', [ClientBalanceController::class, 'index'])->name('treasray.index');
        });

    require __DIR__ . '/auth.php';
    Route::get('/{page}', [AdminController::class, 'index']);
});
