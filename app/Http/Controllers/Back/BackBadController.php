<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackBadModel;
use DB;
use  Mail;
class BackBadController extends CommonController{
	public function index(){
		$obj=new BackBadModel();
		$sql="SELECT * FROM borrow INNER JOIN member ON borrow.m_id =member.m_id INNER JOIN book on borrow.b_id =book.b_id WHERE type=1";
		$arr=json_decode(json_encode($obj->sql($sql),true));
		//当前页
		$page=1;
		//每页显示条数
		$pagesize=5;
		//总条数
		$count=count($arr);
		//总页数
		$totalpage=ceil($count/$pagesize);
		//偏移量
		$offset=($page-1)*$pagesize;
		$sql="SELECT * FROM borrow INNER JOIN member ON borrow.m_id =member.m_id INNER JOIN book on borrow.b_id =book.b_id WHERE type=1 LIMIT $offset,$pagesize";
		$data=json_decode(json_encode($obj->sql($sql)),true);
		return view("back.bad_index",['arr'=>$data,'count'=>$count,'page'=>$page,'totalpage'=>$totalpage]);
	}
	public function ajaxPage(){
		$key=$_GET['key'];
		$msg=$_GET['msg'];
		if($key==1&&$msg!=''){
			$where="m_name = '$msg' and type=1";
		}
		else if($key==2&&$msg!=''){
			$where="b_title like '%$msg%' and type=1";
		}
		else if($key==3)
		{
			$e=strtotime("-1 week");
			$s=time();
			$where="borrow.addtime between '{$e}' and '{$s}' and type=1";
		}
		else if($key==4)
		{
			$e=strtotime("-1 month");
			$s=time();
			$where="borrow.addtime between '{$e}' and '{$s}' and type=1";
		}
		else
		{
			$where="1=1 and type=1";
		}
		$obj=new BackBadModel();
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
		return view("back.bad_ajaxPage",['arr'=>$data,'count'=>$count,'page'=>$page,'totalpage'=>$totalpage]);
	}	
	//审核
	public function check($id,$m_id){
		$obj=new BackBadModel();
		$mem_info=json_decode(json_encode($obj->find("member","`m_id`=$m_id")),true);
		return view("back.bad_check",['arr'=>$mem_info,'id'=>$id]);
	}
	//做审核
	public function checkDo(){
		$obj=new Mail();
		$arr=$_POST;
		$GLOBALS['m_email']=$arr['m_email'];
		$GLOBALS['desc']=$arr['desc'];
		unset($arr['_token']);
		Mail::raw($GLOBALS['desc'],function($msg){
			$msg->Subject("审核通知");
			$msg->to($GLOBALS['m_email']);
		});
		if($arr['bad_money']=="轻度")
		{
			$socre=5;
		}else if($arr['bad_money']=="中度")
		{
			$socre=10;
		}
		else if($arr['bad_money']=="重度")
		{
			$socre=20;
		}
		else
		{
			$socre=0;
		}
		$id=$arr['id'];
		$m_id=$arr['m_id'];
		$res=DB::update("update `member` set socre=socre-$socre where m_id =$m_id");
		if($res){
			$time=time();
			$bad_msg=$arr['desc'];
			$bad_money=$socre;
			$r=DB::update("update `borrow` set endtime=$time,`type`=3,`bad_msg`='{$bad_msg}',`bad_money`=$socre where id=$id");
			if($r){
				return redirect("backbad/index");
			}
		}

	}
}