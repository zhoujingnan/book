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


//前台
Route::get("/","Home\HomeIndexController@index");
Route::get("homeindex/ajaxPage","Home\HomeIndexController@ajaxPage");
Route::get("homeindex/about","Home\HomeIndexController@about");
Route::get("homeindex/article","Home\HomeIndexController@article");
Route::get("homeindex/moodList","Home\HomeIndexController@moodList");
Route::get("homeindex/comment","Home\HomeIndexController@comment");
Route::get("homeindex/addRead","Home\HomeIndexController@addRead");
Route::get("homeindex/collect","Home\HomeIndexController@collect");
Route::get("homeindex/readLog","Home\HomeIndexController@readLog");
//搜索分类图书
Route::get("homecate/index/{cate_id}","Home\HomeCateController@index");
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
Route::get("backbook/del","Back\BackBookController@del");
Route::get("backbook/add","Back\BackBookController@add");
Route::post("backbook/addDo","Back\BackBookController@addDo");
Route::get("backbook/up/{b_id}","Back\BackBookController@up");
Route::post("backbook/upDo","Back\BackBookController@upDo");
Route::get("backbook/uniqueTitle","Back\BackBookController@uniqueTitle");

//网站管理
Route::get("backnet/add","Back\BackNetController@add");
Route::get("backnet/index","Back\BackNetController@index");
Route::get("backnet/quit","Back\BackNetController@quit");
Route::get("backnet/update","Back\BackNetController@update");
Route::post("backnet/add_do","Back\BackNetController@add_do");
Route::post("backnet/up_do","Back\BackNetController@up_do");
Route::get("backnet/getimage/{img}","Back\BackNetController@getimage");

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
//充值日志
Route::any("backpay/index","Back\BackPayController@index");
Route::get("backborrow/ajaxPage","Back\BackBorrowController@ajaxPage");
Route::get("backborrow/ajaxPage","Back\BackBorrowController@ajaxPage");
Route::get("backborrow/ajaxPage","Back\BackBorrowController@ajaxPage");
//充值日志
Route::any("backpay/index","Back\BackPayController@index");
//消费日志
Route::any("backfree/index","Back\BackFreeController@index");


Route::get("backborrow/ajaxPage","Back\BackBorrowController@ajaxPage");
//损坏度
Route::get("backbad/index","Back\BackBadController@index");
Route::get("backbad/ajaxPage","Back\BackBadController@ajaxPage");
Route::get("backbad/check/{id}/{m_id}","Back\BackBadController@check");
Route::post("backbad/checkDo","Back\BackBadController@checkDo");
//活动管理
Route::get("backactivity/add","Back\BackActivityController@add");
Route::post("backactivity/add_do","Back\BackActivityController@add_do");
Route::get("backactivity/index","Back\BackActivityController@index");
Route::get("backactivity/del","Back\BackActivityController@del");


//管理员管理
Route::any("backuser/index","Back\BackUserController@index");
Route::any("backuser/add","Back\BackUserController@add");
Route::any("backuser/add_do","Back\BackUserController@add_do");
Route::get("backuser/only","Back\BackUserController@only");
Route::get("backuser/up_status","Back\BackUserController@up_status");
Route::get("backuser/up_pwd/{id}","Back\BackUserController@up_pwd");
Route::post("backuser/up_pwd_do","Back\BackUserController@up_pwd_do");
Route::get("backuser/u_role/{id}","Back\BackUserController@u_role");
Route::get("backuser/del","Back\BackUserController@del");
Route::post("backuser/u_role_do","Back\BackUserController@u_role_do");

//图片管理
Route::any("backimg/index","Back\BackImgController@index");
Route::any("backimg/add","Back\BackImgController@add");
Route::any("backimg/city","Back\BackImgController@city");
Route::any("backimg/add_do","Back\BackImgController@add_do");
Route::any("backimg/pagedata","Back\BackImgController@pagedata");
Route::get("backimg/del","Back\BackImgController@del");

//角色管理
Route::get("/backrole/index","Back\BackRoleController@index");
Route::get("/backrole/add","Back\BackRoleController@add");
Route::post("/backrole/add_do","Back\BackRoleController@add_do");
Route::get("/backrole/uniqueTitle","Back\BackRoleController@uniqueTitle");
Route::get("/backrole/addpower/{role_id}","Back\BackRoleController@addpower");
Route::post("/backrole/powerAddDo","Back\BackRoleController@powerAddDo");

//权限管理
Route::get("/backpower/index","Back\BackPowerController@index");
Route::get("/backpower/del/{p_id}","Back\BackPowerController@del");
Route::get("/backpower/pidel","Back\BackPowerController@pidel");
Route::get("/backpower/uniqueTitle","Back\BackPowerController@uniqueTitle");
Route::get("/backpower/add","Back\BackPowerController@add");
Route::post("/backpower/addDo","Back\BackPowerController@addDo");
Route::post("/backpower/upDo","Back\BackPowerController@upDo");
Route::get("/backpower/up/{p_id}","Back\BackPowerController@up");
Route::get("/backrole/del","Back\BackRoleController@del");
