<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackActivityModel;
use App\Back\CommonModel;
use DB;
use Input;
/**
*  
*/
class BackRoleController extends CommonController
{	
	public function add(){
        return view("back.role_add");
	}
	public function add_do(){
		$input = $_POST;
		$name = $input['r_name'];
		$res = DB::table('role')->insert(['r_name'=>$name]);
		if($res){
			return redirect('backrole/index');
		}
	}
	public function index(){
		$data = DB::select("select * from `role`");
		$data = json_decode(json_encode($data),true);
		return view("back.role_list",array('arr'=>$data));
	}
	public function uniqueTitle(){
		$name = $_GET['role_name'];
		$data = DB::select("select * from `role` where r_name='$name'");
		if(empty($data)){
			return 0;
		}else{
			return 1;
		}
	}
	//添加权限
	public function addpower($role_id){
		$power_data=DB::select("SELECT * FROM role INNER JOIN r_p ON role.r_id =r_p.r_id INNER JOIN power ON r_p.p_id=power.p_id WHERE role.r_id=$role_id");
		$data=json_decode(json_encode($power_data),true);
		$p_data=DB::select("SELECT * FROM power");
		$p_data=json_decode(json_encode($p_data),true);
		$p_name=array();
		foreach ($data as $key => $val) {
			$p_name[]=$val['cname'];
		}
		return view("back.role_power_add",['arr'=>$p_data,'cname'=>$p_name,'r_id'=>$role_id]);
	}
	//权限添加
	public function powerAddDo(){
		$arr=$_POST;
<<<<<<< HEAD
		print_r($arr);
=======
		unset($arr['_token']);
		$data=array();
		foreach ($arr['cname'] as $key => $val) {
			$data[$key]['r_id']=$arr['r_id'];
			$data[$key]['p_id']=$val;
		}
		$r_id=$arr['r_id'];
		$obj=new CommonModel();
		$obj->del("r_p","r_id=$r_id");
		foreach ($data as $key => $val) {
			$res=$obj->add("r_p",$val);
		}
		if($res){
			return redirect("backrole/index");
		}
>>>>>>> 051aeb6df097c53ccca4178812b8bc36a36d695b
	}
		//权限入库
	//删除角色
	public function del(){
		$id = $_GET['id'];
		DB::table('u_r')->where("r_id","=","$id")->delete();
		DB::table('r_p')->where("r_id","=","$id")->delete();
		$res = DB::table('role')->where("r_id","=","$id")->delete();
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
}
?>