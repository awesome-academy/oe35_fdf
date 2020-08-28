<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Route::resource('categories', 'AdminCategoriesController');
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'admin'], function() {
    Route::resource('product', 'AdminProductController');
    Route::resource('categories', 'AdminCategoriesController');
    Route::resource('suggest', 'AdminSuggestController')->only([
    'index', 'update', 'destroy'
    ]);
});

Route::group(['prefix' => 'categories'], function() {
Route::get('/', 'AdminCategoriesController@getAdminListCategory');
Route::get('add', 'AdminCategoriesController@getAdminAddCategory');
Route::post('add', 'AdminCategoriesController@postAdminAddCategory');
Route::get('edit/{id}', 'AdminCategoriesController@getAdminEditCategory');
Route::post('edit/{id}', 'AdminCategoriesController@postAdminEditCategory');
Route::get('delete/{id}', 'AdminCategoriesController@getAdminDeleteCategory');
});
Auth::routes();

Route::prefix('admin')->group(function() {
    Route::prefix('users')->group(function() {
        Route::get('/', 'AdminUserController@index')->name('users.index');
        Route::get('delete/{id}', 'AdminUserController@delete')->name('users.delete');
    });
});

Route::prefix('/homepage')->group(function() {
    Route::get('/', 'HomeController@index');
    Route::get('productdetail/{id}', 'HomeController@get_product_detail')->name('get_product_detail');
});

Route::prefix('cart')->group(function() {
    Route::post('/', 'CartController@save_cart')->name('cart');
    Route::get('/', 'CartController@index')->name('showcart');
    Route::get('delete/{id}', 'CartController@delete_cart')->name('card.delete');
    Route::post('update_quantity', 'CartController@update_cart');
});

Route::resource('suggest', 'SuggestController')->only([
    'index', 'store'
]);
