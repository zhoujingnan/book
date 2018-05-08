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
    <td width="99%" align="left" valign="top">您的位置：图书管理&nbsp;&nbsp;>&nbsp;&nbsp;添加图书</td>
  </tr>
  <tr>
    <td align="left" valign="top" id="addinfo">
 
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <form method="post" action="{{url('backactivity/add')}}">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">书名：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="text" name="b_title" value="" class="text-word">
        <span class="y_b_title"></span>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">数量：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
        <input type="number" name="num" value="" class="text-word">
        <span class="y_num"></span>
        </td>
        </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">分类：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
          <select name="cate_id" id="">
            @foreach($arr as $key => $val)
              <option value="{{$val['cate_id']}}">{{$val['cate_name']}}</option>
            @endforeach
          </select>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">简介：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
            <textarea name="desc" id="" cols="30" rows="10"></textarea>
            <span class="y_desc"></span>
        </td>
      </tr>
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">售价：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
            <input type="number" name="s_price" value="" class="text-word">
            <span class="y_s_price"></span>
        </td>
      </tr>      
      <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">借价：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
            <input type="number" name="b_price" value="" class="text-word">
            <span class="y_b_price"></span>
        </td>
      </tr>     
  <tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
        <td align="right" valign="middle" class="borderright borderbottom bggray">排序：</td>
        <td align="left" valign="middle" class="borderright borderbottom main-for">
            <input type="number" name="order" value="" class="text-word">
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
  $("[name='b_title']").focus();
  var t=false;
  var n=false;
  var d=false;
  var s=false;
  var b=false;
  var o=false;
    //书名唯一性
    $(document).on("blur","[name='b_title']",function(){
        var b_title=$(this).val();
        if(b_title)
        {
          $.ajax({
            type:'get',
            url:"<?php echo url('backbook/uniqueTitle')?>",
            data:{b_title:b_title},
            success:function(msg){
              console.log(msg)
              if(msg==1)
              {
                $(".y_b_title").html("<font color='red'>书名已存在</font>");
                t=false;return false;
              }
              else
              {
                $(".y_b_title").html("<font color='green'>√</font>");
                t=true;return true;
              }
            }
        })          
        }
        else
        {
          $(".y_b_title").html("<font color='red'>书名不能为空</font>");
          t=false;return false;
        }
    })
    //数量
    $(document).on("blur","[name='num']",function(){
      var num=$(this).val();
      if(num)
      {
        if(parseInt(num)<=0){
          $(".y_num").html("<font color='red'>请填写正确的数量</font>");
          n=false;
          return false;           
        }
        else
        {
          $(".y_num").html("<font color='green'>√</font>");
          n=true;
          return true;
        }
        
      }
      else
      {
        $(".y_num").html("<font color='red'>请填写数量</font>");
        n=false;
        return false;        
      }
    })
    //简介
    $(document).on("blur","[name='desc']",function(){
      var desc=$(this).val();
      if(desc)
      {
        $(".y_desc").html("<font color='green'>√</font>");d=true;
        return true;
      }
      else
      {
        $(".y_desc").html("<font color='red'>请填写简介</font>");d=true;
        return false;        
      }
    })    
    //售价
    $(document).on("blur","[name='s_price']",function(){
      var s_price=$(this).val();
      if(s_price)
      {
        if(parseInt(s_price)<=0){
          $(".y_s_price").html("<font color='red'>请填写正确的价格</font>");
          s=false;
          return false;           
        }
        else
        {
          $(".y_s_price").html("<font color='green'>√</font>");
          s=true;
          return true;
        }
      }
      else
      {
        $(".y_s_price").html("<font color='red'>请填写售价</font>");
        s=false;
        return false;        
      }
    })    
    //借价
    $(document).on("blur","[name='b_price']",function(){
      var b_price=$(this).val();
      if(b_price)
      {
        if(parseInt(b_price)<=0){
          $(".y_b_price").html("<font color='red'>请填写正确的价格</font>");
          b=false;
          return false;           
        }
        else
        {
          $(".y_b_price").html("<font color='green'>√</font>");
          b=true;
          return true;
        }
      }
      else
      {
        $(".y_b_price").html("<font color='red'>请填写借价</font>");
        b=false;
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
        $(".y_order").html("<font color='red'>请填写排序</font>");
        o=false;
        return false;        
      }
    })      
    $("form").submit(function(e){
      if(t==true&&n==true&&d==true&&s==true&&b==true&&o==true){
        return true;
      }else{
        return false;
      }
    })
})


</script>
