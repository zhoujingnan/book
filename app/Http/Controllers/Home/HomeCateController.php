<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
class HomeCateController extends Controller{
	public function index($cate_id){
		echo $cate_id;
	}
}