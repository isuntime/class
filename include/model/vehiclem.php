<?php
class vehiclem{
	private $db;
	public function __construct(){
		$this->db = new mysql();
	}
	public function pub_sel($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		//public_select
		return $d;
	}
}
?>