<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::group(['prefix' => 'categories'], function() {
Route::get('/', 'AdminCategoryController@getAdminListCategory');
Route::get('add', 'AdminCategoryController@getAdminAddCategory');
Route::post('add', 'AdminCategoryController@postAdminAddCategory');
Route::get('edit/{id}', 'AdminCategoryController@getAdminEditCategory');
Route::post('edit/{id}', 'AdminCategoryController@postAdminEditCategory');
Route::get('delete/{id}', 'AdminCategoryController@getAdminDeleteCategory');
});
