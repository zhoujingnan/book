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
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
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
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：管理员管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
    <tr>
        <td width="90%" align="left" valign="middle">
        
        </td>
         <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="{{url('backuser/add')}}" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
       </td>
      
    </tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
	<thead>
      <tr>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">管理员名称</th>
        <th align="center" valign="middle" class="borderright">注册时间</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle" class="borderright">最后登陆时间</th>
        <th align="center" valign="middle" class="borderright">最后登录ip</th>
        <th align="center" valign="middle" class="borderright">登录次数</th>
        <th align="center" valign="middle">操作</th>
      </tr>
	 </thead>
	 <tbody id="to">
    @foreach($arr as $k => $v)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">
    			{{$v['u_id']}}
    		</td>
            <td align="center" valign="middle" class="borderright borderbottom">
    			{{$v['u_name']}}
    		</td>
    		<td align="center" valign="middle" class="borderright borderbottom">
          @if($v['addtime']=="")
          @else
    			{{date("Y-m-d H:i:s",$v['addtime'])}}
          @endif
    		</td>
    		<td align="center" valign="middle" class="borderright borderbottom" id="{{$v['u_id']}}">
    			@if($v['status']==1)
            <a href="javascript::void(0)" class="up_status">启用</a>
          @else
          <a href="javascript::void(0)" class="up_status">未启用</a>
          @endif
    		</td>
    		<td align="center" valign="middle" class="borderright borderbottom">
          @if($v['last_login_time']=="")
          @else
    			{{date("Y-m-d H:i:s",$v['last_login_time'])}}
          @endif
    		</td>
    		<td align="center" valign="middle" class="borderright borderbottom">
    			{{$v['last_login_ip']}}
    		</td>
        <td align="center" valign="middle" class="borderright borderbottom">
          {{$v['num']}}
        </td>
        <td align="center" valign="middle" class="borderbottom">
    			<a href="" target="mainFrame" onFocus="this.blur()" class="add">编辑</a>
    		</td>
      </tr>
      @endforeach

	 </tbody>
    </table></td>
    </tr>
  <tr>
    
  </tr>
</table>
</body>
<script>
$(function(){
  $(document).on("click",".up_status",function(){
    var status = "";
    var obj = $(this);
    var id = obj.parent().attr("id");
    if($(this).html()=="启用"){
      status = 0;
    }else{
      status = 1;
    }
    $.ajax({
      type:'get',
      url:"<?php echo url('backuser/up_status');?>",
      data:{status:status,id:id},
      success:function(msg){
        if(msg==0){
          if(status==0){
            obj.html("未启用");
          }else{
            obj.html("启用");
          }
        }
      }
    })
  })
})
</script>
</html>