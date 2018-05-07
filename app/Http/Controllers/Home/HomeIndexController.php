<?php 
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use DB;
use App\Back\CommonModel;
use Session;
class HomeIndexController extends Controller{
	public function index(){
		$obj=new CommonModel();
		//查询搜索分类
		$arr=json_decode(json_encode($obj->find("cate","1=1")),true);
		//查询图书
		$book_data=DB::select("SELECT * FROM `book` INNER JOIN `cate` ON book.cate_id=cate.cate_id ORDER BY book.addtime DESC");
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
		return view("home.index",['arr'=>$arr,'book_data'=>$book_data,'member'=>$member]);
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