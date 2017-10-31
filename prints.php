<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$rule_id=$_SESSION['user']['rule_id'];
		$this->SMT  = new Smarty();
		$this->student = new studentc();
		$this->FM = new format();
		$this->P = new pubm();
		$this->SE = new securityc();
		$this->SMT->debugging=false;
		$this->SMT->caching=false;
		$this->SMT->cache_lifetime=0;
		$this->SMT->template_dir  =ROOR_P.TPL;
		$this->SMT->compile_dir   =ROOR_P."/c/";
		$this->SMT->config_dir    =ROOR_P."/c/c/";
		$this->SMT->cache_dir     =ROOR_P."/c/s/";
		$this->SMT->left_delimiter="{#";
		$this->SMT->right_delimiter="#}";
		$this->table="student_info";
		$this->rule_info=$this->P->Appoint_value("r_c_j_table|rule_id='$rule_id'|id|1|DESC","c_j_id");
	}
	public function action(){
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "prints":
					$this->prints();
			break;
		}
	}
	public function information_list_format($d,$row=false){
		if($row){
			for($i=0;$i<=count($d)-1;$i++){
				$vehicle_type_id=$d[$i]['vehicle_type'];
				$coach_id=$d[$i]['coach_id'];
				$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
				$data[$i]=array(
					'student_id'=>$d[$i]['student_id'],
					'name'=>$d[$i]['name'],
					'reg_time'=>date("Y:m:d",$d[$i]['reg_time']),
					'sex'=>$d[$i]['sex'],
					'nationality'=>$d[$i]['nationality'],
					'certificatetype'=>$d[$i]['certificatetype'],
					'national_id'=>$d[$i]['national_id'],
					'nation'=>$d[$i]['nation'],
					'studentphoto'=>$d[$i]['studentphoto'],
					'postalcode'=>$d[$i]['postalcode'],
					'address'=>$d[$i]['address'],
					'birthday'=>$d[$i]['birthday'],
					'tel'=>$d[$i]['tel'],
					'phone'=>$d[$i]['phone'],
					'email'=>$d[$i]['email'],
					'vehicle_type'=>if_is($this->P->Appoint_value("vehicle_type|id='$vehicle_type_id'|id|1|DESC","vehicle_type_name"),"未选择"),
					'electronic_card'=>$d[$i]['electronic_card'],
					'coach_id'=>if_is($d[$i]['coach_id'],"未选择"),
					'coach_name'=>if_is($this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),"未选择"),
					'reg_time'=>date("Y-m-d",$d[$i]['reg_time']),
					'subjectOneState'=>i_is($d[$i]['subjectOneState']),
					'subjectOneAdoptTime'=>date("Y-m-d",$d[$i]['subjectOneAdoptTime']),
					'subjectTwoState'=>i_is($d[$i]['subjectTwoState']),
					'subjectTwoAdoptTime'=>date("Y-m-d",$d[$i]['subjectTwoAdoptTime']),
					'subjectThreeState'=>i_is($d[$i]['subjectThreeState']),
					'subjectThreeAdoptTime'=>date("Y-m-d",$d[$i]['subjectFourState']),
					'subjectFourState'=>i_is($d[$i]['subjectFourState']),
					'subjectFourAdoptTime'=>date("Y-m-d",$d[$i]['subjectFourAdoptTime']),
					'studystate'=>$d[$i]['studystate'],
					'retest_num'=>$d[$i]['retest_num'],
					'isvip'=>$d[$i]['isvip']
				);
			}
		}else{
				$vehicle_type_id=$d['0']['vehicle_type'];
				$coach_id=$d['0']['coach_id'];
				$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
				$data=array(
					'student_id'=>$d['0']['student_id'],
					'name'=>$d['0']['name'],
					'reg_time'=>date("Y:m:d",$d['0']['reg_time']),
					'sex'=>$d['0']['sex'],
					'nationality'=>$d['0']['nationality'],
					'certificatetype'=>$d['0']['certificatetype'],
					'national_id'=>$d['0']['national_id'],
					'nation'=>$d['0']['nation'],
					'studentphoto'=>$d['0']['studentphoto'],
					'postalcode'=>$d['0']['postalcode'],
					'address'=>$d['0']['address'],
					'birthday'=>$d['0']['birthday'],
					'tel'=>$d['0']['tel'],
					'phone'=>$d['0']['phone'],
					'email'=>$d['0']['email'],
					'vehicle_type'=>if_is($this->P->Appoint_value("vehicle_type|id='$vehicle_type_id'|id|1|DESC","vehicle_type_name"),"未选择"),
					'electronic_card'=>$d['0']['electronic_card'],
					'coach_id'=>if_is($d['0']['coach_id'],"未选择"),
					'coach_name'=>if_is($this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),"未选择"),
					'reg_time'=>date("Y-m-d",$d['0']['reg_time']),
					'subjectOneState'=>i_is($d['0']['subjectOneState']),
					'subjectOneAdoptTime'=>date("Y-m-d",$d['0']['subjectOneAdoptTime']),
					'subjectTwoState'=>i_is($d['0']['subjectTwoState']),
					'subjectTwoAdoptTime'=>date("Y-m-d",$d['0']['subjectTwoAdoptTime']),
					'subjectThreeState'=>i_is($d['0']['subjectThreeState']),
					'subjectThreeAdoptTime'=>date("Y-m-d",$d['0']['subjectFourState']),
					'subjectFourState'=>i_is($d['0']['subjectFourState']),
					'subjectFourAdoptTime'=>date("Y-m-d",$d['0']['subjectFourAdoptTime']),
					'studystate'=>$d['0']['studystate'],
					'retest_num'=>$d['0']['retest_num'],
					'isvip'=>$d['0']['isvip']
				);
		}
		return $data;
	}
	public function prints(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case "hongtongprint":
			$student_id=sql_D(if_is($_GET['student_id'],$_POST['student_id']));
			if(isset($student_id)){
				$where="student_id='$student_id'";
				$d=$this->P->pub_sel($this->table,"$where","id","","DESC");
				//dump($this->information_list_format($d));
				$this->SMT->assign("content",$this->information_list_format($d),true);
				$this->SMT->display('admin/student/hetongprint.html');
				//return $this->SMT();
			}
			break;
		}
	}
}
$app = new app(); 
$app->action();
?>