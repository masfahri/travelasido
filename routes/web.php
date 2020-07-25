<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { return view('front.layouts.app');});
Route::name('products.')->group(function () {
    Route::get('/products', 'ProductsController@index')->name('index');
});

Route::name('api.')->group(function () {
    Route::name('products.')->group(function () {
        Route::get('/api/products/index', 'api\front\ProductsController@index')->name('index');
        Route::post('/api/products/store', 'api\front\ProductsController@store')->name('store');
    });
});

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
    Route::name('admin.')->group(function () {
        Route::get('/admin/dashboard', 'admin\DashboardController@index')->name('dashboard');
    
        Route::name('categories.')->group(function () {
            Route::get('/admin/master/categories', 'admin\CategoryController@index')->name('index');
            Route::get('/admin/master/categories/create', 'admin\CategoryController@create')->name('create');
            Route::get('/admin/master/categories/edit/{id}', 'admin\CategoryController@edit')->name('edit');
            Route::get('/admin/master/categories/destroy/{id}', 'admin\CategoryController@destroy')->name('destroy');
    
            Route::post('/admin/master/categories/store', 'admin\CategoryController@store')->name('store');
            Route::post('/admin/master/categories/update/{id}', 'admin\CategoryController@update')->name('update');
        });
        
        Route::name('products.')->group(function () {
            Route::get('/admin/master/products', 'admin\ProductController@index')->name('index');
            Route::get('/admin/master/products/create', 'admin\ProductController@create')->name('create');
            Route::get('/admin/master/products/edit/{id}', 'admin\ProductController@edit')->name('edit');
            Route::get('/admin/master/products/destroy/{id}', 'admin\ProductController@destroy')->name('destroy');
    
            Route::post('/admin/master/products/store', 'admin\ProductController@store')->name('store');
            Route::post('/admin/master/products/update/{id}', 'admin\ProductController@update')->name('update');
        });

        Route::name('customers.')->group(function () {
            Route::get('/admin/customer/index', 'admin\CustomerController@index')->name('index');
            Route::get('/admin/customer/create', 'admin\CustomerController@create')->name('create');
            Route::get('/admin/customer/edit/{id}', 'admin\CustomerController@edit')->name('edit');
            
            Route::post('/admin/customer/update/{id}', 'admin\CustomerController@update')->name('update');
            Route::post('/admin/customer/store', 'admin\CustomerController@store')->name('store');
            Route::post('/admin/customer/destroy/{id}', 'admin\CustomerController@destroy')->name('destroy');
            
            Route::name('khusus.')->group(function () {
                Route::get('/admin/customer/khusus/index', 'admin\CustomerKhususController@index')->name('index');
                Route::get('/admin/customer/khusus/create', 'admin\CustomerKhususController@create')->name('create');
                Route::get('/admin/customer/khusus/edit/{id}', 'admin\CustomerKhususController@edit')->name('edit');
                
                Route::post('/admin/customer/khusus/update/{id}', 'admin\CustomerKhususController@update')->name('update');
                Route::post('/admin/customer/khusus/store', 'admin\CustomerKhususController@store')->name('store');
                Route::post('/admin/customer/khusus/destroy/{id}', 'admin\CustomerKhususController@destroy')->name('destroy');
            });
        });

        Route::get('/admin/role/index', 'admin\RoleController@index')->name('admin.role');
    
    });
});

Route::get('/home', 'HomeController@index')->name('home');
