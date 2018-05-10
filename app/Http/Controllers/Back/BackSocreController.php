<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackSocreModel;
class BackSocreController extends CommonController{
	public function index(){
		//总条数
		$obj=new BackSocreModel();
		$count=$obj->count("socre","1=1");
		//当前页
		$page=1;
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->get('socre',"1=1",$offset,$pagesize)),true);
		return view("back.socre_index",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}
	public function ajaxPage(){
		$key=$_GET['key'];
		//搜索条件
		$where="s_title like '%$key%'";		
		//总条数
		$obj=new BackSocreModel();
		$count=$obj->count("socre",$where);
		//当前页
		$page=$_GET['page'];
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->get('socre',$where,$offset,$pagesize)),true);
		return view("back.socre_ajaxPage",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}	
	//批删
	public function piDel(){
		$id=$_GET['id'];
		$obj=new BackSocreModel();
		$res=$obj->piDel("socre","s_id in ($id)");
		if($res){
			echo 1;die;
		}
	}
	//添加
	public function add(){
		$obj=new BackSocreModel();
		$arr=json_decode(json_encode($obj->find("cate","1=1")),true);
		return view("back.socre_add",['arr'=>$arr]);
	}
	//做添加
	public function addDo(){
		$arr=$_POST;
		unset($arr['_token']);
		$obj=new BackSocreModel();
		$res=$obj->add("socre",$arr);
		if($res){
			return redirect("backsocre/index");
		}
	}
	//单删
	public function del(){
		$s_id=$_GET['s_id'];
		$obj=new BackSocreModel();
		$res=$obj->del("socre","`s_id`=$s_id");
		if($res){
			echo 1;die;
		}
	}
	//修改
	public function up($s_id){
		$obj=new BackSocreModel();
		$arr=json_decode(json_encode($obj->find('socre',"s_id=$s_id")),true);
		return view("back.socre_up",['arr'=>$arr]);
	}
	//做修改
	public function upDo(){
		$arr=$_POST;
		$s_id=$arr['s_id'];
		unset($arr['_token']);
		unset($arr['s_id']);
		$obj=new BackSocreModel();
		$res=$obj->up("socre",$arr,"s_id=$s_id");
		if($res){
			return redirect("backsocre/index");
		}
		else
		{
			return redirect("backsocre/index");
		}

	}
	//唯一性
	public function uniqueTitle(){
		$s_title=$_GET['s_title'];
		$obj=new BackSocreModel();
		$arr=json_decode(json_encode($obj->find("socre","`s_title` = '$s_title'")),true);
		if($arr){
			echo 1;die;
		}
		else
		{
			echo 0;die;
		}
	}	
}
