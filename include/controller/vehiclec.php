<?php
class vehiclec{
	private $PM;
	function __construct(){
		$this->PM = new vehiclem();
	}
	public function vehicle($action,$data=false){
		switch($action){
			case "find";
				$where=pub_pgw($data);
				$data=$this->PM->pub_sel("student_info",$where,"id","","DESC");
					
			break;
			case "list";
				$data=$this->PM->pub_sel("carinfo","","id","","DESC");
			break;
			default:
				$data=null;
			break;
		}
		if($data){
			return $data;
		}
	}
}
//jectopj
//sub keumu
?>