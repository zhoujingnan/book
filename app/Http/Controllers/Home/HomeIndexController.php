<?php 
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Redis;
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
		//轮播图图片
		$user_city=$this->getCity();
		$city=$user_city."市";
		$img_data=DB::select("SELECT * FROM img INNER JOIN city ON img.city_id =city.city_id WHERE city.city_name='$city'");
		$imgArr=json_decode(json_encode($img_data),true);
		// $str=json_encode($str,JSON_UNESCAPED_UNICODE);
		//登录的用户
		// Session::put("member_id",1);
		$member=Session::get("member_id");
		// echo $member;
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
		else
		{
			$url=url("home/index");
			echo "请先登录,跳转中...";
			header("Refresh:2,url=$url");die;
		}
		
		// print_r($book_data);die;
		//网站
		$n_data = DB::select("select * from net");
		$n_data = json_decode(json_encode($n_data),true)[0];
		
		return view("home.index",['arr'=>$arr,'book_data'=>$book_data,'member'=>$member,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count,'str'=>$str,'imgArr'=>$imgArr,'n_data'=>$n_data]);
	}
	//买书
	public function a_pay(){
		$member=Session::get("member_id");
		$num = $_GET['num'];
		$b_id = $_GET['b_id'];
		$b_data = DB::select("select * from `book` where b_id=$b_id");
		$b_data = json_decode(json_encode($b_data),true)[0];
		$m_data = DB::select("select * from `member` where m_id=$member");
		$m_data = json_decode(json_encode($m_data),true)[0];
		if($num<=0){
			return 0;die;//已卖完
		}else{
			$socre = $b_data['s_price'];
			if($socre>$m_data['socre'] && $m_data['socre']>0){
				return 3;die;//余额不足
			}
			$time = time();
			// echo $b_id;die;
			$res = DB::insert('insert into `borrow`(m_id,b_id,addtime,type) values(?,?,?,?)',["$member","$b_id","$time","2"]);
			if($res){
				$b_num = $num-1;				
				DB::update("update `book` set num=$b_num where b_id=$b_id");
				DB::update("update `member` set socre=socre-$socre where m_id=$member");
				return 1;die;//成功
			}else{
				return 2;die;//失败
			}
		}
	}
	//倒计时
	public function activeTime(){
		$time = time();
		$a_data = DB::select("select * from `active` where `endtime`>$time");
		$a_data = json_decode(json_encode($a_data),true);
		if(empty($a_data)){
			$arr['success'] = 0;
		}else{
			$arr = $a_data[0];
			if($a_data[0]['starttime']>$time){
				$arr['success'] = 1;//活动未开始
			}else{
				$arr['success'] = 2;//活动开始
			}
		}
		return $arr;
	}
	//参加活动
	public function b_active(){
		$obj=new CommonModel();
		//登录的用户
		// Session::put("member_id",1);
		$member=Session::get("member_id");
		$id = $_GET['id'];
		$data = DB::select("select * from `b_active` as a inner join `book` as b on a.b_id=b.b_id where a.a_id=$id");
		$book_data = json_decode(json_encode($data),true);
		foreach ($book_data as $k => $v) {
			$c_id = $v['cate_id'];
			$c_data = DB::select("select * from cate where cate_id=$c_id");
			$book_data[$k]['cate_name'] = json_decode(json_encode($c_data),true)[0]['cate_name'];
			$b_id=$v['b_id'];
			$book_data[$k]['read_num']=count($obj->find("borrow","b_id=$b_id"));
			$borrow = DB::select("select * from borrow where m_id=$member && b_id=$b_id");
			if(empty($borrow)){
				$book_data[$k]['borrow'] = 0;
			}else{
				$book_data[$k]['borrow'] = 1;
			}
		}
		
		// echo $member;
		
		return view("home.a_book",array('book_data'=>$book_data));
	}
	//活动借书
	public function a_borrow(){
		$obj=new CommonModel();
		$member=Session::get("member_id");
		// echo $member;die;
		$b_id = $_GET['b_id'];
		$num = count($obj->find("borrow","m_id=$member"));
		$b_num = DB::select("select `num` from `book` where b_id=$b_id");
		$b_num = json_decode(json_encode($b_num),true)[0]['num'];
		if($b_num<=0){
			return 4;die;//该书没了
		}else{
			if($num>=3){
				return 0;die;//已借3本
			}else{
				$time = time();
				// echo $b_id;die;
				$res = DB::insert('insert into `borrow`(m_id,b_id,addtime) values(?,?,?)',["$member","$b_id","$time"]);
				if($res){
					$b_num = $b_num-1;
					DB::update("update `book` set num=$b_num where b_id=$b_id");
					return 1;die;//成功
				}else{
					return 2;die;//失败
				}
			}
		}
		
	}
	//分页
	public function ajaxPage(){
		//长尾词书名条件
		$b_title=$_GET['b_title'];
		//分类条件
		$cate_id=$_GET['cate_id'];
		if(empty($cate_id)&&empty($b_title)){
			$where="1=1";
		}else if(!empty($cate_id)&&empty($b_title)){
			$where="book.cate_id=$cate_id";
		}else if(empty($cate_id)&&!empty($b_title)){
			$where="book.b_title like '%$b_title%'";
		}else if(!empty($cate_id)&&!empty($b_title)){
			$where="book.cate_id=$cate_id and book.b_title like '%$b_title%'";
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
		return view("home.ajaxPage",['book_data'=>$book_data,'member'=>$member,'page'=>$page,'totalpage'=>$totalpage,'count'=>$count]);
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
	//获取城市
	public function getCity(){
		$url="http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
		$ch=curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$data=curl_exec($ch);
		$arr=json_decode($data,true);
		return $arr['city'];
	}
	//收藏
	public function collect(){
		$b_id=$_GET['b_id'];
		$obj=new CommonModel();
		$m_id=Session::get("member_id");
		$arr=json_decode(json_encode(DB::select("SELECT * FROM collect WHERE m_id=$m_id AND b_id=$b_id")),true);
		if(!empty($arr)){
			echo 1;die;//已收藏过
		}
		else
		{
			$time=time();
			$sql="INSERT INTO collect(`b_id`,`m_id`,`addtime`) VALUES('$b_id','$m_id','$time')";
			$res=DB::insert($sql);
			if($res){
				echo 2;die;//收藏成功
			}else{
				echo 3;die;//收藏失败
			}
		}
	}
	//阅读记录
	public function readLog(){
		$b_id=$_GET['b_id'];
		$m_id=Session::get("member_id");
		$b_data=json_decode(json_encode(DB::select("SELECT * FROM book WHERE b_id=$b_id")),true);
		$time=time();
		$res=DB::insert("INSERT INTO read_log(`b_id`,`m_id`,`addtime`) values($b_id,$m_id,$time)");
		if($res){
			return view("home.book_detial",['b_data'=>$b_data]);
		}

	}
	//缴纳押金
	public function moneyAdd(){
		$m_id=Session::get("member_id");
		//查询积分表
		$socre_data=json_decode(json_encode(DB::table("socre")->get()),true);
		return view("home.money_add",['m_id'=>$m_id,'socre_data'=>$socre_data]);
	}
	//评论
	public function comment($b_id){
		//用户id
		$m_id=Session::get("member_id");
		//网站信息
		$n_data = DB::select("select * from net");
		$n_data = json_decode(json_encode($n_data),true)[0];
		//图书内容
		$b_data = DB::select("select * from `book` where b_id = $b_id");
		$b_data = json_decode(json_encode($b_data),true)[0];
		//评论内容
		$c_data = DB::select("select * from `comment` as c inner join `member` as m on c.m_id=m.m_id where c.b_id = $b_id order by c.time asc");
		$c_data = json_decode(json_encode($c_data),true);
		foreach ($c_data as $k => $v) {
			static $a = 1;
			$c_data[$k]['num'] = $a++;
			if($m_id==$v['m_id']){
				$c_data[$k]['user'] = 1;
			}else{
				$c_data[$k]['user'] = 0;
			}
		}
		// var_dump($c_data);die;
		return view("home.comment",['b_data'=>$b_data,'c_data'=>$c_data,'n_data'=>$n_data]);
	}
	//提交评论
	public function commentDo(){
		$b_id = $_GET['b_id'];
		$p = $_GET['p'];
		$m_id=Session::get("member_id");
		$time = time();
		$res = DB::insert('insert into `comment`(m_id,b_id,content,time) values(?,?,?,?)',["$m_id","$b_id","$p","$time"]);
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
	//回复
	public function reply(){
		$c_id = $_GET['c_id'];
		$m_id=Session::get("member_id");
		$r_data = DB::select("select * from `reply` as r inner join `member` as m on r.m_id=m.m_id where r.c_id=$c_id order by r.time asc");
		if(empty($r_data)){
			$arr['success'] = 0;
			return $arr;
		}else{
			$arr['success'] = 1;
			$r_data = json_decode(json_encode($r_data),true);
			foreach ($r_data as $k => $v) {
				if($m_id==$v['m_id']){
					$r_data[$k]['user'] = 1;
				}else{
					$r_data[$k]['user'] = 0;
				}
			}
			$arr['data'] = $r_data;
			return $arr;
		}
	}
	//提交回复
	public function replyDo(){
		$c_id = $_GET['c_id'];
		$r_p = $_GET['r_p'];
		$m_id=Session::get("member_id");
		$time = time();
		$res = DB::insert('insert into `reply`(m_id,c_id,content,time) values(?,?,?,?)',["$m_id","$c_id","$r_p","$time"]);
		if($res){
			return 1;
		}else{
			return 0;
		}
	}
	//删除评论
	public function c_del(){
		$c_id = $_GET['c_id'];
		$res = DB::delete("delete from `comment` where c_id =$c_id");
		DB::delete("delete from `reply` where c_id =$c_id");
		if($res){
			return 1;
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
	// public function comment(){
	// 	return view("home.comment");
	// }

}