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

Route::get('/','App\Http\Controllers\HomeController@index')->name("home.index");




Route::get('/admin','App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
Route::get('/admin/recipes', 'App\Http\Controllers\Admin\RecipeController@index')->name("admin.recipe.index");
Route::get('/admin/recipes/create', 'App\Http\Controllers\Admin\AdminRecipeController@create')->name("admin.recipe.create");
Route::get('/admin/recipes/save', 'App\Http\Controllers\RecipeController@save')->name("admin.recipe.save");
Auth::routes();


