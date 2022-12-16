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
                /*=====> Category Routes <=====*/
                Route::group(['prefix' => 'Category'], function () {
                    Route::get('/index', [CategoryController::class, 'index'])->name('category_index');
                    Route::post('/save', [CategoryController::class, 'store'])->name('category_store');
                    Route::post('/show/{category}', [CategoryController::class, 'show'])->name('category_show');
                    Route::post('/edit/{category}', [CategoryController::class, 'edit'])->name('category_edit');
                    Route::post('/delete/{category}', [CategoryController::class, 'destroy'])->name('category_destroy');
                });
                /*=====> Product Routes <=====*/
                Route::group(['prefix' => 'Product'], function () {
                    Route::get('/index', [ProductController::class, 'index'])->name('product_index');
                    Route::get('/create', [ProductController::class, 'create'])->name('product_create');
                    Route::post('/save', [ProductController::class, 'store'])->name('product_store');
                    Route::post('/update', [ProductController::class, 'update'])->name('product_update');
                    Route::get('/edit/{category}', [ProductController::class, 'edit'])->name('product_edit');
                    Route::post('/delete/{product}', [ProductController::class, 'destroy'])->name('product_destroy');
                });
                /*=====> Client Routes <=====*/
                Route::group(['prefix' => 'Client'], function () {
                    Route::get('/index', [ClientController::class, 'index'])->name('client_index');
                    Route::post('/create', [ClientController::class, 'store'])->name('client_create');
                    Route::get('/show/{client}', [ClientController::class, 'show'])->name('client_show');
                    Route::post('/update', [ClientController::class, 'update'])->name('client_update');
                    Route::post('/delete/{product}', [ClientController::class, 'destroy'])->name('client_destroy');
                    Route::get('/balance/{id}', [ClientController::class, 'print'])->name('client_balance');
                });
                /*=====> Sales Invoices Routes <=====*/
                Route::group(['prefix' => 'sales_invoice'], function () {
                    Route::get('/index', [SalesinvController::class, 'index'])->name('salesinvoice_index');
                    Route::get('/create', [SalesinvController::class, 'create'])->name('salesinvoice_create');
                    Route::post('/store', [SalesinvController::class, 'store'])->name('salesinvoice_store');
                    Route::get('/show/{sale}', [SalesinvController::class, 'show'])->name('salesinvoice_show');
                    Route::post('/delete/{sale}', [SalesinvController::class, 'destroy'])->name('salesinvoice_delete');
                    Route::get('/getproduct', [SalesinvController::class, 'getProduct'])->name('salesinvoice_getproduct');
                    Route::get('/getinvoicedata', [SalesinvController::class, 'getinvoicedata'])->name('salesinvoice_getinvoicedata');
                    Route::get('/deleteproduct', [SalesinvController::class, 'deleteproduct'])->name('salesinvoice_deleteproduct');
                    Route::get('/{id}', [SalesinvController::class, 'print'])->name('salesinvoice_print');
                });
                /*=====> Setting Routes <=====*/
                Route::group(['prefix' => 'settings'], function () {
                    Route::get('/settings', [SettingController::class, 'index'])->name('index');
                    Route::get('/add/{id}', [SettingController::class, 'edit'])->name('edit');
                    Route::post('/save', [SettingController::class, 'update'])->name('update');
                });
        });

        require __DIR__ . '/auth.php';
});
