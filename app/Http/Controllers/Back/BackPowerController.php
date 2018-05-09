<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\CommonModel;
use DB;
class BackPowerController extends CommonController{
	public function index(){
		$obj=new CommonModel();
		$arr=json_decode(json_encode($obj->find("power","1=1")),true);
		return view("back.power_index",['arr'=>$arr]);
	}
	//添加
	public function add(){
		return view("back.power_add");
	}
	public function addDo(){
		$arr=$_POST;
		unset($arr['_token']);
		$obj=new CommonModel();
		$res=$obj->add("power",$arr);
		if($res){
			return redirect("backpower/index");
		}
	}
	//修改
	public function up($p_id){
		$obj=new CommonModel();
		$arr=json_decode(json_encode($obj->find("power","p_id=$p_id")),true);
		return view("back.power_up",['arr'=>$arr]);
	}
	public function upDo(){
		$arr=$_POST;
		unset($arr['_token']);
		$p_id=$arr['p_id'];unset($arr['p_id']);
		$obj=new CommonModel();
		$res=$obj->up("power",$arr,"p_id=$p_id");
		if($res){
			return redirect("backpower/index");
		}
	}
	//单删
	public function del($p_id){
		$obj=new CommonModel();
		$res=$obj->del("power","p_id=$p_id");
		if($res){
			return redirect("backpower/index");
		}
	}
	//批删
	public function pidel(){
		$id=$_GET['str'];
		$obj=new CommonModel();
		$res=$obj->del("power","p_id in ($id)");
		if($res){
			echo 1;die;
		}		
	}
	public function uniqueTitle(){
		$name = $_GET['p_name'];
		$data = DB::select("SELECT * FROM `power` WHERE p_name='$name'");
		if(empty($data)){
			echo 0;die;
		}else{
			echo 1;die;
		}
	}
}