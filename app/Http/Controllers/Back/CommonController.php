<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Controller;
use Session;
use DB;
class CommonController extends Controller{
	public function __construct(){
		$u_id=Session::get("uid");
		if(empty($u_id)){
			echo "请先登录,跳转中...";
			$url=url("back/login");
			header("Refresh:2;url=$url");die;
		}else
		{
			//判断权限
			$sql="SELECT power.cname FROM u_r INNER JOIN role ON u_r.r_id=role.r_id INNER JOIN r_p on role.r_id = r_p.r_id INNER JOIN power ON r_p.p_id=power.p_id where u_r.u_id=$u_id";
			$arr=DB::select($sql);
			$cname_data=array();
			foreach ($arr as $key => $val) {
				$cname_data[]=strtolower($val->cname);
			}
			//获取现在的控制器名
			$p=request()->route()->getAction()['controller'];
			$p=explode('@',$p);
			$c=strtolower("back".explode('Back',$p[0])[2]);
			if(!in_array($c,$cname_data)){
				echo "您没有权限";die;
			}
			// print_r($c);die;
		}

	}
}



 ?>