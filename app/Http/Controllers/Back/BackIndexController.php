<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackIndexModel;
use Session;
use DB;
class BackIndexController extends CommonController{
	public function index(){
		$data = DB::select("select * from net");
		if(empty($data)){
			return redirect('backnet/add');
		}else{
			return view("back.index");
		}
	}
	public function top(){
		$ip=$this->getIp();
		$data=$this->getWeather($ip);
		$time=date("Y-m-d",time()+28800);
		$str='';
		$net_data = DB::select("select * from `net`");
		$n_data = json_decode(json_encode($net_data),true)[0];
		// var_dump($n_data);die;
		foreach ($data as $key => $val) {
			if($val['days']==$time){
				$str.=$val['citynm']."&nbsp;".$val['days']."&nbsp;".$val['week']."&nbsp;".$val['weather']."&nbsp;".$val['temperature'];
			}
		}
		return view("back.top",['str'=>$str,'net'=>$n_data]);
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
		$ip=explode('"',$ip);
		return $ip[1];
	}	
	public function getWeather($ip){
		$ch=curl_init();
		$url="http://api.k780.com:88/?app=weather.future&weaid=$ip&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=json";
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$data=curl_exec($ch);
		$arr=json_decode($data,true);
		return $arr['result'];
	}
	public function bottom(){
		return view("back.bottom");
	}	
	public function left(){
		$obj = new BackIndexModel();
		$arr = json_decode(json_encode($obj->find("column","1=1")),true);
		$u_id = Session::get('uid');
		$u_data = DB::select("select * from `user` where u_id=$u_id");
		$u_data=json_decode(json_encode($u_data),true)[0];
		$r_data = DB::select("select * from `u_r` inner join `role` on u_r.r_id=role.r_id where u_r.u_id=$u_id");
		$r_data=json_decode(json_encode($r_data),true)[0];
		$u_data['role'] = $r_data['r_name'];
		// var_dump($r_data);die;
		return view("back.left",['arr'=>$arr,'u_data'=>$u_data]);
	}	
	public function swich(){
		return view("back.swich");
	}	
	public function main(){
		$admin_id = Session::get('uid');
		$a_data = DB::select("select * from `user` where u_id=$admin_id");
		$a_data = json_decode(json_encode($a_data), true)[0];
		$a_data['last_login_time'] = $a_data['last_login_time']+3600*8;
		$h = date("H",$a_data['last_login_time']);
		// var_dump($h);die;
		if($h>=0 && $h<6){
			$a_data['h'] = "凌晨好";
		}else if($h>=6 && $h<12){
			$a_data['h'] = "上午好";
		}else if($h>=12 && $h<18){
			$a_data['h'] = "下午好";
		}else if($h>=18 && $h<24){
			$a_data['h'] = "晚上好";
		}
		$n_data = DB::select('SELECT * FROM `net`');
		$data = json_decode(json_encode($n_data),true)[0];
		//var_dump($data);
		if(empty($data)){
			return view("back.main");
		}else{
			return view("back.main",array('arr'=>$data,'a_data'=>$a_data));
		}
	}	
}