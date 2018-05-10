<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use App\Back\BackNetModel;
use DB;
use Illuminate\Support\Facades\Input;
class BackFreeController extends CommonController{
	public function index(){
		$free_data = DB::select('select * from `free_log`');
		//没有记录时
		if(empty($free_data)){
			echo "没有消费记录";die;
		}else{
			$input = Input::get();		
			//当前页
			$page = isset($input['page']) ? $input['page'] : 1;
			$p_type = isset($input['p_type']) ? $input['p_type'] : "";
			$p_time = isset($input['p_time']) ? $input['p_time'] : "";
			$u_name = isset($input['u_name']) ? $input['u_name'] : "";
			$b_name = isset($input['b_name']) ? $input['b_name'] : "";
			if($page==0){
				$page=1;
			}
			$z_data = array('p_type'=>$p_type,'p_time'=>$p_time,'u_name'=>$u_name,'b_name'=>$b_name,'page'=>$page);
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
			if($b_name!=""){
				$b_data = DB::select("select * from `book` where `b_title` like '%$b_name%'");
				$b_data = json_decode(json_encode($b_data),true);
				$b_id = "";
				foreach ($b_data as $k => $v) {
					$b_id .= ",".$v['b_id'];
				}
				$bid = substr($b_id,1);
				$where .= " and `b_id` in ($bid)";
			}
			$data = DB::select("select * from `free_log` where $where limit $limit,$size");
			$data = json_decode(json_encode($data),true);
			if(empty($data)){
				$limit = ($page-2)*$size;
				$z_data['page'] = $page-1;
				$data = DB::select("select * from `free_log` where $where limit $limit,$size");
				$data = json_decode(json_encode($data),true);
			}
			foreach ($data as $k => $v) {
				$m_id = $v['m_id'];
				$m_data = DB::select("select * from `member` where m_id=$m_id");
				$m_data = json_decode(json_encode($m_data),true)[0];
				$data[$k]['m_name'] = $m_data['m_name'];
				$b_id = $v['b_id'];
				$b_data = DB::select("select * from `book` where b_id=$b_id");
				$b_data = json_decode(json_encode($b_data),true)[0];
				$data[$k]['b_name'] = $b_data['b_title'];
			}
			return view("back.free_log_index",array('arr'=>$data,'z_data'=>$z_data));
		}
		
	}
}