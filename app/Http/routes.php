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
Route::get("backbook/piDel","Back\BackBookController@piDel");


//网站管理
Route::get("backnet/add","Back\BackNetController@add");
Route::get("backnet/index","Back\BackNetController@index");
Route::get("backnet/quit","Back\BackNetController@quit");
Route::post("backnet/add_do","Back\BackNetController@add_do");
Route::get("backnet/getimage/{img}","Back\BackNetController@getimage");
Route::get("backbook/del","Back\BackBookController@del");
Route::get("backbook/add","Back\BackBookController@add");
Route::post("backbook/addDo","Back\BackBookController@addDo");
Route::get("backbook/up/{b_id}","Back\BackBookController@up");
Route::post("backbook/upDo","Back\BackBookController@upDo");
Route::get("backbook/uniqueTitle","Back\BackBookController@uniqueTitle");
//会员管理
Route::any("backmember/index","Back\BackMemberController@index");
Route::get("backmember/ajaxPage","Back\BackMemberController@ajaxPage");
Route::get("backmember/ajaxUp","Back\BackMemberController@ajaxUp");
//积分管理
Route::any("backsocre/index","Back\BackSocreController@index");
Route::get("backsocre/ajaxPage","Back\BackSocreController@ajaxPage");
Route::get("backsocre/piDel","Back\BackSocreController@piDel");
Route::get("backsocre/del","Back\BackSocreController@del");
Route::get("backsocre/add","Back\BackSocreController@add");
Route::post("backsocre/addDo","Back\BackSocreController@addDo");
Route::get("backsocre/up/{s_id}","Back\BackSocreController@up");
Route::post("backsocre/upDo","Back\BackSocreController@upDo");
Route::get("backsocre/uniqueTitle","Back\BackSocreController@uniqueTitle");
//分类管理
Route::any("backcate/index","Back\BackCateController@index");
Route::get("backcate/ajaxPage","Back\BackCateController@ajaxPage");
Route::get("backcate/piDel","Back\BackCateController@piDel");
Route::get("backcate/del","Back\BackCateController@del");
Route::get("backcate/add","Back\BackCateController@add");
Route::post("backcate/addDo","Back\BackCateController@addDo");
Route::get("backcate/up/{cate_id}","Back\BackCateController@up");
Route::post("backcate/upDo","Back\BackCateController@upDo");
Route::get("backcate/uniqueTitle","Back\BackCateController@uniqueTitle");
//借阅管理
Route::get("backborrow/index","Back\BackBorrowController@index");
Route::get("backborrow/ajaxPage","Back\BackBorrowController@ajaxPage");
