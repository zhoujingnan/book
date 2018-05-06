<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackBookModel;
class BackBookController extends CommonController{
	//首页
	public function index(){
		//总条数
		$obj=new BackBookModel();
		$count=$obj->count("book","1=1");
		//当前页
		$page=1;
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->join('book',"cate","t1.cate_id =t2.cate_id","1=1",$offset,$pagesize,"t1.order")),true);
		return view("back.book_index",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}
	//分页
	public function ajaxPage(){
		$key=$_GET['key'];
		//搜索条件
		$where="t1.b_title like '%$key%'";
		//总条数
		$obj=new BackBookModel();
		$count=$obj->count("book","b_title like '%$key%'");
		//当前页
		$page=$_GET['page'];
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->join('book',"cate","t1.cate_id =t2.cate_id",$where,$offset,$pagesize,"t1.order")),true);
		return view("back.book_ajaxPage",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count,'key'=>$key]);	
	}
	//批删
	public function piDel(){
		$id=$_GET['id'];
		$obj=new BackBookModel();
		$res=$obj->piDel("book","b_id in ($id)");
		if($res){
			echo 1;die;
		}
	}
	//添加
	public function add(){
		$obj=new BackBookModel();
		$arr=json_decode(json_encode($obj->find("cate","1=1")),true);
		return view("back.book_add",['arr'=>$arr]);
	}
	//做添加
	public function addDo(){
		$arr=$_POST;
		unset($arr['_token']);
		$obj=new BackBookModel();
		$res=$obj->add("book",$arr);
		if($res){
			return redirect("backbook/index");
		}
	}
	//单删
	public function del(){
		$b_id=$_GET['b_id'];
		$obj=new BackBookModel();
		$res=$obj->del("book","`b_id`=$b_id");
		if($res){
			echo 1;die;
		}
	}
	//修改
	public function up($b_id){
		$obj=new BackBookModel();
		$brr=json_decode(json_encode($obj->find("cate","1=1")),true);
		$arr=json_decode(json_encode($obj->find('book',"b_id=$b_id")),true);
		return view("back.book_up",['arr'=>$arr,'brr'=>$brr]);
	}
	//做修改
	public function upDo(){
		$arr=$_POST;
		$b_id=$arr['b_id'];
		unset($arr['_token']);
		unset($arr['b_id']);
		$obj=new BackBookModel();
		$res=$obj->up("book",$arr,"b_id=$b_id");
		if($res){
			return redirect("backbook/index");
		}
		else
		{
			return redirect("backbook/index");
		}

	}
	//唯一性
	public function uniqueTitle(){
		$b_title=$_GET['b_title'];
		$obj=new BackBookModel();
		$arr=json_decode(json_encode($obj->find("book","`b_title` = '$b_title'")),true);
		if($arr){
			echo 1;die;
		}
		else
		{
			echo 0;die;
		}
	}
}