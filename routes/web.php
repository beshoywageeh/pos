<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MoenyTreasaryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesinvController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\pdfController;
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::group(['middleware' => ['auth']],
            function () {
                Route::get('/', [HomeController::class, 'index'])->name('dashboard');
                /*=====> Category Routes <=====*/
                Route::group(['prefix' => 'Category', 'controller' => CategoryController::class], function () {
                    Route::get('/index', 'index')->name('category_index');
                    Route::post('/save', 'store')->name('category_store');
                    Route::post('/show/{category}', 'show')->name('category_show');
                    Route::post('/edit/{category}', 'edit')->name('category_edit');
                    Route::post('/delete/{category}', 'destroy')->name('category_destroy');
                });
                /*=====> Product Routes <=====*/
                Route::group(['prefix' => 'Product', 'controller' => ProductController::class], function () {
                    Route::get('/index', 'index')->name('product_index');
                    Route::get('/create', 'create')->name('product_create');
                    Route::post('/save', 'store')->name('product_store');
                    Route::post('/update', 'update')->name('product_update');
                    Route::get('/edit/{category}', 'edit')->name('product_edit');
                    Route::post('/delete/{product}', 'destroy')->name('product_destroy');
                });
                /*=====> Client Routes <=====*/
                Route::group(['prefix' => 'Client', 'controller' => ClientController::class], function () {
                    Route::get('/index', 'index')->name('client_index');
                    Route::post('/create', 'store')->name('client_create');
                    Route::get('/show/{client}', 'show')->name('client_show');
                    Route::post('/update', 'update')->name('client_update');
                    Route::post('/delete/{product}', 'destroy')->name('client_destroy');
                    Route::get('/balance/{id}', 'print')->name('client_balance');
                    Route::get('/balance_invoice/{id?}', 'client_balance_invoice')->name('client_balance_invoice');
                });
                /*=====> Sales Invoices Routes <=====*/
                Route::group(['prefix' => 'sales_invoice', 'controller' => SalesinvController::class], function () {
                    Route::get('/index', 'index')->name('salesinvoice_index');
                    Route::post('/create', 'create')->name('salesinvoice_create');
                    Route::post('/store', 'store')->name('salesinvoice_store');
                    Route::get('/show/{id}', 'show')->name('salesinvoice_show');
                    Route::post('/delete/{sale}', 'destroy')->name('salesinvoice_delete');
                    Route::post('/addproduct', 'addProduct')->name('salesinvoice_getproduct');
                    Route::post('/getinvoicedata', 'getinvoicedata')->name('salesinvoice_getinvoicedata');
                    Route::get('/deleteproduct', 'deleteproduct')->name('salesinvoice_deleteproduct');
                    //  Route::get('/{id}', 'print')->name('salesinvoice_print');
                    Route::get('/intial_sales', 'intial_sales')->name('intial_sales');


                });
                /*=====> Money Treasary Routes <=====*/
                Route::group(['prefix' => 'money_treasary', 'controller' => MoenyTreasaryController::class], function () {
                    Route::get('/index', 'index')->name('money_treasary_index');
                    Route::post('/store', 'store')->name('money_treasary_store');
                    Route::get('/show/{id}', 'show')->name('money_treasary_show');
                    Route::post('/delete/{sale}', 'destroy')->name('money_treasary_delete');
                    Route::get('/getproduct', 'getProduct')->name('money_treasary_getproduct');
                    Route::get('/getinvoicedata', 'getinvoicedata')->name('money_treasary_getinvoicedata');
                    Route::get('/deleteproduct', 'deleteproduct')->name('money_treasary_deleteproduct');
                    Route::get('/{id}', 'print')->name('money_treasary_print');
                });
                /*=====> Setting Routes <=====*/
                Route::group(['prefix' => 'settings', 'controller' => SettingController::class], function () {
                    Route::get('/settings', 'index')->name('index');
                    Route::get('/add/{id}', 'edit')->name('edit');
                    Route::post('/save', 'update')->name('update');
                });
                /*=====> pdf Routes <=====*/
                Route::name('pdf.')->prefix('pdf')->controller(pdfController::class)->group(function () {
                    Route::get('salesinvoice/{id}', 'sales_Invoice')->name('salesinv');
                });
            });

        require __DIR__.'/auth.php';
    });

Route::get('/migration', function () {
    Artisan::call('migrate:fresh --seed');
    return 'done';
});
