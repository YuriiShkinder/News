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



    Route::get('/',['uses'=>'PageController@index','as'=>'page']);
    Route::get('/page/{category}',['uses'=>'PageController@category','as'=>'category']);
    Route::get('/page/{category}/{id}',['uses'=>'PageController@news','as'=>'news']);
    Route::post('/page/add/coment',['uses'=>'PageController@coment','as'=>'coment']);

    Route::get('/tag/search/{tag}',['uses'=>'PageController@tags','as'=>'tags']);
Route::get('/user/top/{user}',['uses'=>'PageController@user','as'=>'user']);

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {

    Route::get('/',['uses'=>'Auth\AuthController@show','as'=>'panel']);


    Route::match(['get','post','delete'],'category/{id?}',['uses'=>'Auth\AuthController@category','as'=>'admin_category']);

    Route::group(['prefix'=>'news'],function (){
        Route::get('/',['uses'=>'Auth\AuthController@news','as'=>'admin_news']);
        Route::match(['get','post','delete'],'/{news}',['uses'=>'Auth\AuthController@newsEdit','as'=>'admin_news_edit']);
        Route::match(['get','post'],'/add/new',['uses'=>'Auth\AuthController@newsAdd','as'=>'admin_news_add']);

    });
    Route::group(['prefix'=>'blurds'],function (){
        Route::get('/',['uses'=>'Auth\AuthController@blurds','as'=>'admin_blurds']);
        Route::match(['get','post','delete'],'/{blurd}',['uses'=>'Auth\AuthController@blurdsEdit','as'=>'admin_blurds_edit']);
        Route::match(['get','post'],'/add/blurd',['uses'=>'Auth\AuthController@blurdsAdd','as'=>'admin_blurds_add']);
    });

    Route::match(['get','post'],'/styles',['uses'=>'Auth\AuthController@styles','as'=>'admin_styles']);

});

Route::group(['prefix'=>'ajax'],function (){

    Route::post('/like',['uses'=>'AjaxController@like']);
    Route::post('/reads',['uses'=>'AjaxController@reads']);

});

Route::get('/home', 'HomeController@index')->name('home');