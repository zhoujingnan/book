<?php 
namespace App\Back;
use Illuminate\Database\Eloquent\Model;
use DB;
class CommonModel extends Model{
	public function find($tableName,$where){
		return DB::select("SELECT * FROM `$tableName` WHERE $where");
	}
	public function get($tableName,$where,$offset,$limit){
		return DB::select("SELECT * FROM `$tableName` WHERE $where LIMIT $offset,$limit");
	}
	public function count($tableName,$where){
		$arr=DB::select("SELECT * FROM $tableName WHERE $where");
		return count($arr);
	}
	public function join($tableName1,$tableName2,$join,$where,$offset,$limit,$column){
		return DB::select("SELECT * FROM $tableName1 AS t1 INNER JOIN $tableName2 AS t2 ON $join WHERE $where ORDER BY $column LIMIT $offset,$limit");
	}
}




 ?>