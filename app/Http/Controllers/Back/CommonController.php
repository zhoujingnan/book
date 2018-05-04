<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Session;
class CommonController extends Controller{
	public function __construct(){
		$u_id=Session::get("uid");
		if(empty($u_id)){
			echo "请先登录,跳转中...";
			$url=url("back/login");
			header("Refresh:2;url=$url");die;
		}
	}
}



 ?>