<?php

use App\Http\Controllers\CategoryController;
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
                Route::controller(CategoryController::class)->group(function () {
                    Route::group(['prefix' => 'Category'], function () {
                        Route::get('/index', 'index')->name('category_index');
                        Route::post('/save', 'store')->name('category_store');
                        Route::post('/show/{category}', 'show')->name('category_show');
                        Route::post('/edit/{category}', 'edit')->name('category_edit');
                        Route::post('/delete/{category}', 'destroy')->name('category_destroy');
                    });
                });
                /*=====> Product Routes <=====*/
                Route::controller(ProductController::class)->group(function () {
                    Route::group(['prefix' => 'Product'], function () {
                        Route::get('/index', 'index')->name('product_index');
                        Route::get('/create', 'create')->name('product_create');
                        Route::post('/save', 'store')->name('product_store');
                        Route::post('/update', 'update')->name('product_update');
                        Route::get('/edit/{category}', 'edit')->name('product_edit');
                        Route::post('/delete/{product}', 'destroy')->name('product_destroy');
                    });
                });
                /*=====> Client Routes <=====*/
                Route::controller(ClientController::class)->group(function () {
                    Route::group(['prefix' => 'Client'], function () {
                        Route::get('/index', 'index')->name('client_index');
                        Route::post('/create', 'store')->name('client_create');
                        Route::get('/show/{client}', 'show')->name('client_show');
                        Route::post('/update', 'update')->name('client_update');
                        Route::post('/delete/{product}', 'destroy')->name('client_destroy');
                        Route::get('/balance/{id}', 'print')->name('client_balance');
                    });
                });
                /*=====> Sales Invoices Routes <=====*/
                Route::controller(SalesinvController::class)->group(function () {
                    Route::group(['prefix' => 'sales_invoice'], function () {
                        Route::get('/index', 'index')->name('salesinvoice_index');
                        Route::get('/create', 'create')->name('salesinvoice_create');
                        Route::post('/store', 'store')->name('salesinvoice_store');
                        Route::get('/show/{id}', 'show')->name('salesinvoice_show');
                        Route::post('/delete/{sale}', 'destroy')->name('salesinvoice_delete');
                        Route::get('/getproduct', 'getProduct')->name('salesinvoice_getproduct');
                        Route::get('/getinvoicedata', 'getinvoicedata')->name('salesinvoice_getinvoicedata');
                        Route::get('/deleteproduct', 'deleteproduct')->name('salesinvoice_deleteproduct');
                        Route::get('/{id}', 'print')->name('salesinvoice_print');
                    });
                });

                /*=====> Setting Routes <=====*/
                Route::controller(SettingController::class)->group(function () {
                    Route::group(['prefix' => 'settings'], function () {
                        Route::get('/settings', 'index')->name('index');
                        Route::get('/add/{id}', 'edit')->name('edit');
                        Route::post('/save', 'update')->name('update');
                    });
                });
        });

        require __DIR__ . '/auth.php';
});
