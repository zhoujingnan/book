<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理登录界面</title>
    <link href="{{asset('css/alogin.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('jquery-1.8.3.js')}}"></script>
</head>
<body>
    <form id="form1" runat="server" action="{{url('back/logindo')}}" method="post">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span><img src="{{asset('images/login/logo.gif')}}" alt="" style="" /></span></li>
            <li class="topC"></li>
            <li class="topD">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <ul class="login">
                    <li>
                        <span class="left login-text">用户名：</span> 
                        <span style="left">
                            <input id="Text1" type="text" class="txt" name="username"/>
                        </span>
                    </li>
                    <li>
                        <span class="left login-text">密码：</span> <span style="left">
                            <input id="Text2" type="password" class="txt" name="pwd" />  
                        </span>
                    </li>
                    <li>
                        <span class="left login-text">验证码：</span> <span style="left">
                            <span>
                                <img src="<?php echo $img?>" alt="" class="img"/>    
                                <input style="width:75px;height:50px;border-radius: 1px" id="Text3" type="text"  name="captcha" />  
                            </span>
                        </span>
                    </li>                           
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C">

                <span class="btn"><input name="" type="image" src="{{asset('images/login/btnlogin.gif')}}" /></span>

            </li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">网站后台管理系统&nbsp;&nbsp;www.php.com</li>
        </ul>
    </div>
    </form>
</body>
</html>
<script>
$(function(){
    $(document).on("click",".img",function(){
        _this=$(this);
        $.ajax({
            type:'get',
            url:"<?php echo url('back/getCaptcha')?>",
            success:function(msg){
                // console.log(msg);
                _this.attr("src",msg);
            }
        })
    })
})


</script>