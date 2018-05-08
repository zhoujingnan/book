<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackActivityModel;
use DB;
/**
*  
*/
class BackActivityController extends CommonController
{
	
	public function add(){
       return view("back.activity_add");
	}
	public function index(){
	   
	}
}
?>