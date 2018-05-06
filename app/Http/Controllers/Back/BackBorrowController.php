<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Back\CommonController;
use App\Back\BackBorrowModel;
class BackBorrowController extends CommonController{
	public function index(){
		$obj=new BackBorrowModel();
		$arr=json_decode(json_encode($obj->find()))
	}
}