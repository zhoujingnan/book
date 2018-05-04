<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//后台首页
Route::get('/back/index','Back\BackIndexController@index');
Route::get('back/top',"Back\BackIndexController@top");
Route::get('back/swich',"Back\BackIndexController@swich");
Route::get('back/bottom',"Back\BackIndexController@bottom");
Route::get('back/main',"Back\BackIndexController@main");
Route::get('back/left',"Back\BackIndexController@left");
//登录
Route::any('back/login','Back\BackLoginController@index');
Route::any('back/logindo','Back\BackLoginController@logindo');
Route::any('back/getCaptcha','Back\BackLoginController@getCaptcha');
//图书管理
Route::any("backbook/index","Back\BackBookController@index");
Route::get("backbook/ajaxPage","Back\BackBookController@ajaxPage");