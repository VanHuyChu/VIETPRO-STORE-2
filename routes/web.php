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
//backend
Route::get('login','backend\LoginController@GetLogin');

Route::group(['prefix' => 'admin', 'namespace' => 'backend'], function () {
    Route::get('','LoginController@GetIndex');
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@GetCategory');
        Route::get('edit','CategoryController@EditCategory');
    });
    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('','ProductController@ListProduct');
        Route::get('add','ProductController@AddProduct');
        Route::get('edit','ProductController@EditProduct');

        Route::get('detail-attr','ProductController@DetailAttr');
        Route::get('edit-attr','ProductController@EditAttr');

        Route::get('edit-value','ProductController@EditValue');

        Route::get('add-variant','ProductController@AddVariant');
        Route::get('edit-variant','ProductController@EditVariant');

    });
    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('','OrderController@ListOrder');
        Route::get('detail','OrderController@DetailOrder');
        Route::get('processed','OrderController@Processed');
    });
});