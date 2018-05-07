<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="{{asset('css/css.css')}}" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="{{asset('js/sdmenu.js')}}"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url({{asset('images/main/leftbg.jpg')}}) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="{{asset('images/main/member.gif')}}" width="44" height="44" /></div>
    <span>用户：admin<br>角色：超级管理员</span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <!-- <div class="collapsed">
        <span>网站管理</span>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">网站设置</a>
      </div> -->
      <div>
        <span>管理员管理</span>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">管理员列表</a>
        <a href="main_list.html" target="mainFrame" onFocus="this.blur()">角色列表</a>
        <a href="main_info.html" target="mainFrame" onFocus="this.blur()">权限列表</a>
      </div>
      <div>
        <span>栏目管理</span>  
        @foreach($arr as $key => $val)
        <a href="/month13/book/public/{{$val['url']}}" target="mainFrame" onFocus="this.blur()">{{$val['column_name']}}</a>
        @endforeach
      </div>
      <div>
        <span>活动管理</span>
        <a href="main_list.html" target="mainFrame" onFocus="this.blur()">添加活动</a>
        <a href="main_info.html" target="mainFrame" onFocus="this.blur()">活动列表</a>
      </div>
      <div>
        <span>日志管理</span>
        <a href="{{url('backpay/index')}}" target="mainFrame" onFocus="this.blur()">充值日志</a>
      </div>      
    </div>
</body>
</html>