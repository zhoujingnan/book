<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackIndexModel;
use Session;
use DB;
class BackIndexController extends CommonController{
	public function index(){
		return view("back.index");
	}
	public function top(){
		return view("back.top");
	}
	public function bottom(){
		return view("back.bottom");
	}	
	public function left(){
		$obj=new BackIndexModel();
		$arr=json_decode(json_encode($obj->find("column","1=1")),true);
		return view("back.left",['arr'=>$arr]);
	}	
	public function swich(){
		return view("back.swich");
	}	
	public function main(){
		$admin_id = Session::get('uid');
		$a_data = DB::select("select * from `user` where u_id=$admin_id");
		$a_data = json_decode(json_encode($a_data), true)[0];
		//$a_data['last_login_time'] = $a_data['last_login_time']+3600*8;
		//$h = date("H",$a_data['last_login_time']);
		//if($h>=0 && $h<6){
		//	$a_data['h'] = "凌晨好";
		//}else if($h>=6 && $h<12){
		//	$a_data['h'] = "上午好";
		//}else if($h>=12 && $h<18){
		//	$a_data['h'] = "下午好";
		//}else if($h>=18 && $h<24){
		//	$a_data['h'] = "晚上好";
		//}
		$n_data = DB::select('select * from `net`');
		$data = json_decode(json_encode($n_data), true)[0];
		//var_dump($data);
		if(empty($data)){
			return view("back.main");
		}else{
			return view("back.main",array('arr'=>$data,'a_data'=>$a_data));
		}
	}	
}