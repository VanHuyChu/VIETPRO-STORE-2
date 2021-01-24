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
Route::get('login','backend\LoginController@GetLogin')->name('login.get')->middleware('CheckLogout');
Route::post('login','backend\LoginController@PostLogin');

Route::group(['prefix' => 'admin', 'namespace' => 'backend','middleware'=>'CheckLogin'], function () {
    Route::get('','LoginController@GetIndex')->name('admin.index');
    Route::get('logout','LoginController@Logout')->name('logout');
    //category
    Route::group(['prefix' => 'category'], function () {
        Route::get('','CategoryController@GetCategory')->name('category.index');
        Route::post('','CategoryController@PostCategory');
        Route::get('edit/{id}','CategoryController@EditCategory')->name('category.edit');
        Route::post('edit/{id}','CategoryController@PostEditCategory');
        Route::get('del/{id}','CategoryController@DelCategory')->name('category.del');
    });
    //product
    Route::group(['prefix' => 'product'], function () {
        // product table
        Route::get('','ProductController@ListProduct')->name('product.index');
        Route::get('add','ProductController@AddProduct')->name('product.add');
        Route::post('add','ProductController@PostProduct');
        Route::get('edit','ProductController@EditProduct')->name('product.edit');
        Route::post('edit','ProductController@PostEditProduct');
        // attribute table
        Route::post('add-attr','ProductController@AddAttr')->name('add-attr');
        Route::get('detail-attr','ProductController@DetailAttr')->name('detail-attr');
        Route::get('edit-attr/{id}','ProductController@EditAttr')->name('edit-attr');
        Route::post('edit-attr/{id}','ProductController@EditAttrPost')->name('edit-attr-post');
        Route::get('del-attr/{id}','ProductController@DelAttr')->name('del-attr');
        // value table
        Route::post('add-value','ProductController@AddValue')->name('add-value');
        Route::get('edit-value/','ProductController@EditValue')->name('edit-value');
        Route::post('edit-value/{id}','ProductController@EditValuePost')->name('edit-value-post');
        Route::get('del-value','ProductController@DelValue')->name('del-value');

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