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
	public function del($tableName,$where){
		return DB::delete("DELETE FROM $tableName WHERE $where");
	}
	public function piDel($tableName,$where){
		return DB::delete("DELETE FROM $tableName WHERE $where");
	}
	public function add($tableName,$arr){
		$k='';
		$v='';
		foreach ($arr as $key => $val) {
			$k.="`$key`,";
			$v.="'$val',";
		}
		$k=rtrim($k,',');
		$v=rtrim($v,",");
		return DB::insert("INSERT INTO `$tableName`($k) VALUES($v)");
	}
	public function up($tableName,$arr,$where){
		$str='';
		foreach ($arr as $key => $val) {
			$str.="`$key`='$val',";
		}
		$str=rtrim($str,',');
		return DB::update("UPDATE $tableName SET $str WHERE $where");
	}
}




 ?>