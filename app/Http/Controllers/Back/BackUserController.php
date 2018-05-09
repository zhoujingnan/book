<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
class BackUserController extends CommonController{
	public function index(){
		$data = DB::select("select * from `user`");
		$data = json_decode(json_encode($data),true);
		return view("back.user_index",['arr'=>$data]);
	}
	public function add(){
		return view("back.user_add");
	}
	public function add_do(){
		$input = Input::get();
		$name = $input['u_name'];
		$pwd = $input['u_pwd'];
		$psd=strrev(md5(crc32($pwd)));
		$time = time();
		$res = DB::insert('insert into `user`(u_name,u_pwd,addtime) values(?,?,?)',["$name","$psd","$time"]);
		if($res){
			return redirect('backuser/index');
		}
	}
	//修改密码
	public function up_pwd($id){
		$data = DB::select("select * from `user` where `u_id`=$id");
		$data = json_decode(json_encode($data),true)[0];
		return view("back.user_pwd",['arr'=>$data]);
	}
	public function up_pwd_do(){
		$data = $_POST;
		$id = $data['id'];
		$pwd = strrev(md5(crc32($data['u_pwd'])));
		$res = DB::update("update `user` set `u_pwd`='$pwd' where u_id=$id");
		if($res){
			return redirect('back/main');
		}else{
			return redirect('backuser/up_pwd');
		}
	}
	//审核状态
	public function up_status(){
		$status = $_GET['status'];
		$id = $_GET['id'];
		$u_id = Session::get("uid");
		if($id==$u_id){
			return 2;die;
		}
		$res = DB::update("update `user` set `status`=$status where u_id=$id");
		if($res){
			return 0;
		}else{
			return 1;
		}
	}
	//添加角色
	public function u_role($u_id){
		// $u_id = $GET['id'];
		$a_data = DB::select("select * from `user` where u_id=$u_id");
		$u_name = json_decode(json_encode($a_data), true)[0]['u_name'];
		$r_data = DB::select("select * from `role`");
		$r_data = json_decode(json_encode($r_data), true);
		$p_data = DB::select("select * from `u_r` where u_id=$u_id");
		$p_data = json_decode(json_encode($p_data), true);
		// var_dump($r_data);
		// var_dump($p_data);
		foreach($r_data as $key => $val){
			foreach($p_data as $k => $v){
				if($val['r_id']==$v['r_id']){
					$r_data[$key]['check'] = "checked";
				}
			}
		}
		//var_dump($r_data);die;
		return view('back.u_role',['u_name'=>$u_name,'data'=>$r_data,'id'=>$u_id]);
	}
	public function u_role_do(){
		$input = $_POST;
		$u_id = $input['id'];
		$r_id = $input['role'];
		DB::table('u_r')->where("u_id","=","$u_id")->delete();
		foreach ($r_id as $k => $v) {
			$res = DB::table('u_r')->insert(['u_id'=>$u_id,'r_id'=>$v]);
		}
		if($res){
			return redirect("backuser/index");
		}		
	}
	//删除
	public function del(){
		$u_id = $_GET['id'];
		$id = Session::get("uid");
		if($id==$u_id){
			return 2;die;
		}
		DB::table('u_r')->where("u_id","=","$u_id")->delete();
		$res = DB::table('user')->where("u_id","=","$u_id")->delete();
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
	//唯一验证
	public function only(){
		$u_name = $_GET['u_name'];
		$data = DB::select("select * from `user` where u_name='$u_name'");
		if(empty($data)){
			return 0;
		}else{
			return 1;
		}
	}
}