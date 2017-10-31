<?php
class app{
	private $smat;
	function __construct(){
		$this->PB = new pubm();
	}
	public function person_list($worker_id=false){
		if($worker_id){
			$data=$this->PB->pub_sel("userinfo","worker_id='$worker_id' && user_state='1'","id","","DESC");
		}else{
			$data=$this->PB->pub_sel("userinfo","user_state='1'","id","","DESC");
		}
		$d_id=$data[$i]['department_id'];
		$p_id=$data[$i]['position_id'];
		for($i=0;$i<=count($data)-1;$i++){
			$data[$i]=array(
				'id'=>$data[$i]['id'],
				'department'=>$this->P->Appoint_value("department|id='$d_id'|id|1|DESC","department_name"),
				'position'=>$this->P->Appoint_value("position|id='$p_id'|id|1|DESC","position_name"),
				'worker_id'=>$data[$i]['worker_id'],
				'name'=>$data[$i]['name'],
				);
		}
		return $data;
	}
	public function case_type($type_id){
		if($type_id){
			$data=$this->PB->pub_sel("userinfo","id='$type_id' && use_state='1'","id","","DESC");
		}else{
			$data=$this->PB->pub_sel("userinfo","use_state='1'","id","","DESC");
		}
		for($i=0;$i<=count($data)-1;$i++){
			$data[$i]=array(
				'id'=>$data[$i]['id'],
				'name'=>$data[$i]['name'],
				'c_time'=>date("Y-m-d h:i:s",$data[$i]['c_time']),
				'use_state'=>i_is($data[$i]['use_state']),
				);
		}
		return $data;
	}
	//需要处理事件的列表
	public function graduation($action){
		switch($action){
			case '':
				$htmlpath=$this->PB->power("35|36",$this->rule_info,"admin/student/reginfo.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "case_list":
				$htmlpath=$this->PB->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					//根据 用户ID来片段 是否有相关的
					//读取rule的处理者列表
				}
			break;
			case "case_creat":
				$htmlpath=$this->PB->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					
				}
			break;
			case "rule_list":
				$htmlpath=$this->PB->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					
				}
			break;
			case "rule_edit":
				$htmlpath=$this->PB->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					
				}
			break;
			case "rule_show":
				$htmlpath=$this->PB->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					$this->PB->error_info(array('rule_type'=>$this->case_type(),'person'=>$this->person_list()),"ok",true);
				}
			break;
			case "rule_creat":
				$htmlpath=$this->PB->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					$order_id=time();//流程编号
					$person=$this->person_list();//员工列表
					$this->PB->error_info(array(),$msg,true);
				}
			break;
		return false;
		}
	}
	public function dropout(){
		return false;
	}