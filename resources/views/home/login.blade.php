<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>CSS3登录注册表单滑动切换特效 - 站长素材</title>

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <script src="{{asset('jquery-1.8.3.js')}}"></script>
</head>
<body>
<div style="text-align:center;margin:10px 0; font:normal 14px/24px 'MicroSoft YaHei';">
</div>
<div class="cotn_principal">
  <div class="cont_centrar">
    <div class="cont_login">
      <div class="cont_info_log_sign_up">
        <div class="col_md_login">
          <div class="cont_ba_opcitiy">
            <h2>登录</h2>
            <p>
              <a href="">QQ</a>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wx618587f22d23d877&redirect_uri=http%3A%2F%2Fwww.localhost.com%2Fmonth13%2Fbook%2Fpublic%2Fhome%2FWechaturi&response_type=code&scope=snsapi_base,snsapi_login&state=1#wechat_redirect">Wechat</a>
            </p>
            <button class="btn_login" onClick="cambiar_login()">LOGIN</button>
          </div>
        </div>
        <div class="col_md_sign_up">
          <div class="cont_ba_opcitiy">
            <h2>注册</h2>
            <p></p>
            <button class="btn_sign_up" onClick="cambiar_sign_up()">SIGN UP</button>
          </div>
        </div>
      </div>
      <div class="cont_back_info">
        <div class="cont_img_back_grey"> <img src="{{asset('po.jpg')}}" alt="" /> </div>
      </div>
      <div class="cont_forms" >
        <div class="cont_img_back_"> <img src="{{asset('po.jpg')}}" alt="" /> </div>
        <div class="cont_form_login"> <a href="#" onClick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
          <h2>登录</h2>
          <input type="text" placeholder="UserName" name="m_name" />
          <input type="password" placeholder="Password" name="m_pwd" />
          <button class="btn_login" onClick="cambiar_login()" id="login">LOGIN</button>
        </div>
        <div class="cont_form_sign_up"> <a href="#" onClick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
          <h2>注册</h2>
          <input type="text" placeholder="UserName" name="user" />
          <input type="password" placeholder="Password" name="pwd" />
          <input type="email" placeholder="Email" name="email" />
          <input type="password" placeholder="Confirm Password" name="psd" />
          <button class="btn_sign_up" onClick="cambiar_sign_up()" id="sign">SIGN UP</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="{{asset('js/index.js')}}"></script>

</body>
</html>
<script>
  $(function(){
      //登录
      $(document).on("click","#login",function(){
        var m_name=$("[name='m_name']").val();
        var m_pwd=$("[name='m_pwd']").val();
        $.ajax({
          type:'get',
          url:"{{url('home/login')}}",
          data:{m_name:m_name,m_pwd:m_pwd},
          success:function(msg){
            console.log(msg)
            if(msg==1){
              alert("登录成功");location.href="{{url('/')}}"
            }else{
              alert("登录失败")
            }            
          }
        })
      })
      //注册验证用户名
      $(document).on("click","#sign",function(){
          var user=$("[name='user']").val();
          var pwd=$("[name='pwd']").val();
          var email=$("[name='email']").val();
          var psd=$("[name='psd']").val();
          var reg=/^\d+(@)\w+(\.)\w+$/;
          $.ajax({
            type:'get',
            url:"{{url('home/uniqueUser')}}",
            data:{user:user},
            success:function(msg){
              // console.log(msg);
              if(msg==0){
                alert("用户名已存在");return false;
              }
              else
              {
                  if(user)
                  {
                    if(pwd)
                    {
                      if(email)
                      {
                        if(!reg.test(email))
                        {
                          alert("请输入正确的邮箱");return false;
                        }
                        if(psd)
                        {
                          if(pwd==psd)
                          {
                            //注册
                            $.ajax({
                              type:"get",
                              url:"{{url('home/sign')}}",
                              data:{user:user,pwd:pwd,email:email},
                              success:function(msg){
                                console.log(msg)
                                if(msg==1){
                                  alert("注册成功");location.href="{{url('/')}}"
                                }else{
                                  alert("注册失败")
                                }
                              }
                            })
                          }
                          else
                          {
                            alert("两次密码输入不一致");return false;
                          }
                        }
                        else
                        {
                          alert("请填写重复密码");return false;
                        }
                      }
                      else
                      {
                        alert("请填写邮箱");return false;
                      }
                    }
                    else
                    { 
                      alert("请填写密码");return false;
                    }
                  }
                  else
                  {
                    alert("请填写用户名");return false;
                  }                
              }
            }
          })
          
      })

  })

</script>

