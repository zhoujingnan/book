<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use DB;
use Session;
class HomeMoneyController extends Controller{
	public function add(){
		$arr=$_POST;
		unset($arr['_token']);
		$type=$arr['type'];
		$s_id=$arr['money'];
		$m_id=Session::get("member_id");
		//查询积分表得到要充值的金钱和积分
		$arr=DB::table("socre")->where("s_id",$s_id)->first();
		$s_money=$arr->s_money;
		$s_socre=$arr->s_socre;
		if($type==1){
			$time=time();
			DB::insert("INSERT INTO `pay`(`m_id`,`type`,`money`,`addtime`) VALUES('$m_id',$type,'$s_money','$time')");
			DB::update("UPDATE member SET socre=socre+$s_socre WHERE m_id=$m_id");
			$this->apy($s_money);
		}
	}
	public function re(){
		echo "支付成功";
	}
	//调用支付宝支付接口
	public function apy($s_money)
	{
		$alipay_config['transport']    = 'http';
		$parameter = array(
		    "service" => "create_direct_pay_by_user",
		    "partner" =>'2088121321528708',
		    "seller_email" => 'itbing@sina.cn',
		    "payment_type"	=> '1',
		    "notify_url"	=> "http://www.localhost.com/month13/book/public/homemoney/re",
		    "return_url"	=> "http://www.localhost.com/month13/book/public/homemoney/re",
		    "out_trade_no"	=> time().rand(100000,999999),
		    "subject"	=> "订单",
		    "total_fee"	=> "0.01",
		    "body"	=> "积分支付页面",
		    "show_url"	=> "", 
		    "anti_phishing_key"	=> "",
		    "exter_invoke_ip"	=> "", 
		    "_input_charset"	=> 'utf-8',
		);

		foreach ($parameter as $k => $v) {
		    if (empty($v)) {
		        unset($parameter[$k]);
		    }
		}
		// 参数排序
		ksort($parameter);
		reset($parameter);

		// 拼接获得sign
		$str = "";
		foreach ($parameter as $k => $v) {
		    if (empty($str)) {
		        $str .= $k . "=" . $v;
		    } else {
		        $str .= "&" . $k . "=" . $v;
		    }
		}
		$parameter['sign'] = md5($str .'1cvr0ix35iyy7qbkgs3gwymeiqlgromm');	// 签名
		$parameter['sign_type'] = strtoupper('MD5');
		$str='';
		foreach ($parameter as $key => $val) {
			$str.="$key=$val&";
		}
		$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
		foreach ($parameter as $k => $v) {
		    $sHtml.= "<input type='text' name='" . $k . "' value='" . $v . "'/><br>";
		}

		$sHtml .= '<input type="submit" value="去支付">';
		echo $sHtml;
	}
	//调用银联支付
	public function card($s_money){

	}
}