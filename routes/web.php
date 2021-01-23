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
    Route::get('','LoginController@GetIndex')->name('admin.index');
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@GetCategory')->name('category.index');
        Route::get('edit','CategoryController@EditCategory')->name('category.edit');
    });
    //product
    Route::group(['prefix' => 'product'], function () {
        Route::get('','ProductController@ListProduct')->name('product.index');
        Route::get('add','ProductController@AddProduct')->name('product.add');
        Route::get('edit','ProductController@EditProduct')->name('product.edit');

        Route::get('detail-attr','ProductController@DetailAttr')->name('detail-attr');
        Route::get('edit-attr','ProductController@EditAttr')->name('edit-attr');

        Route::get('edit-value','ProductController@EditValue')->name('edit-value');

        Route::get('add-variant','ProductController@AddVariant')->name('add-variant');
        Route::get('edit-variant','ProductController@EditVariant')->name('edit-variant');

    });
    //order
    Route::group(['prefix' => 'order'], function () {
        Route::get('','OrderController@ListOrder')->name('order.index');
        Route::get('detail','OrderController@DetailOrder')->name('order.detail');
        Route::get('processed','OrderController@Processed')->name('order.processed');
    });
});