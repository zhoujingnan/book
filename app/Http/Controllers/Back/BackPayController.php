<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackIndexModel;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
class BackPayController extends CommonController{
	public function index(){
		$input = Input::get();
		var_dump($input);
		$page = isset($input['page']) ? $input['page'] : 1;
		echo $page;
		$data = DB::select("select * from `pay` limit 0,5");
		$data = json_decode(json_encode($data),true);
		foreach ($data as $k => $v) {
			$m_id = $v['m_id'];
			$m_data = DB::select("select * from `member` where m_id=$m_id");
			$m_data = json_decode(json_encode($m_data),true)[0];
			$data[$k]['m_name'] = $m_data['m_name'];
		}
		// var_dump($data);die;
		return view("back.pay_index",array('arr'=>$data));
	}
		
}