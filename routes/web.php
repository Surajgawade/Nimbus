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


Auth::routes(['register'=>false]);


Route::get('login/{provider}/', 'Auth\LoginController@redirect')->name('login.redirect');
Route::get('login/{provider}/callback/', 'Auth\LoginController@Callback')->name('login.callback');


Route::get('/','FrontendController@home')->name('home');
Route::get('/home', 'FrontendController@index');
Route::get('/aboutus', 'FrontendController@aboutUs')->name('aboutus');
Route::get('/downloads', 'FrontendController@downloads')->name('downloads');

Route::get('/ewaste', 'FrontendController@ewaste')->name('ewaste');
Route::get('/news', 'FrontendController@news')->name('news');
Route::get('/careers', 'FrontendController@careers')->name('careers');


Route::get('/client', 'FrontendController@client')->name('client');

Route::get('/principle', 'FrontendController@principle')->name('principle');
Route::get('/contact', 'FrontendController@contact')->name('contact');


Route::get('/products', 'FrontendController@products')->name('products');
Route::get('/product-details/{product_slug}', 'FrontendController@productdetails')->name('product-details');
Route::get('/product-category/{caregory_slug}/{aub_category_slug?}/{child_category_slug?}','FrontendController@ProductByCategory')->name('product-category');




// Backend section start

Route::group(['prefix'=>'/admin','middleware'=>['auth']],function(){
    Route::get('/','AdminController@index')->name('admin');

    Route::resource('/category','CategoryController');
    Route::GET('category-list-view', 'CategoryController@show');
    Route::post('create-category', 'CategoryController@store');
    Route::get('category/edit/{id}', 'CategoryController@edit');
    Route::post('edit-category', 'CategoryController@update');

    Route::resource('/sub-category','SubCategoryController');
    Route::GET('sub-category-list-view', 'SubCategoryController@show');
    Route::post('create-sub-category', 'SubCategoryController@store');
    Route::get('sub-category/edit/{id}', 'SubCategoryController@edit');
    Route::post('edit-sub-category', 'SubCategoryController@update');

    Route::resource('/child-category','ChildCategoryController');
    Route::GET('child-category-list-view', 'ChildCategoryController@show');
    Route::post('create-child-category', 'ChildCategoryController@store');
    Route::get('child-category/edit/{id}', 'ChildCategoryController@edit');
    Route::post('edit-child-category', 'ChildCategoryController@update');


    Route::resource('/product','ProductController');
    Route::GET('product-list-view', 'ProductController@show');
    Route::post('create-product', 'ProductController@store');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::post('edit-product', 'ProductController@update');
    Route::get('delete_gallery/{id}','ProductController@remove_uploaded_file_gallery')->name('delete_gallery');

    Route::post('/get_sub_category', action: 'FrontendController@getsubcategory')->name('get_sub_category');
    Route::post('/get_child_category', 'FrontendController@getchildcategory')->name('get_child_category');

    Route::post('/upload/post-image', 'ProductController@upload')->name('upload.post.image');

});


