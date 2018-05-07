<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackBorrowModel;
class BackBorrowController extends CommonController{
	public function index(){
		$obj=new BackBorrowModel();
<<<<<<< HEAD
		print_r($obj);
=======
		//条件
		$where="1=1";		
		$sql="SELECT * FROM borrow INNER JOIN member ON borrow.m_id =member.m_id INNER JOIN book on borrow.b_id =book.b_id WHERE $where";
		$data=json_decode(json_encode($obj->sql($sql)),true);		
		//总条数
		$count=count($data);
		//每页显示条数
		$pagesize=5;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//当前页
		$page=1;
		//偏移量
		$offset=($page-1)*$pagesize;
		$sql="SELECT * FROM borrow INNER JOIN member ON borrow.m_id =member.m_id INNER JOIN book on borrow.b_id =book.b_id WHERE $where LIMIT $offset,$pagesize";
		$data=json_decode(json_encode($obj->sql($sql)),true);
		return view("back.borrow_index",['arr'=>$data,'count'=>$count,'page'=>$page,'totalpage'=>$totalpage]);
	}
	public function ajaxPage(){
		$key=$_GET['key'];
		$msg=$_GET['msg'];
		if($key==1&&$msg!=''){
			$where="m_name = '$msg'";
		}
		else if($key==2&&$msg!=''){
			$where="b_title like '%$msg%'";
		}
		else if($key==3)
		{
			$e=strtotime("-1 week");
			$s=time();
			$where="borrow.addtime between '{$e}' and '{$s}'";
		}
		else if($key==4)
		{
			$e=strtotime("-1 month");
			$s=time();
			$where="borrow.addtime between '{$e}' and '{$s}'";
		}
		else
		{
			$where="1=1";
		}
		$obj=new BackBorrowModel();
		$sql="SELECT * FROM borrow INNER JOIN member ON borrow.m_id =member.m_id INNER JOIN book on borrow.b_id =book.b_id WHERE $where";
		$data=json_decode(json_encode($obj->sql($sql)),true);
		//总条数
		$count=count($data);
		//每页显示条数
		$pagesize=5;
		//当前页
		$page=$_GET['page'];
		//偏移量
		$offset=($page-1)*$pagesize;
		//总页数
		$totalpage=ceil($count/$pagesize);
		$sql="SELECT * FROM borrow INNER JOIN member ON borrow.m_id =member.m_id INNER JOIN book on borrow.b_id =book.b_id WHERE $where LIMIT $offset,$pagesize";
		$data=json_decode(json_encode($obj->sql($sql)),true);
		return view("back.borrow_ajaxPage",['arr'=>$data,'count'=>$count,'page'=>$page,'totalpage'=>$totalpage]);
>>>>>>> 91eaa5699959be547b2e2bdd05f750146a07ff38
	}
}