<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
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
		//搜索条件
		$where="1=1";
		//总条数
		$obj=new BackBookModel();
		$count=$obj->count("book","1=1");
		//当前页
		$page=$_GET['page'];
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->join('book',"cate","t1.cate_id =t2.cate_id",$where,$offset,$pagesize,"t1.order")),true);
		return view("back.book_index",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);	
	}
}