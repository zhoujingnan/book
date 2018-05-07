<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="{{asset('css/css.css')}}" type="text/css" rel="stylesheet" />
<link href="{{asset('css/main.css')}}" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="{{asset('images/main/favicon.ico')}}" />
<script src="{{asset('jquery-1.8.3.js')}}"></script>
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
.main-for{ padding:10px;}
.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
#addinfo a{ font-size:14px; font-weight:bold; background:url(images/main/addinfoblack.jpg) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
#addinfo a:hover{ background:url(images/main/addinfoblue.jpg) no-repeat 0 1px;}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：网站管理&nbsp;&nbsp;>&nbsp;&nbsp;添加网站</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" id="sub" action="{{url('backnet/up_do')}}" enctype="multipart/form-data">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
	
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">网站标题：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="net_title" id="net_title" value="{{$arr['net_title']}}" class="text-word">
			<span id="bc"></span>
			</td>
    </tr>
    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">网站关键字：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="net_key" id="net_key" value="{{$arr['net_key']}}" class="text-word">
        </td>
    </tr>
	<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">网站URL：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="net_url" id="net_url" value="{{$arr['net_url']}}" class="text-word">
        </td>
    </tr>
	<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">网站描述：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="net_desc" id="net_desc" value="{{$arr['net_desc']}}" class="text-word">
        </td>
    </tr>
	<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">网站logo：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="file" name="net_logo" id="net_logo" value="" class="text-word">
			<img src="{{asset($arr['net_logo'])}}" width="100">
        </td>
    </tr>
	<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">网站备案号：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="net_bei" id="net_bei" value="{{$arr['net_bei']}}" class="text-word">
        </td>
    </tr>
	<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">联系人qq：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="text" name="net_qq" id="net_qq" value="{{$arr['net_qq']}}" class="text-word">
        </td>
    </tr>
	<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">小程序二维码：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
			<input type="file" name="net_er" id="net_er" value="" class="text-word">
			<img src="{{asset($arr['net_er'])}}" width="100">
        </td>
    </tr>
    <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="hidden" name="logo" value="{{$arr['net_logo']}}">
        <input type="hidden" name="er" value="{{$arr['net_er']}}">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
    </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
<script>
	$(function(){
		var title = 0;
		$(document).on('blur','#net_title',function(){
			var net_title = $(this).val();
			if(net_title==""){
				title = 0;
			}else{
				title = 1;
			}
		})
		
		$(document).on('submit','#sub',function(){
			if(title == 1){
				return true;
			}else{
				return false;
			}
		})
	})
</script>
</body>
</html>