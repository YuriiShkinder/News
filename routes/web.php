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
Route::get('/{category}',['uses'=>'PageController@category','as'=>'category']);
Route::get('/{category}/{id}',['uses'=>'PageController@news','as'=>'news']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
