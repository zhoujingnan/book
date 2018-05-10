<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Request;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use DB;
use App\Back\BackLoginModel;
class BackLoginController extends Controller{
	public function index()
    {
        $img=$this->getCaptcha();
        return view("back.login",['img'=>$img]);
    }
    //登录
    public function logindo(){
    	$arr=$_POST;
    	//取出验证码并进行判断
    	$capt=Session::get('milkcaptcha');
    	if($arr['captcha']==$capt)
        {
            $obj=new BackLoginModel();
            $psd=strrev(md5(crc32($arr['pwd'])));
            $arr=json_decode(json_encode($obj->find("user","`u_name`='{$arr['username']}' AND `u_pwd`='{$psd}'")),true);
            if(empty($arr)){
                echo "用户名或密码错误！跳转中....";
                $url=url("back/login");
                header("Refresh:2;url=$url");
            }else{
                if($arr[0]['status']==1){
                    $time = time();
                    $ip = $this->getIp();
                    // echo $ip;die;
                    $id = $arr[0]['u_id'];
                    $res = DB::update("update `user` set `last_login_time`=$time,`last_login_ip`=$ip,num=num+1 where u_id=$id");
                    Session::put('uid',$arr[0]['u_id']);
                    return redirect("back/index");          
                }else{
                    echo "用户名未启用！跳转中....";
                    $url=url("back/login");
                    header("Refresh:2;url=$url");
                }
                
            }            
    	}
        else
        {
            echo "验证码错误！跳转中....";
            $url=url("back/login");
            header("Refresh:2;url=$url");die;            
        }
    	

    }
    
    public function getCaptcha(){
		$builder = new CaptchaBuilder;
        $builder->build($width = 100, $height = 30, $font = null);
        $phrase = $builder->getPhrase();
        Session::put('milkcaptcha', $phrase);
        //生成图片
        // header("Cache-Control: no-cache, must-revalidate");
        // header('Content-Type: image/jpeg');
        // $builder->save('out.jpg');
        // $builder->output();
       	$img=$builder->inline();   
       	return $img; 	
    }
    public function getIp(){
        $url="http://pv.sohu.com/cityjson";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $data=curl_exec($ch);
        $d1=explode(',',$data);
        $d2=explode(':',$d1[0]);
        $ip=$d2[1];
        return $ip;
    }

}
