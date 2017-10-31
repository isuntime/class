<?php
class menum{
	private $db;
	public function __construct(){
		$this->db = new mysql();
		$this->l_table="menu";
	}
	public function li($where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($this->l_table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'name'=>$d[$i]['name'],
				'english'=>$d[$i]['english'],
				'random_id'=>$d[$i]['random_id'],
				'link_file'=>$d[$i]['link_file'],
				'content'=>$d[$i]['div_disp'],
			);
		}
		return $data;
	}
	public function ma($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($this->l_table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'name'=>$d[$i]['new_class_name'],
				'english'=>$d[$i]['english'],
				'random_id'=>$d[$i]['random_id'],
				'link_file'=>$d[$i]['link_file'],
				'content'=>$d[$i]['div_disp'],
				'state'=>$d[$i]['state'],
				'ppid'=>$d[$i]['ppid'],
			);
		}
		return $data;
	}
	public function up($column,$where,$url){
		$d=$this->db->up($this->l_table,$column,$where,$url);
		return $d;
	}
	public function de($column,$url){
		$d=$this->db->d($this->l_table,$column,$url);
		return $d;
	}
	public function in($column,$value){
		$d=$this->db->insert($this->l_table,$column,$value,$url);
	}
}