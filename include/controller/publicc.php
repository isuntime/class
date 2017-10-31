<?php
class publicc{
	private $PM;
	function __construct() {
		$this->PM = new publicm();
	}
	public function department(){
		return $this->PM->department("department");
	}
	public function position(){
        $d=if_is($_POST['where'],$_GET['where']);
        if($d) {
            foreach ($d as $k => $v) {
                if($v!='') {
                    $where = $k . "='" . $v . "'";
                    $wheres .= $where . " & ";
                    $order_by = $k;
                }
            }
            $wheres=substr($wheres,0,-3);
        }
		if($wheres){
			$data=$this->PM->position("position",$wheres);
		}else{
			$data=$this->PM->position("position");
		}
		return $data;
	}
	public function rule(){
		return $this->PM->rule("rule");
	}
    public function userinfo(){
		$d=if_is($_POST['where'],$_GET['where']);
        if($d) {
            foreach ($d as $k => $v) {
                if($v!='') {
                    $where = $k . "='" . $v . "'";
                    $wheres .= $where . " & ";
                    $order_by = $k;
                }
            }
            $wheres=substr($wheres,0,-3);
        }
		if($wheres){
			$data=$this->PM->userinfo("userinfo",$wheres);
		}else{
			$data=$this->PM->userinfo("userinfo");
		}
        return $data;
    }
	public function public_select($table){
		$d=if_is($_POST['where'],$_GET['where']);
		if($d['id']){
			foreach($d as $k=>$v){
    			$where=$k."='".$v."'";
    			$order_by=$k;
			}
			return $this->PM->public_select($table,$where,$order_by);
		}else{
			return $this->PM->public_select($table);
		}
	}
    public function public_array_select($table,$where,$order_by){
		//echo $where;
        $where=sql_D($where);
        $order_by=sql_D($order_by);
        return $this->PM->public_select($table, $where, $order_by);
    }
}
?>
