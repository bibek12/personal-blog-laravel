<?php

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


Route::get('/','PublicController@index')->name('index');
Route::get('/about','PublicController@about')->name('about');
Route::get('/post/{post}','PublicController@singlePost')->name('singlePost');
Route::get('/contact','PublicController@contact')->name('contact');
Route::post('/contact','PublicController@contactPost')->name('contactPost');



Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::prefix('/user')->group(function(){
    Route::post('new-comment','UserController@newComment')->name('newComment');
    Route::get('/dashboard','UserController@dashboard')->name('userDashboard');
    Route::get('/comment','UserController@comment')->name('userComment');
    Route::get('/profile','UserController@profile')->name('userProfile');
    Route::post('/profile','UserController@profilePost')->name('userProfilePost');
    Route::post('comment/{id}/delete','UserController@deleteComment')->name('deleteComment');
});

Route::prefix('/author')->group(function(){
    Route::get('/dashboard','AuthorController@dashboard')->name('authorDashboard');
    Route::get('/post','AuthorController@post')->name('authorPost');
    Route::get('/comment','AuthorController@comment')->name('authorComment');
    Route::get('/user','AuthorController@user')->name('authorUser');
    Route::get('/posts/new','AuthorController@newPost')->name('authorNewPost');
    Route::post('/posts/new','AuthorController@createPost')->name('createPost');
    Route::get('/post/{id}/edit','AuthorController@postEdit')->name('postEdit');
    Route::post('/post/{id}/edit','AuthorController@postEditPost')->name('postEditPost');
    Route::post('/post/{id}/delete','AuthorController@postDelete')->name('postDelete');
});

Route::prefix('/admin')->group(function(){
    Route::get('/dashboard','AdminController@dashboard')->name('adminDashboard');
    Route::get('/post','AdminController@post')->name('adminPost');
    Route::get('/comment','AdminController@comment')->name('adminComment');
    Route::get('/user','AdminController@user')->name('adminUser');
    Route::get('/post/{id}/edit','AdminController@postEdit')->name('adminPostEdit');
    Route::post('/post/{id}/edit','AdminController@postEditPost')->name('adminPostEditPost');
    Route::post('/post/{id}/delete','AdminController@postDelete')->name('adminPostDelete');
    Route::post('/comment/{id}/delete','AdminController@commentPostDelete')->name('adminCommentPostDelete');
    Route::get('/user/{id}/edit','AdminController@userEdit')->name('adminUserEdit');
    Route::post('/user/{id}/edit','AdminController@userEditPost')->name('adminUserEditPost');
    Route::post('/user/{id}/delete','AdminController@userDelete')->name('adminUserDelete');


    Route::get('products','AdminController@products')->name('adminProducts');
    Route::get('products/new','AdminController@newProduct')->name('adminNewProducts');
    Route::post('products/new','AdminController@newProductPost')->name('adminNewProducts');
    Route::get('products/{id}','AdminController@editProduct')->name('adminEditProducts');
    Route::post('products/{id}','AdminController@editProductPost')->name('adminEditProducts');

     Route::post('products/{id}/delete','AdminController@deleteProduct')->name('adminDeleteProduct');

});

Route::prefix('shop')->group(function(){
    Route::get('/','ShopController@index')->name('shop.index');
    Route::get('/product/{id}','ShopController@singleProduct')->name('shop.singleProduct');
    Route::get('product/{id}/order','ShopControler@orderProduct')->name('shop.orderProduct');

});
