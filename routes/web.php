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
    return view('homepage');
});

Auth::routes();

Route::get('/homepage', 'HomeController@index');

Route::prefix('admin')->group(function() {
    Route::prefix('users')->group(function() {
        Route::get('/', 'AdminUserController@index')->name('users.index');
        Route::get('delete/{id}', 'AdminUserController@delete')->name('users.delete');
    });
});


Route::group(['prefix' => 'categories'], function() {
Route::get('/', 'AdminCategoriesController@getAdminListCategory');
Route::get('add', 'AdminCategoriesController@getAdminAddCategory');
Route::post('add', 'AdminCategoriesController@postAdminAddCategory');
Route::get('edit/{id}', 'AdminCategoriesController@getAdminEditCategory');
Route::post('edit/{id}', 'AdminCategoriesController@postAdminEditCategory');
Route::get('delete/{id}', 'AdminCategoriesController@getAdminDeleteCategory');
});
