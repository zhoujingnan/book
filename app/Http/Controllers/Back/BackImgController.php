<?php 
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonControllers;
use DB;
use Illuminate\Support\Facades\Input;
class BackImgController extends CommonController{
	public function index(){
		return view("back.img_index");
	}
}