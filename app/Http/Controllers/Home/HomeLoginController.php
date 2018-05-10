<?php 
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use DB;
use App\Back\CommonModel;
use Session;
class HomeLoginController extends Controller{
	public function index(){
		return view("home.login");
	}
	public function uniqueUser(){
		$user=$_GET['user'];
		$obj=new CommonModel();
		$arr=$obj->find("member","m_name='$user'");
		if(empty($arr)){
			echo 1;die;//不存在
		}else{
			echo 0;die;//存在
		}

	}
	//注册
	public function sign(){
		$user=$_GET['user'];
		$pwd=md5(md5($_GET['pwd']));
		$email=$_GET['email'];
		$time=time();
		$id=DB::table("member")->insertGetId(['m_name'=>$user,'m_pwd'=>$pwd,'m_email'=>$email,'addtime'=>$time]);
		if($id){
			Session::put('member_id',$id);
			return 1;//注册成功
		}else
		{
			return 0;//注册失败
		}
	}
	public function login(){
		$m_name=$_GET['m_name'];
		$m_pwd=md5(md5($_GET['m_pwd']));
		$obj=new CommonModel();
		$arr=$obj->find("member","m_name='$m_name' and `m_pwd`='$m_pwd'");
		$arr=json_decode(json_encode($arr),true);
		// print_r($arr);die;
		if($arr){
			Session::put('member_id',$arr[0]['m_id']);
			return 1;//登录成功
		}else{
			return 0;//登录失败
		}
	}
    //微信回调地址
    public function Wechaturi(){
        $code=$_GET['code'];die;
    }	
}