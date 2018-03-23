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


Route::group([],function (){

    Route::get('/',['uses'=>'PageController@index','as'=>'page']);
    Route::get('/page/{category}',['uses'=>'PageController@category','as'=>'category']);
    Route::get('/page/{category}/{id}',['uses'=>'PageController@news','as'=>'news']);


});

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function () {

    Route::get('/',['uses'=>'Auth\AuthController@show','as'=>'panel']);

    Route::group(['prefix'=>'category'],function (){
       // Route::match(['get','post'],'/',['uses'=>'Auth\AuthController@category','as'=>'admin_category']);
        Route::match(['get','post','delete'],'/{id?}',['uses'=>'Auth\AuthController@category','as'=>'admin_category']);
    });

    Route::get('/news',['uses'=>'Auth\AuthController@news','as'=>'admin_news']);
    Route::get('/blurds',['uses'=>'Auth\AuthController@blurds','as'=>'admin_blurds']);

});

Route::get('/home', 'HomeController@index')->name('home');