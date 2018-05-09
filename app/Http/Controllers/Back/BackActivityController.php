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
	public function index(){
	   	$data = DB::select("select * from `active`");
	   	$data = json_decode(json_encode($data),true);
	   	return view("back.activity_index",array('arr'=>$data));
	}
	public function del(){
		$id = $_GET['id'];
		$res = DB::table('active')->where('a_id','=',"$id")->delete();
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
}
?>