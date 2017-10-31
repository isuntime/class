<?php
class menuc{
	private $m;
	function __construct(){
		$this->m=new menum();
	}
	public function lists(){
		$d=$this->m->li("state_s='on'","ppid","","ASC");
		return $d;
	}
}
?>