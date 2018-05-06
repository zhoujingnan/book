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
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url({{asset('images/main/list_input.jpg')}}) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url({{asset('images/main/add.jpg')}}) no-repeat 0px 6px; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF}
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
.bggray{ background:#f9f9f9; font-size:14px; font-weight:bold; padding:10px 10px 10px 0; width:120px;}
.main-for{ padding:10px;}
.main-for input.text-word{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; padding:0 10px;}
.main-for select{ width:310px; height:36px; line-height:36px; border:#ebebeb 1px solid; background:#FFF; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666;}
.main-for input.text-but{ width:100px; height:40px; line-height:30px; border: 1px solid #cdcdcd; background:#e6e6e6; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#969696; float:left; margin:0 10px 0 0; display:inline; cursor:pointer; font-size:14px; font-weight:bold;}
#addinfo a{ font-size:14px; font-weight:bold; background:url({{asset('images/main/addinfoblack.jpg')}}) no-repeat 0 1px; padding:0px 0 0px 20px; line-height:45px;}
#addinfo a:hover{ background:url({{asset('images/main/addinfoblue.jpg')}}) no-repeat 0 1px;}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：积分管理&nbsp;&nbsp;>&nbsp;&nbsp;添加积分类型</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
 
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="{{url('backsocre/addDo')}}">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">积分名称：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="s_title" value="" class="text-word">
        <span class="y_s_title"></span>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">金额：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="number" name="s_money" value="" class="text-word">
        <span class="y_s_money"></span>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">积分：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
          <input type="number" name="s_socre" class="text-word">
          <span class="y_s_socre"></span>
        </td>
      </tr>  
		<tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">排序：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
          <input type="number" name="order" class="text-word">
          <span class="y_order"></span>
        </td>
      </tr>        
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">&nbsp;</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input name="" type="submit" value="提交" class="text-but">
        <input name="" type="reset" value="重置" class="text-but"></td>
        </tr>
    </table>
    </form>
    </td>
    </tr>
</table>
</body>
</html>
<script>
$(function(){
  $("[name='s_title']").focus();
  var title=false;
  var m=false;
  var j=false;
  var o=false;
    //积分名唯一性
    $(document).on("blur","[name='s_title']",function(){
        var s_title=$(this).val();
        if(s_title)
        {
          $.ajax({
            type:'get',
            url:"<?php echo url('backsocre/uniqueTitle')?>",
            data:{s_title:s_title},
            success:function(msg){
              console.log(msg)
              if(msg==1)
              {
                $(".y_s_title").html("<font color='red'>名称已存在</font>");
                title=false;return false;
              }
              else
              {
                $(".y_s_title").html("<font color='green'>√</font>");
                title=true;return true;
              }
            }
        })          
        }
        else
        {
          $(".y_s_title").html("<font color='red'>请填写积分名</font>");
          title=false;return false;
        }
    })
    //金额
    $(document).on("blur","[name='s_money']",function(){
      var s_money=$(this).val();
      if(s_money)
      {
      	if(parseInt(s_money)<=0){
			$(".y_s_money").html("<font color='red'>请填写正确的金额</font>");
			m=false;
	        return false;      		
      	}
      	else
      	{
      		$(".y_s_money").html("<font color='green'>√</font>");
      		m=true;
        	return true;
      	}
        
      }
      else
      {
        $(".y_s_money").html("<font color='red'>请填写金额</font>");
        m=false;
        return false;        
      }
    })
    //积分
    $(document).on("blur","[name='s_socre']",function(){
      var s_socre=$(this).val();
      if(s_socre)
      {
      	if(parseInt(s_socre)<=0){
			$(".y_s_socre").html("<font color='red'>请填写正确的积分</font>");
			j=false;
	        return false;      		
      	}
      	else
      	{
      		$(".y_s_socre").html("<font color='green'>√</font>");
      		j=true;
        	return true;
      	}
        
      }
      else
      {
        $(".y_s_socre").html("<font color='red'>请填写金额</font>");
        j=false;
        return false;        
      }
    })     
	//排序
    $(document).on("blur","[name='order']",function(){
      var order=$(this).val();
      if(order)
      {
      	if(parseInt(order)<=0){
			$(".y_order").html("<font color='red'>请填写正确的数字</font>");
			o=false;
	        return false;      		
      	}
      	else
      	{
      		$(".y_order").html("<font color='green'>√</font>");
      		o=true;
        	return true;
      	}
        
      }
      else
      {
        $(".y_order").html("<font color='red'>请填写金额</font>");
        o=false;
        return false;        
      }
    })    
    $("form").submit(function(e){
    	if(title==true&&m==true&&j==true&&o==true){
    		return true;
    	}else{
    		return false;
    	}
    })
})


</script>