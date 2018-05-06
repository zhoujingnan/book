<?php 
namespace App\Back;
use App\Back\CommonModel;
use DB;
class BackMemberModel extends CommonModel{
	public function getWhere($tableName,$where,$offset,$limit,$column){
		return DB::select("SELECT * FROM `$tableName` WHERE $where ORDER BY $column LIMIT $offset,$limit");
	}
}