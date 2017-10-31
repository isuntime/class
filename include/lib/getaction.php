<?php
class getaction{
	private $action;
	function __construct() {
		$this->action = sql_D(if_is($_GET[action],$_POST[action]));
	}
	function findaction($action=false){
		if($action==false){
			$data=sql_D(if_is($_GET[action],$_POST[action]));
		}else{
			$data=$action;
		}
		return $data;
	}
}
?>