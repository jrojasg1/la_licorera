<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');

    Route::get('/admin/order', 'App\Http\Controllers\Admin\AdminOrderController@index')->name('admin.order.index');

    Route::get('/admin/recipes', 'App\Http\Controllers\Admin\AdminRecipeController@index')->name('admin.recipe.index');
    Route::get('/admin/recipes/create', 'App\Http\Controllers\Admin\AdminRecipeController@create')->name('admin.recipe.create');
    Route::post('/admin/recipes/save', 'App\Http\Controllers\Admin\AdminRecipeController@save')->name('admin.recipe.save');
});

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete', 'App\Http\Controllers\CartController@removeAll')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::get('/motos', 'App\Http\Controllers\MotoController@index')->name('moto.index');

Route::middleware('auth')->group(function () {
    Route::post('/cart/voucher', 'App\Http\Controllers\CartController@purchaseVoucher')->name('cart.purchaseVoucher');
});

Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');
Route::get('/cart/pdf', 'App\Http\Controllers\CartController@purchaseVoucher')->name('cart.pdf');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
