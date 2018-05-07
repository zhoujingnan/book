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
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url({{asset('images/main/list_input.jpg')}}) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url({{asset('images/main/add.jpg')}}) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url({{asset('images/main/list_bg.jpg')}}) repeat-x; height:32px; line-height:32px;}
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
.s{
	    margin-top: 8px;
    height: 25px;
    margin-right: 10px;
}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <thead>
  <tr>
    <td width="99%" align="left" valign="top">您的位置：借阅管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="post" action="">
	         <span>
		         <select name="key" class="s">
		         	<option value="1">会员名</option>
		         	<option value="2">图书名</option>
		         	<option value="3">最近一周</option>
		         	<option value="4">最近一月</option>
		         </select>
	     	 </span>
	         <input type="text" name="msg" value="" class="text-word">
	         <input name="" type="button" value="查询" class="text-but">
	         </form>
         </td>
  		  
  		</tr>
	</table>
    </td>
  </tr>
  </thead>
  <tbody class="tt">
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">会员名</th>
        <th align="center" valign="middle" class="borderright">图书名</th>
        <th align="center" valign="middle" class="borderright">类型</th>
        <th align="center" valign="middle" class="borderright">借阅/购买时间</th>
        <th align="center" valign="middle" class="borderright">借阅归还时间</th>
      </tr>
      @foreach($arr as $key =>$val)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['m_name']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['b_title']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">
        	@if($val['type']==1) 借书
			@else 买书
			@endif
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{date("Y-m-d H:i:s",$val['addtime'])}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{date("Y-m-d H:i:s",$val['endtime'])}}</td>
      </tr>
      @endforeach
    </table></td>
    </tr>
  <tr>
      <td align="left" valign="top" class="fenye">{{$count}}条数据 
      	<input type="text" name="page" value="{{$page}}" disabled style="width: 19px">/
      	<input type="text" name="totalpage" value="{{$totalpage}}" disabled style="width:19px;">页&nbsp;&nbsp;
      <span class="span">
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="first">首页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="prev">上一页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="next">下一页</a>&nbsp;&nbsp;
          <!-- <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="end">尾页</a> -->
      </span>
      </td>
    
  </tr>
  </tbody>
  <tfoot></tfoot>
</table>
</body>
</html>
<script>
$(function(){
  //判断当前页
  $(document).on("click",".span a",function(){
      var page=parseInt($("[name='page']").val());
      var totalpage=parseInt($("[name='totalpage']").val());
      if($(this).is(".first")){
        p=1;
      }else if ($(this).is(".prev")){
        p=page-1;
        if(p<1){p=1;}
      }else if($(this).is(".next")){
        p=page+1;
        if(p>totalpage){
          p=totalpage;
        }
      }else if ($(this).is(".end")){
        p=totalpage;
      }
      console.log(p)
      ajaxPage(p);
  })
  //搜索
  $(document).on("click",".text-but",function(){
    
      ajaxPage(1)
  })
  //分页
  function ajaxPage(p){
    var key=parseInt($("[name='key']").val());
    var msg=$("[name='msg']").val();
      $.ajax({
        type:'get',
        url:"<?php echo url('backborrow/ajaxPage')?>",
        data:{page:p,key:key,msg:msg},
        success:function(arr){
            // console.log(arr)
            $(".tt").empty();
            $(".tt").html(arr);
          }
      })
  }

})


</script>