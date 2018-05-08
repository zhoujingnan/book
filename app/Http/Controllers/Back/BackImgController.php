<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use DB;
use Illuminate\Support\Facades\Input;
class BackImgController extends CommonController{
	public function index(){
		return view("back.img_index");
	}
	public function add(){
		$c_data = DB::select("select * from `city` where parent_id=1");
		$c_data = json_decode(json_encode($c_data),true);
		return view("back.img_add",array('arr'=>$c_data));
	}
	public function city(){
		$id = $_GET['pro'];
		$data = DB::select("select * from `city` where parent_id=$id");
		if(!empty($data)){
			$data = json_decode(json_encode($data),true);
			$arr['success'] = 1;
			$arr['data'] = $data;
		}else{
			$arr['success'] = 0;
		}
		return $arr;
	}
	public function add_do(){
		$city = $_POST['city'];
		$file = $_FILES['img'];
		$img = $this->getimage($file);
		$res = DB::insert('insert into `img`(img,city_id) values(?,?)',["$img","$city"]);
		if($res){
			return redirect('backimg/index');
		}else{
			return redirect('backimg/add');
		}
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