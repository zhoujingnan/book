<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackIndexModel;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
class BackPayController extends CommonController{
	public function index(){
		
		$input = Input::get();		
		//当前页
		$page = isset($input['page']) ? $input['page'] : 1;
		$p_type = isset($input['p_type']) ? $input['p_type'] : "";
		$p_time = isset($input['p_time']) ? $input['p_time'] : "";
		$u_name = isset($input['u_name']) ? $input['u_name'] : "";
		if($page==0){
			$page=1;
		}
		$z_data = array('p_type'=>$p_type,'p_time'=>$p_time,'u_name'=>$u_name,'page'=>$page);
		//每页多少条
		$size = 5;
		$limit = ($page-1)*$size;
		$where = "1=1";
		if($p_type!=""){
			$where .= " and `type`=$p_type";
		}
		if($p_time==1){
			$time = strtotime("-1 day");
		}elseif($p_time==2){
			$time = strtotime("-1 week");
		}elseif($p_time==3){
			$time = strtotime("-1 month");
		}
		if($p_time!=""){
			$where .= " and `addtime`>$time";
		}
		if($u_name!=""){
			$u_data = DB::select("select * from `member` where `m_name` like '%$u_name%'");
			$u_data = json_decode(json_encode($u_data),true);
			$m_id = "";
			foreach ($u_data as $k => $v) {
				$m_id .= ",".$v['m_id'];
			}
			$mid = substr($m_id,1);
			$where .= " and `m_id` in ($mid)";
		}
		$data = DB::select("select * from `pay` where $where limit $limit,$size");
		$data = json_decode(json_encode($data),true);
		if(empty($data)){
			$limit = ($page-2)*$size;
			$z_data['page'] = $page-1;
			$data = DB::select("select * from `pay` where $where limit $limit,$size");
			$data = json_decode(json_encode($data),true);
		}
		foreach ($data as $k => $v) {
			$m_id = $v['m_id'];
			$m_data = DB::select("select * from `member` where m_id=$m_id");
			$m_data = json_decode(json_encode($m_data),true)[0];
			$data[$k]['m_name'] = $m_data['m_name'];
		}
		return view("back.pay_index",array('arr'=>$data,'z_data'=>$z_data));
	}
		
}