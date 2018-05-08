<?php 
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use DB;
use App\Back\CommonModel;
use Session;
class HomeIndexController extends Controller{
	public function index(){
		$obj=new CommonModel();
		//总条数
		$count=count(DB::select("SELECT * FROM `book` INNER JOIN `cate` ON book.cate_id=cate.cate_id ORDER BY book.addtime DESC"));
		//每页显示条数
		$pagesize=6;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//当前页
		$page=1;
		//偏移量
		$offset=($page-1)*$pagesize;		
		//查询搜索分类
		$arr=json_decode(json_encode($obj->find("cate","1=1")),true);
		//查询图书
		$book_data=DB::select("SELECT * FROM `book` INNER JOIN `cate` ON book.cate_id=cate.cate_id ORDER BY book.addtime DESC LIMIT $offset,$pagesize");
		$book_data=json_decode(json_encode($book_data),true);
		//阅读量
		foreach ($book_data as $key => $val) {
			$id=$val['b_id'];
			$book_data[$key]['read_num']=count($obj->find("borrow","b_id=$id"));
		}
		//长尾词
		$book_name_data=json_decode(json_encode($obj->find("book","1=1")),true);
		$str='';
		foreach ($book_name_data as $key => $val) {
			$str[$key]['title']=$val['b_title'];
		}
		// $str=json_encode($str,JSON_UNESCAPED_UNICODE);
		//登录的用户
		Session::put("member_id",1);
		$member=Session::get("member_id");
		if(!empty($member)){
			//查询用户的借阅管理
			$m_data=DB::select("SELECT * FROM borrow WHERE m_id=$member");
			$m_data=json_decode(json_encode($m_data),true);
			// print_r($book_data);
			// print_r($m_data);die;
			foreach ($book_data as $key => $val) {
				foreach ($m_data as $kk => $vv) {
					if($val['b_id']==$vv['b_id'])
					{
						$book_data[$key]['type']=$vv['type'];
					}
				}
			}			
		}
		
		// print_r($book_data);die;
		
		return view("home.index",['arr'=>$arr,'book_data'=>$book_data,'member'=>$member,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count,'str'=>$str]);
	}
	//分页
	public function ajaxPage(){
		//条件
		$cate_id=$_GET['cate_id'];
		if(empty($cate_id)){
			$where="1=1";
		}else{
			$where="book.cate_id=$cate_id";
		}
		$obj=new CommonModel();
		//总条数
		$count=count(DB::select("SELECT * FROM `book` INNER JOIN `cate` ON book.cate_id=cate.cate_id WHERE $where ORDER BY book.addtime DESC"));
		//每页显示条数
		$pagesize=6;
		//总页数
		$totalpage=ceil($count/$pagesize);
		//当前页
		$page=$_GET['page'];
		//偏移量
		$offset=($page-1)*$pagesize;		
		//查询搜索分类
		$arr=json_decode(json_encode($obj->find("cate","1=1")),true);
		//查询图书
		$book_data=DB::select("SELECT * FROM `book` INNER JOIN `cate` ON book.cate_id=cate.cate_id WHERE $where ORDER BY book.addtime DESC LIMIT $offset,$pagesize");
		$book_data=json_decode(json_encode($book_data),true);
		//阅读量
		foreach ($book_data as $key => $val) {
			$id=$val['b_id'];
			$book_data[$key]['read_num']=count($obj->find("borrow","b_id=$id"));
		}
		//登录的用户
		Session::put("member_id",1);
		$member=Session::get("member_id");
		if(!empty($member)){
			//查询用户的借阅管理
			$m_data=DB::select("SELECT * FROM borrow WHERE m_id=$member");
			$m_data=json_decode(json_encode($m_data),true);
			// print_r($book_data);
			// print_r($m_data);die;
			foreach ($book_data as $key => $val) {
				foreach ($m_data as $kk => $vv) {
					if($val['b_id']==$vv['b_id'])
					{
						$book_data[$key]['type']=$vv['type'];
					}
				}
			}			
		}
		
		// print_r($book_data);die;
		return view("home.ajaxPage",['arr'=>$arr,'book_data'=>$book_data,'member'=>$member,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
	}
	//点击借书借阅量
	public function addRead(){
		$b_id=$_GET['b_id'];
		$num=$_GET['num'];
		$type=$_GET['type'];
		$m_id=Session::get("member_id");
		$obj=new CommonModel();
		$mm_arr=json_decode(json_encode($obj->find("member","m_id=$m_id")),true);
		if($mm_arr[0]['status']==0){
			echo 3;die;//账号不可用在黑名单中
		}
		else
		{
			if($mm_arr[0]['socre']<100&&$type==0){
				echo 4;die;//请缴纳押金
			}
			if($type==0)
			{	
				$data['m_id']=$m_id;
				$data['b_id']=$b_id;
				$data['addtime']=time();
				$data['type']=0;			
				$m_arr=$obj->find("borrow","m_id=$m_id and type between 0 and 1");
				if(count($m_arr)>=3)
				{	
					echo 2;die;
				}
				else
				{
					//添加借阅量
					$res=$obj->add("borrow",$data);	
					if($res){
						echo 1;die;//成功
					}
				}
							
			}
			elseif($type==1)
			{
				$data['type']=1;
				$res=$obj->up("borrow",$data,"m_id=$m_id and b_id =$b_id and type=0");
				if($res){
					echo 1;die;//成功
				}			
			}			
		}	

		
	}


	public function about(){
		return view("home.about");
	}
	public function article(){
		return view("home.article");
	}
	public function moodList(){
		return view("home.moodList");
	}
	public function comment(){
		return view("home.comment");
	}

}