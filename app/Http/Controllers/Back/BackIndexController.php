<?php 
namespace App\Http\Controllers\back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackIndexModel;
class BackIndexController extends CommonController{
	public function index(){
		return view("back.index");
	}
	public function top(){
		return view("back.top");
	}
	public function bottom(){
		return view("back.bottom");
	}	
	public function left(){
		$obj=new BackIndexModel();
		$arr=json_decode(json_encode($obj->find("column","1=1")),true);
		return view("back.left",['arr'=>$arr]);
	}	
	public function swich(){
		return view("back.swich");
	}	
	public function main(){
		return view("back.main");
	}	
}