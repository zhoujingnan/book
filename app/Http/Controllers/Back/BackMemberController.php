<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackMemberModel;
class BackMemberController extends CommonController{
	//首页
	public function index(){
		//总条数
		$obj=new BackMemberModel();
		$count=$obj->count("member","1=1");
		//当前页
		$page=1;
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->getWhere('member',"1=1",$offset,$pagesize,"status")),true);
		return view("back.member_index",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}
	//分页
	public function ajaxPage(){
		$key=$_GET['key'];
		//搜索条件
		$where="m_name like '%$key%'";
		//总条数
		$obj=new BackMemberModel();
		$count=$obj->count("member",$where);
		//当前页
		$page=$_GET['page'];
		//每页显示几条
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*5;
		$arr=json_decode(json_encode($obj->getWhere('member',$where,$offset,$pagesize,"status")),true);
		return view("back.member_ajaxPage",['arr'=>$arr,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}	
	public function ajaxUp(){
		$id=$_GET['id'];
		$status=$_GET['status'];
		$arr['status']=$status;
		$obj=new BackMemberModel();
		$res=$obj->up("member",$arr,"m_id=$id");
		if($res){
			echo 1;die;
		}
	}
}