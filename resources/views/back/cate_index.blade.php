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
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <thead>
  <tr>
    <td width="99%" align="left" valign="top">您的位置：图书管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="post" action="">
	         <span>分类名</span>
	         <input type="text" name="key" value="" class="text-word">
	         <input name="" type="button" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="{{url('backcate/add')}}" target="mainFrame" onFocus="this.blur()" class="add">新增分类</a></td>
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
        <th align="center" valign="middle" class="borderright"><span class="pidel">批删</span></th>
        <th align="center" valign="middle" class="borderright">编号</th>
        <th align="center" valign="middle" class="borderright">分类名称</th>
        <th align="center" valign="middle">操作</th>
      </tr>
      @foreach($arr as $key =>$val)
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="center" valign="middle" class="borderright borderbottom">
            <input type="checkbox" name="box" value="{{$val['cate_id']}}">
        </td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['cate_id']}}</td>
        <td align="center" valign="middle" class="borderright borderbottom">{{$val['cate_name']}}</td>
        <td align="center" valign="middle" class="borderbottom">
          <a href="{{url('backcate/up',['cate_id'=>$val['cate_id']])}}" target="mainFrame" onFocus="this.blur()" class="add" title="up" cate_id={{$val['cate_id']}}>编辑</a>
          <span class="gray">&nbsp;|&nbsp;</span>
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="add" title="del" cate_id="{{$val['cate_id']}}">删除</a></td>
      </tr>
      @endforeach
    </table></td>
    </tr>
  <tr>
      <td align="left" valign="top" class="fenye">{{$count}}条数据 <input type="text" name="page" value="{{$page}}" disabled style="width: 19px">/<input type="text" name="totalpage" value="{{$totalpage}}" disabled style="width:19px;">页&nbsp;&nbsp;
      <span class="span">
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="first">首页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="prev">上一页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="next">下一页</a>&nbsp;&nbsp;
          <a href="javascript:void(0)" target="mainFrame" onFocus="this.blur()" class="end">尾页</a>
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
  //单删
  $(document).on("click","[title='del']",function(){
    var cate_id=$(this).attr("cate_id");
    var page=parseInt($("[name='page']").val());
    var key=$("[name='key']").val();
    $.ajax({
      type:'get',
      url:"<?php echo url('backcate/del');?>",
      data:{cate_id:cate_id},
      success:function(msg){
        if(msg)
        {
          ajaxPage(page,key);
        }
      }
    })
  })
  //批删
  $(document).on("click",".pidel",function(){
    var page=parseInt($("[name='page']").val());
    var key=$("[name='key']").val();
     var id_obj=$(".check");
     if(confirm("确定删除吗？")){
           var id_arr='';
           $.each(id_obj,function(){
              id_arr+=$(this).val()+',';
           })
          id_arr=id_arr.substr(0,id_arr.length-1);
          //发送ajax
          $.ajax({
            type:'get',
            url:"<?php echo url('backcate/piDel')?>",
            data:{id:id_arr},
            success:function(msg){
              console.log(msg)
              if(msg){
                ajaxPage(page,key)
              }
            }
          })          
     }
  })
  $(document).on("click","[name='box']",function(){
    $(this).addClass('check');
  })
  //分页
  function ajaxPage(p){
    var key=$("[name='key']").val();
      $.ajax({
        type:'get',
        url:"<?php echo url('backcate/ajaxPage')?>",
        data:{page:p,key:key},
        success:function(arr){
            // console.log(arr)
            $(".tt").empty();
            $(".tt").html(arr);
          }
      })
  }

})


</script>