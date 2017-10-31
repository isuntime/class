<?php
class pubm{
	private $db;
	public function __construct(){
		$this->db = new mysql();
	}
	public function pub_sel($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		//public_select
		return $d;
	}
	public function pub_ins($table,$colm,$value){
		if ($this->db->insert($table,$colm,$value)){
			return array('state'=>true);
		}else{
			return array('state'=>false);
		}
	}
	public function pub_edi($table,$where,$order_by){
        if($this->db->u($table,$where,$order_by)){
        	return array('state'=>true);
        }else{
			return array('state'=>false);
		}
    }
   	public function pub_del($table,$where){
        if($this->db->d($table,$where)){
        	return array('state'=>true);
        }else{
			return array('state'=>false);
		}
    }
    public function q($sql){
    	return $this->db->query($sql);
    }
    public function Appoint_value($sql,$coml){
    	$s=explode("|",$sql);
    	$tablename=$s['0'];
    	$where=$s['1'];
    	$order_by=$s['2'];
    	$limit=$s['3'];
    	$DESC=$s['4'];
		$d=$this->pub_sel("$tablename","$where","$order_by","$limit","$DESC");
    	if($d){
			return $d['0'][$coml];
		}
    }
    public function add_student_id($student_id){
    	$student_id=substr($student_id,2);
    	$number="RD".($student_id+1);
    	echo $number;
    }
    public function error_info($data,$msg,$status=False,$json=True){
    	$data=array(
    		'data'=>$data,
			'msg'=>$msg,
			'status'=>$status
		);
		if($json){
			echo json_encode($data);	
		}else{
			return $data;
		}
    }
    public function pageIndex($total,$row=5){
    	$page=(int)(sql_D(if_is($_POST['pageIndex'],$_GET['pageIndex'])));
    	if($page==false){
    		$limit="0,$row";
    	}else{
    		$limit=$page*$row.",".$row;
    	}
    	return array('limit'=>$limit,'total'=>ceil($total/$row),'pageIndex'=>$page);
    }
    public function page_limit($data,$pageAll,$pageIndex=false){
		$this->error_info(
			array('data'=>$data,'pageAll'=>$pageAll,'pageIndex'=>$pageIndex),"OK",1
		);
    }
    public function ac_num($ac_num){
		if($ac_num>=90){
			$result=1;
			$dtime=time();
		}else{
			$result=0;
			$dtime='1';
		}
		return array('res'=>$result,'dtime'=>$dtime);
	}
	public function power($rule_id,$rule_list,$html_path=false){
		if($html_path){
			$html_path=$html_path;
			$error_path="admin/adminerror.html";
		}else{
			$html_path="";
			$error_path="";
		}
		$rule_lists=$rule_list;
		$rule_id=explode("|",$rule_id);
		$rule_list=explode("|",$rule_list);
		//echo $rule_id[0]."\n".$rule_list;
		if(in_array($rule_id['0'],$rule_list)){
			$html_path=$html_path;
			$power=true;
		}elseif(in_array($rule_id['1'],$rule_list)){
			$html_path=$html_path;
			$power=false;
		}else{
			$html_path=$error_path;
			$power=false;
		}
		return array('html_path'=>$html_path,'power'=>$power,'rule_list'=>$rule_lists);
	}
	public function ch_name($str){
		switch ($str){
			case 'subjectOne':
				$data="科目一";
			break;
			case 'subjectTwo':
				$data="科目二";
			break;
			case 'subjectThree':
				$data="科目三";
			break;
			case 'subjectFour':
				$data="科目四";
			break;
			default:
				$data=false;
			break;
		}
		return $data;
	}
	public function voucher_mg(){
		$where="inser_time=''";
		$data=$this->pub_sel("voucher","$where","system_id","1","ASC");
		return $data['0']['c_number'];
	}
	public function voucher_type($str){
		switch ($str) {
			case '1':
				$data=array('name'=>'入学费','id'=>'1','table'=>'payment');
			break;
			case '2':
				$data=array('name'=>'考试费','id'=>'2','table'=>'retestapply');
			break;
			case '3':
				$data=array('name'=>'其他费','id'=>'3','table'=>'1');
			break;
		}
		return $data;
	}
}
?>