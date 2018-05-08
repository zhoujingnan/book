<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use DB;
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
		$res = DB::update("update `user` set `status`=$status where u_id=$id");
		if($res){
			return 0;
		}else{
			return 1;
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