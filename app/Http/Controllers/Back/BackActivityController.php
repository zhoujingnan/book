<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackActivityModel;
use DB;
use Input;
/**
*  
*/
class BackActivityController extends CommonController
{
	//添加活动
	public function add(){
        return view("back.activity_add");
	}
	public function add_do(){
		$input = $_POST;
		$start = strtotime($input['starttime']);
		$end = strtotime($input['endtime']);
		$name = $input['name'];
		$desc = $input['desc'];
		$order = $input['order'];
		if($start>$end){
			echo "活动开始时间不能大于活动结束时间";
			$url=url("backactivity/add");
			header("Refresh:2;url=$url");die;
		}
		$res = DB::table('active')->insert(['name'=>$name,'starttime'=>$start,'endtime'=>$end,'desc'=>$desc,'order'=>$order]);
		if($res){
			return redirect('backactivity/index');
		}
	}
	//展示活动
	public function index(){
	   	$data = DB::select("select * from `active`");
	   	$data = json_decode(json_encode($data),true);
	   	return view("back.activity_index",array('arr'=>$data));
	}
	//删除活动
	public function del(){
		$id = $_GET['id'];
		DB::table('b_active')->where('a_id','=',"$id")->delete();
		$res = DB::table('active')->where('a_id','=',"$id")->delete();
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
	//查看活动
	public function b_active($a_id){
		$data = DB::select("select * from `b_active` where a_id=$a_id");
		$data = json_decode(json_encode($data),true);
		$a_name = DB::select("select * from `active` where a_id=$a_id");
		$a_name = json_decode(json_encode($a_name),true)[0]['name'];
		foreach ($data as $k => $v) {
			$b_id = $v['b_id'];
			$b_name = DB::select("select * from `book` where b_id=$b_id");
			$data[$k]['book'] = json_decode(json_encode($b_name),true)[0]['b_title'];
		}
		return view("back.b_active",array('arr'=>$data,'a_name'=>$a_name));
	}
	//删除添加的图书
	public function a_del(){
		$id = $_GET['id'];
		$res = DB::table('b_active')->where('b_id','=',"$id")->delete();
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
}
?>