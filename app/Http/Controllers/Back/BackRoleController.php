<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackActivityModel;
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