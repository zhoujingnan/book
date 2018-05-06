<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackCateModel;
class BackCateController extends CommonController{
	//首页
	public function index(){
		//总条数
		$obj=new BackCateModel();
		$count=$obj->count("cate","1=1");
		//当前页
		$page=1;
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->get('cate',"1=1",$offset,$pagesize)),true);
		// $data=$this->tree($arr);
		return view("back.cate_index",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}
	public function ajaxPage(){
		$key=$_GET['key'];
		//搜索条件
		$where="cate_name like '%$key%'";		
		//总条数
		$obj=new BackCateModel();
		$count=$obj->count("cate",$where);
		//当前页
		$page=$_GET['page'];
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->get('cate',$where,$offset,$pagesize)),true);
		return view("back.cate_ajaxPage",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}		
	//批删
	public function piDel(){
		$id=$_GET['id'];
		$obj=new BackCateModel();
		$res=$obj->piDel("cate","cate_id in ($id)");
		if($res){
			echo 1;die;
		}
	}
	//添加
	public function add(){
		return view("back.cate_add");
	}
	//做添加
	public function addDo(){
		$arr=$_POST;
		unset($arr['_token']);
		$obj=new BackCateModel();
		$res=$obj->add("cate",$arr);
		if($res){
			return redirect("backcate/index");
		}
	}
	//单删
	public function del(){
		$cate_id=$_GET['cate_id'];
		$obj=new BackCateModel();
		$res=$obj->del("cate","`cate_id`=$cate_id");
		if($res){
			echo 1;die;
		}
	}
	//修改
	public function up($cate_id){
		$obj=new BackCateModel();
		$arr=json_decode(json_encode($obj->find('cate',"cate_id=$cate_id")),true);
		return view("back.cate_up",['arr'=>$arr]);
	}
	//做修改
	public function upDo(){
		$arr=$_POST;
		$cate_id=$arr['cate_id'];
		unset($arr['_token']);
		unset($arr['cate_id']);
		$obj=new BackCateModel();
		$res=$obj->up("cate",$arr,"cate_id=$cate_id");
		if($res){
			return redirect("backcate/index");
		}
		else
		{
			return redirect("backcate/index");
		}

	}
	//唯一性
	public function uniqueTitle(){
		$cate_name=$_GET['cate_name'];
		$obj=new BackCateModel();
		$arr=json_decode(json_encode($obj->find("cate","`cate_name` = '$cate_name'")),true);
		if($arr){
			echo 1;die;
		}
		else
		{
			echo 0;die;
		}
	}	
	//处理
	public function tree($arr,$p_id=0,$lavel=1){
		static $brr;
		foreach ($arr as $key => $val) {
			if($val['p_id']==$p_id){
				$brr[$key]=$val;
				$brr[$key]['lavel']=$lavel;
				$this->tree($arr,$val['cate_id'],$lavel+1);
			}
		}
		return $brr;
	}
}