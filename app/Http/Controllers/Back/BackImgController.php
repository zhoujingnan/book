<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use DB;
use Illuminate\Support\Facades\Input;
class BackImgController extends CommonController{
	public function index(){
		$count = DB::table('img')->count();//总条数
		echo $count;die;
		$page = 1;//当前页数
		$total = ceil($count/5);//总页数
		$data = DB::select("select * from `img` limit 0,5");
		$data = json_decode(json_encode($data),true);
		foreach ($data as $k => $v) {
			$id = $v['city_id'];
			$c_data = DB::select("select * from `city` where city_id=$id");
			$data[$k]['city'] = json_decode(json_encode($c_data),true)[0]['city_name'];
		}
		// var_dump($data);die;
		return view("back.img_index",array('arr'=>$data,'page'=>$page,'count'=>$count,'totalpage'=>$total));
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