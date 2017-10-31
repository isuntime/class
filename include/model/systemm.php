<?php
class systemm{
	private $db;
	public function __construct(){
		$this->db = new mysql();
	}
    public function isuser_edit($table,$where,$order_by){
        //echo "\n".$table,$where,$order_by;
        return $this->db->u($table,$where,$order_by);
    }
    public function jurisdiction_insert($table,$colm,$value){
        return $this->db->insert($table,$colm,$value);
    }
    public function jurisdiction_edit($table,$where,$order_by){
//		echo "\n".$table,$where,$order_by;
        return $this->db->u($table,$where,$order_by);
    }
	public function pub_sel($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		//public_select
		return $d;
	}
}
?>