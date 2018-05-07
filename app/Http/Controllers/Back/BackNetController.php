<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use App\Back\BackNetModel;
use DB;
use Session;
use Illuminate\Support\Facades\Input;
class BackNetController extends CommonController{

	public function index(){
		$data = DB::select("select * from net");
		if(empty($data)){
			return redirect('backnet/add');
		}else{
			$data = json_decode(json_encode($data),true)[0];
			return view("back.net_index",array('arr'=>$data));
		}
	}
	//添加
	public function add(){
		return view("back.net_add");
	}
	public function add_do(){
		$input = Input::get();
		$net_title = $input['net_title'];
		$net_key = $input['net_key'];
		$net_url = $input['net_url'];
		$net_desc = $input['net_desc'];
		$net_bei = $input['net_bei'];
		$net_qq = $input['net_qq'];
		//var_dump($_FILES);die;
		$net_logo = $this->getimage($_FILES['net_logo']);
		$net_er = $this->getimage($_FILES['net_er']);
		//echo $net_logo.$net_er;die;
		if($net_logo == 1 || $net_er == 1){
			echo "图片格式不对";
			$url=url("backnet/add");
			header("Refresh:2;url=$url");die;
		}
		$data = DB::select("select * from net");
		$res = DB::insert('insert into `net`(net_title,net_key,net_url,net_desc,net_bei,net_qq,net_logo,net_er) values(?,?,?,?,?,?,?,?)',["$net_title","$net_key","$net_url","$net_desc","$net_bei","$net_qq","$net_logo","$net_er"]);
		if($res){
			return redirect('backnet/index');
		}
	}
	public function update(){
		$n_data = DB::select('SELECT * FROM `net`');
		$data = json_decode(json_encode($n_data),true)[0];
		return view("back.net_up",array('arr'=>$data));
	}
	public function up_do(){
		$input = Input::get();
		// var_dump($_FILES['net_logo']);die;
		$net_title = $input['net_title'];
		$net_key = $input['net_key'];
		$net_url = $input['net_url'];
		$net_desc = $input['net_desc'];
		$net_bei = $input['net_bei'];
		$net_qq = $input['net_qq'];
		$logo = $input['logo'];
		$er = $input['er'];
		if(empty($_FILES['net_logo']['name'])){
			$net_logo = $logo;
		}else{
			$net_logo = $this->getimage($_FILES['net_logo']);
		}
		if(empty($_FILES['net_er']['name'])){
			$net_er = $er;
		}else{
			$net_er = $this->getimage($_FILES['net_er']);
		}
		// var_dump($net_er);die;
		$res = DB::update("update `net` set net_title='$net_title',net_key='$net_key',net_url='$net_url',net_desc='$net_desc',net_bei='$net_bei',net_qq='$net_qq',net_logo='$net_logo',net_er='$net_er'");
		if($res){
			return redirect('backnet/index');
		}
	}

	public function quit(){
		echo "已经退出";
		Session::flush();
		$url=url("back/login");
		header("Refresh:2;url=$url");die;
	}
	function getimage($img){
		$arr = array('image/jpg','image/jpeg','image/gif','image/bmp','image/png');
		if(in_array($img['type'],$arr)){
			$postfix = substr($img['name'],strpos($img['name'],'.'));
			$ad_content = "images/".time()."-".rand(1000,9999).$postfix;
			move_uploaded_file($img["tmp_name"],  $ad_content);
			return $ad_content;
		}else{
			return 1;die;
		}
	}

}