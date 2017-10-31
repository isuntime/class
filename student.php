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
		$this->SE->login();
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "regstudent":
				$this->regstudent();
			break;
			case "vehicletype":
				$this->vehicletype();
			break;
			case "timewarning":
				$this->timewarning();
			break;
			case "dropout":
				$this->dropout();
			break;
			case "Achievementmanagement":
				$this->Achievementmanagement();
			break;
			case "retest":
				$this->retest();
			break;
			case "reginfo":
				$this->reginfo();
			break;
			case "recoach":
				$this->recoach();
			break;
			case "distributecar":
				$this->distributecar();
			break;
			case "assumpsitcar":
				$this->assumpsitcar();
			break;
			case "graduation":
				$this->graduation();
			break;
			case "feedback":
				$this->feedback();
			break;
			case "information":
				$this->information();
			break;
			case "resultInput":
				$this->resultInput();
			break;
			case "prints":
				$this->prints();
			break;
		}
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
				return $this->SMT();
			}
			break;
		}
	}
	public function reginfo(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("35|36",$this->rule_info,"admin/student/reginfo.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("35|36",$this->rule_info);
				if($htmlpath['power']==true){
					$national_id=sql_D($_POST['data']['national_id']);
					$d=$this->P->pub_sel($this->table,"national_id='$national_id'","id","1","DESC");
					if($d){
						$state=i_is($d['0']['studystate']);
						if($state){
							$d=pub_pga('data');
							$data=$this->P->pub_ins($this->table,$d['colm'],$d['value']);
							$msg="注意此用户属于再次报名考试！注册成功!";
							$code=1;
						}else{
							$msg="系统不允许在本考生未结业的情况下重复注册考生账户";
							$code=0;
							$data="";
						}
					}else{
						$d=pub_pga('data');
						$data=$this->P->pub_ins($this->table,$d['colm'],$d['value']);
						$msg="用户注册成功。";
						$code=1;
					}
				}else{
					$msg="错误:无操作权限!";
					$code=0;
					$data="";
				}
				$this->P->error_info($data,$msg,$code);
			break;
		}
	}
	//学员注册
	public function regstudent(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/student/regstudent.html');
				$this->SMT->assign("user",$_SESSION['user'],true);
				return $this->SMT();
			break;
			case 'insert':
				$data=pub_pgi('data');
				if($data) $this->P->pub_ins($this->table,$data['colm'],$data['value']);
			break;

		}
	}
	//准驾类型
	public function vehicletype_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'student_id'=>$d[$i]['student_id'],
				'old_vehicle'=>$d[$i]['old_vehicle'],
				'now_vehicle'=>$d[$i]['now_vehicle'],
				'old_pay_total'=>$d[$i]['old_pay_total'],
				'new_pay_total'=>$d[$i]['new_pay_total'],
				'pay_state'=>$d[$i]['pay_state'],
				'c_time'=>date("Y-m-d",$d[$i]['c_time']),
				'p_time'=>$d[$i]['p_time'],
				'creat_ather'=>$d[$i]['creat_ather'],
				'student_name'=>$this->P->Appoint_value("student_info|student_id='{$d[$i]['student_id']}'|id|1|DESC","name"),
				'national_id'=>$this->P->Appoint_value("student_info|student_id='{$d[$i]['student_id']}'|id|1|DESC","national_id"),
			);
		}
		return $data;
	}
	public function vehicletype(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("39|40",$this->rule_info,"admin/student/vehicletype.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "note":
				$info=$_POST['data'];
				$where="student_id='{$info['student_id']}'";
				$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
				$p=$this->P->pub_sel('payment',$where,"id","1","DESC");
				if($info['new_vehicle_type']==$d['0']['vehicle_type']){
					$msg="error ! 请选择正确的需要变更的准驾类型";
					$this->P->error_info('',$msg,0);
				}else{
					$n=$this->P->pub_sel('vehicle_type',"id='{$info['new_vehicle_type']}'","id","1","DESC");
					$id=$n['0']['0'];
					$s=array(
						'n_type_name'=>$this->P->Appoint_value("vehicle_type|id='$id'|id|1|DESC","vehicle_type_name"),
						'ac_num'=>'',
					);
					$this->P->error_info(array_merge($this->FM->payment_format($p),$this->information_list_format($d),$this->FM->p_format($n),$s),$msg,1);
				}
			break;
			case "change_type":
				$d=$_POST['data'];
				$data=$this->P->pub_sel("vehicle_type_log","student_id='{$d['student_id']}' and pay_state='0'","system_id","","DESC");
				if($data){
					$this->P->error_info("","该学员之前申请的车架变更尚未到财务处支付相关费用，事情完成支付后重新申请！",0);
				}else{
					$student_id=$d['student_id'];
					$old_vehicle=$d['vehicle_type'];
					$now_vehicle=$d['n_type_name'];
					$old_pay_total=$d['total'];
					$new_pay_total=$d['n_total'];
					$pay_state='0';
					$c_time=time();
					$p_time='';
					$creat_ather=time();
					$coum="student_id,old_vehicle,now_vehicle,old_pay_total,new_pay_total,pay_state,c_time,p_time,creat_ather";
					$value="'$student_id','$old_vehicle','$now_vehicle','$old_pay_total','$new_pay_total','$pay_state','$c_time','$p_time','$creat_ather'";
					$sql=$this->P->pub_ins("vehicle_type_log","$coum","$value");
					$this->P->error_info("","申请完成，请到财务处支付相关费用！",$sql['state']);
				}
			break;
			case "insert":
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
			break;
			case 'check':
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
				if($d){
					$coach_id=$d['0']['coach_id'];
					$where="coach_id='$coach_id'";
					$vti=$d['0']['vehicle_type'];
					$data=array(
						'name'=>$d['0']['name'],
						'national_id'=>$d['0']['national_id'],
						'student_id'=>$d['0']['student_id'],
						'vehicle_type'=>$this->P->Appoint_value("vehicle_type|id='$vti'|id|1|DESC","vehicle_type_name"),
						'vehicle_type_id'=>$vti
					);
					$msg='数据查询成功';
					$code=1;
				}else{
					$msg='数据查询失败';$code=0;
				}
				$this->P->error_info($data,$msg,$code);
			break;
			case "list":			
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("vehicle_type_log","$where","system_id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("vehicle_type_log","$where","system_id","$limit","DESC");
				$this->P->page_limit($this->vehicletype_format($d),$PI['total'],$PI['pageIndex']);
			break;
		}
	}
	//学员信息 列表
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
	public function information(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("37|38",$this->rule_info,"admin/student/information.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				//$this->SMT->display("admin/student/information.html");
				return $this->SMT();
			break;
			case "edit":
				$htmlpath=$this->P->power("37|38",$this->rule_info);
				$where=pub_pgw('where');
				if($where && $htmlpath['power']){
					$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
					if($d){
						$name=sql_D($_POST['data']['name']);
						$reg_time=sql_D($_POST['data']['reg_time']);
						$sex=sql_D($_POST['data']['sex']);
						$nationality=sql_D($_POST['data']['nationality']);
						$certificatetype=sql_D($_POST['data']['certificatetype']);
						$national_id=sql_D($_POST['data']['national_id']);
						$postalcode=sql_D($_POST['data']['postalcode']);
						$address=sql_D($_POST['data']['address']);
						$birthday=sql_D($_POST['data']['birthday']);
						$tel=sql_D($_POST['data']['tel']);
						$phone=sql_D($_POST['data']['phone']);
						$email=sql_D($_POST['data']['email']);
						$colm="name='$name',reg_time='$reg_time',sex='$sex',nationality='$nationality',
							certificatetype='$certificatetype',national_id='$national_id',postalcode='$postalcode',
							address='$address',birthday='$birthday',tel='$tel',phone='$phone',email='$email'";
						$up=$this->P->pub_edi($this->table,"$colm","$where");
						if($up['state']="true"){
							$data="";$msg="用户数据修改成功";$code=true;
						}else{
							$data="";$msg="用户数据修改失败";$code=false;
						}
					}else{
						$data="";$msg="数据查询失败";$code=false;
					}	
				}else{
					$data="";$msg="错误:空值传递或此账户无修改权限";$code=false;
				}
				echo json_encode(array('data'=>$data,'code'=>$code,'msg'=>$msg));
			break;
			case "find":
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
				$this->P->page_limit($this->information_list_format($d,true),$PI['total'],$PI['pageIndex']);
			break;
			case 'list':
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
				$this->P->page_limit($this->information_list_format($d,1),$PI['total'],$PI['pageIndex']);
			break;
		}
	}
	//成绩管理
	public function subject_student_state($student_id,$state,$subjectType){
		$d=$this->P->pub_sel("student_achievement","student_id='$student_id' && subjectType='$subjectType'","id","1","DESC");
		if($d){
			$result['point']=$d['0']['ac_num'];
			if($result['point']>=90){
				$result['state']="合格";
			}else{
				$result['state']="不合格";
			}
		}else{
			$result['point']=0;
			$result['state']="不合格";
		}
		return $result;
	}
	public function Achievementmanagement_list_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$vehicle_type_id=$d[$i]['vehicle_type'];
			$data[$i]=array(
				'name'=>$d[$i]['name'],
				'id'=>$d[$i]['id'],
				'student_id'=>$d[$i]['student_id'],
				'national_id'=>$d[$i]['national_id'],
				'vehicle_type'=>if_is($this->P->Appoint_value("vehicle_type|id='$vehicle_type_id'|id|1|DESC","vehicle_type_name"),"未选择"),
				'subjectone_ac_num'=>$this->subject_student_state($d[$i]['student_id'],i_is($d[$i]['subjectOneState']),"subjectOne"),
				'subjectOneAdoptTime'=>date("Y-m-d",$d[$i]['subjectOneAdoptTime']),
				'subjectwo_ac_num'=>$this->subject_student_state($d[$i]['student_id'],i_is($d[$i]['subjectTwoState']),"subjectTwo"),
				'subjectTwoAdoptTime'=>date("Y-m-d",$d[$i]['subjectTwoAdoptTime']),
				'subjecthree_ac_num'=>$this->subject_student_state($d[$i]['student_id'],i_is($d[$i]['subjectThreeState']),"subjectThree"),
				'subjectThreeAdoptTime'=>date("Y-m-d",$d[$i]['subjectThreeAdoptTime']),
				'subjecfour_ac_num'=>$this->subject_student_state($d[$i]['student_id'],i_is($d[$i]['subjectFourState']),"subjectFour"),
				'subjectFourAdoptTime'=>date("Y-m-d",$d[$i]['subjectFourAdoptTime'])
			);
		}
		return $data;
	}
	public function Achievementmanagement(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("39|40",$this->rule_info,"admin/student/Achievementmanagement.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "list":
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
				$this->P->page_limit($this->Achievementmanagement_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
			case "find":
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
				$this->P->page_limit($this->Achievementmanagement_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
			case "edit":
				$htmlpath=$this->P->power("39|40",$this->rule_info);
				$student_id=sql_D($_POST['where']['student_id']);
				$order_id=sql_D($_POST['data']['order_id']);
				$subject_name=sql_D($_POST['data']['subject_name']);
				if($student_id==null){
					$this->P->error_info("","错误！学号错误",0);
				}elseif($order_id==''){
					$this->P->error_info("","错误！订单号错误，错误原因，应该是未申请考试",0);
				}elseif($htmlpath['power']==false){
					$this->P->error_info("","错误！权限错误",0);
				}elseif($subject_name==null){
					$this->P->error_info("","错误！考试科目程序不能获取到，错误原因，应该是未申请考试",0);
				}else{
					$sql_s="student_id='$student_id' && subjecttype_name='$subject_name' && order_id='$order_id'";
					$serach=$this->P->pub_sel("retestapply","$sql_s","id","1","DESC");
					if($serach['0']['pay_state']==0){
						$this->P->error_info("","错误！请到财务处支付考试费用后再申请录入成绩！",0);
					}elseif($serach['0']['rec_state']==1){
						$this->P->error_info("","错误！请不要重复录入成绩",0);
					}else{
						$subject_AdoptTime=sql_D($_POST['data']['subject_name'])."AdoptTime";
						$subject_State=sql_D($_POST['data']['subject_name'])."State";
						$sw="student_id='$student_id'";
						$ac_nums=$this->P->ac_num(sql_D($_POST['data']['ac_num']));
						$ac_num_res=$ac_nums['res'];
						$ac_dtime=$ac_nums['dtime'];
						$colm="$subject_State='$ac_num_res',$subject_AdoptTime='$ac_dtime'";
						$up=$this->P->pub_edi($this->table,"$colm","$sw");
						if($up['state']=='true'){
							$colm="rand_id,student_id,subjectType,test_time,ac_num,adopt_time,ac_state,order_id";
							$rand_id=worker_id('2');
							$test_time=$r['0']['testtime'];
							$ac_num=sql_D($_POST['data']['ac_num']);
							$value="'$rand_id','$student_id','$subject_name','$test_time','$ac_num','$ac_dtime','$ac_num_res','$order_id'";
							$in=$this->P->pub_ins('student_achievement',$colm,$value);
							if($in['state']=='true'){
								$change=$this->P->pub_edi("retestapply","rec_state='1'","order_id='$order_id'");
								if($change['state']=='true'){
									$where=pub_pgw('where');
									$msg=$this->student->graduationdata($this->P->pub_sel($this->table,"$where","id","","DESC"));
									$this->P->error_info("","ok{$msg}",1);

								}else{
									$this->P->error_info("","no",0);
								}
							}else{
								$this->P->error_info("","错误，数据不能更新，可能是网络延迟引起的故障！",0);
							}
						}else{
							$this->P->error_info("","错误，你尚未申请考试",0);
						}
					}
				}
			break;
			case "check":
				$where=pub_pgw('where');
				if($where){
					$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
					$name=$d['0']['name'];
					$student_id=$d['0']['student_id'];
					if(i_is($d['0']['subjectOneState'])!=true){
						$cs=$this->student->check_subject($student_id,"subjectOne");
					}elseif(i_is($d['0']['subjectTwoState'])!=true){
						$cs=$this->student->check_subject($student_id,"subjectTwo");
					}elseif(i_is($d['0']['subjectThreeState'])!=true){
						$cs=$this->student->check_subject($student_id,"subjectThree");
					}elseif(i_is($d['0']['subjectFourState'])!=true){
						$cs=$this->student->check_subject($student_id,"subjectFour");
					}else{
						$subject_name='';
						$state='error';
						$msg='student_id error !';
					}
					if($name==false){
						$msg="没有该学员信息，请核实";
					}else{
						$msg=$cs['msg'];
					}
				}
				$data=array(
					'data'=>array(
						'name'=>$name,
						'national_id'=>$d['0']['national_id'],
						'student_id'=>$student_id,
						'subject_name'=>$cs['name'],
						'ch_name'=>$cs['ch_name'],
						'record'=>$cs['record'],
						'total'=>$cs['total'],
						'order_id'=>$cs['order_id'],
						),
					);
				$this->P->error_info($data,$msg,$cs['state']);
			break;
		}
	}
	//考试申请模块
	public function retest(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("39|40",$this->rule_info,"admin/student/retest.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("39|40",$this->rule_info);
				if($htmlpath['power']){
					$where=pub_pgw('where');
					$check=$this->P->pub_sel($this->table,$where,"id","1","DESC");
					$student_id=$_POST['where']['student_id'];
					$state=$this->student->ch_name($this->P->Appoint_value("retestapply|student_id='$student_id' && pay_state='0' |id|1|DESC","subjecttype_name"));
					if($state!=false){
						$msg="该学员尚未支付 ".$state." 考试费用！";
						$this->P->error_info("",$msg,0);
					}else{
						if($check){
							$d=pub_pgi('data');
							$d=$this->P->pub_ins('retestapply',$d['colm'],$d['value']);
							if($d){
								$this->P->error_info("","考试申请成功",true);
							}
						}else{
							$this->P->error_info("","错误:请核对学号是否正确,请勿空值传递!");
						}
					}
				}else{
					$this->P->error_info("","错误:操作无权限");
				}
			break;
			case "check":
				$where=pub_pgw('where');
				$national_id=$_POST['where']['national_id'];
				if($national_id!=false){
					$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
					$info=$this->student->check_student_id($d);
					if($d){
						$data=array(
							'student_id'=>$d['0']['student_id'],
							'name'=>$d['0']['name'],
							'national_id'=>$d['0']['national_id'],
							'subject'=>$info['subject'],
							'code'=>$info['code'],
							'msg'=>$info['msg']
						);
					}else{
						$data=$this->FM->retest();
					}
				}else{
					$data=$this->FM->retest();
				}
				$this->P->error_info($data,$data['msg'],$data['code']);
			break;
			case "testlog":
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->table,"$where","id","1","DESC");
				if($d){
					$subjectOne=$this->student->retestapp($d['0']['student_id'],'subjectOne');
					$subjectTwo=$this->student->retestapp($d['0']['student_id'],'subjectTwo');
					$subjectThree=$this->student->retestapp($d['0']['student_id'],'subjectThree');
					$subjectFour=$this->student->retestapp($d['0']['student_id'],'subjectFour');
					$data=array_merge($subjectFour,$subjectThree,$subjectTwo,$subjectOne);
					$this->P->error_info($data,"ok",1);
				}else{
					$this->P->error_info($data,"error!",0);
				}
			break;
		}
	}
	//学员预警 模块
	public function timewarning_list_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			//获取时间戳
			$regtime=$d[$i]['reg_time'];
			//计算出科目一预警时间戳
			// 三年94608000秒
			//7776000 90天
			//86400 一天
			// 算法有问题 
			$one_end_time=$regtime+7776000;
			// 判断 剩余天数
			if($one_end_time>=time()){
				// 说明还没过期
				$rtime=$one_end_time-time();
				$rtime=ceil($rtime/86400);
			}else{
				// 如果过期 那就就应该是负数
				$rtime="0";
			}
			//全局过期时间
			$deadline=$regtime+94608000;
			if($deadline>=time()){
				$dead_days=$deadline-time();
				$dead_days=ceil($deadline/86400);
			}else{
				$dead_days='0';
			}
			$coach_id=$d[$i]['coach_id'];
			$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
			//if(){}
			$data[$i]=array(
				'id'=>$d[$i]['id'],
				'student_id'=>$d[$i]['student_id'],
				'national_id'=>$d[$i]['national_id'],
				'name'=>$d[$i]['name'],
				'phone'=>$d[$i]['phone'],
				'coach_id'=>$coach_id,
				//'coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),
				'coach_name'=>if_is($this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),"未选择"),
				'isvip'=>$d[$i]['isvip'],
				'email'=>$d[$i]['email'],
				'studystate'=>$d[$i]['studystate'],
				'address'=>$d[$i]['address'],
				'reg_time'=>date("Y-m-d",$regtime),
				'deadline'=>date("Y-m-d",$deadline),
				'dead_days'=>$dead_days,
				'subjectOneState'=>$d[$i]['subjectOneState'],
				'subjectTwoState'=>$d[$i]['subjectTwoState'],
				'subjectThreeState'=>$d[$i]['subjectThreeState'],
				'subjectFourState'=>$d[$i]['subjectFourState'],
				'subject_one_end_time'=>date("Y-m-d",$one_end_time),
				'subject_one_end_days'=>$rtime,
				);
		}
		return $data;
	}
	public function timewarning(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("45|46",$this->rule_info,"admin/student/timewarning.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "edit":
				$d=pub_pgi('data');
				$data=$this->P->pub_ins('retestapply',$d['colm'],$d['value']);
				echo json_encode($data);
			break;
			case 'list':
				//$where=pub_pgw('where');
				$where="subjectOneState !='1' OR subjectTwoState !=1 OR subjectThreeState !=1 OR subjectFourState !=1";
				$total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
				//print_r($d);
				$this->P->page_limit($this->timewarning_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
		}
	}
	//教练更换 车俩变更
	public function recoach(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("47|48",$this->rule_info,"admin/student/recoach.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case 'check':
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->table,$where,"id","1","DESC");
				if($d){
					$coach=$this->student->change_coach($d['0']['coach_id'],$d['0']['vehicle_type']);
					$coach_id=$d['0']['coach_id'];
					$where="coach_id='$coach_id'";
					$ci=$this->P->pub_sel('carinfo',"$where","coach_id","","DESC");
					for($i=0;$i<=count($ci)-1;$i++){
						$car_list[$i]=array(
							'car_id'=>$ci[$i]['id'],
							'plate_number'=>$ci[$i]['plate_number'],
						);
					}
					$data=array(
						'name'=>$d['0']['name'],
						'national_id'=>$d['0']['national_id'],
						'subjectType_name'=>$this->student->this_subject($d),
						'student_id'=>$d['0']['student_id'],
						'coach_id'=>$coach['coach_id'],
						'car_id'=>$d['0']['car_id'],
						'remake'=>'',
					);
					$coachs=$coach['data'];
					$msg='数据查询成功';
					$code=1;
				}else{
					$msg='数据查询失败';$code=false;
				}
				$data=array(
					//'msg'=>$msg,
					'data'=>$data,
					'coach'=>$coachs,
					//'code'=>$code,
					'carinfo'=>$car_list,
				);
				$this->P->error_info($data,$msg,$code);
			break;
			case "carinfo":
				$where=pub_pgw('where');
				$d=$this->P->pub_sel('carinfo',"$where","coach_id","","DESC");
				if($d){
					for($i=0;$i<=count($d)-1;$i++){
						$data[$i]=array(
							'car_id'=>$d[$i]['id'],
							'plate_number'=>$d[$i]['plate_number'],
						);
					}
					$msg="ok";
					$code=true;
				}else{
					$data=array('car_id'=>'','plate_number'=>'');
					$msg="查询失败";
					$code=false;
				}
				$this->P->error_info($data,$msg,$code);
			break;
			case "list":
				$d=$this->P->pub_sel('student_assingcar',"effective='0'","id","","DESC");
				if($d){
					for($i=0;$i<=count($d)-1;$i++){
						$student_id=$d[$i]['student_id'];
						$coach_id=$d[$i]['coach_id'];
						$car_id=$d[$i]['car_id'];
						$assing_car_id=$d[$i]['assing_car_id'];
						$assing_coach_id=$d[$i]['assing_coach'];
						$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
						$worker_idd=$this->P->Appoint_value("coach|id='$assing_coach_id'|id|1|DESC","worker_id");
						$data[$i]=array(
							'car_id'=>$car_id,
							'car_number'=>$this->P->Appoint_value("carinfo|id='$car_id'|id|1|DESC","plate_number"),
							'coach_id'=>$coach_id,
							'coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),
							'user_id'=>$d[$i]['user_id'],
							'student_id'=>$student_id,
							'student_name'=>$this->P->Appoint_value("student_info|student_id='$student_id'|id|1|DESC","name"),
							'subjectType'=>$d[$i]['subjectType'],
							'rec_time'=>date("Y-m-d h-i-s",$d[$i]['rec_time']),
							'assing_subjectType'=>$d[$i]['assing_subjectType'],
							'assing_time'=>date("Y-m-d h-i-s",$d[$i]['assing_time']),
							'order_id'=>$d[$i]['assing_time'],
							'assing_coach_id'=>$assing_coach_id,
							'assing_coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_idd'|id|1|DESC","name"),
							'assing_car_id'=>$assing_car_id,
							'assing_car_number'=>$this->P->Appoint_value("carinfo|id='$assing_car_id'|id|1|DESC","plate_number"),
							'assing_user_id'=>$_SESSION['user']['id'],
							'effective'=>i_is($d[$i]['assing_time']),
							'remake'=>$d[$i]['remake']
						);
					}
					$this->P->error_info($data,"ok",true);
				}else{$this->P->error_info($data,"查询失败");}
			break;
			case "setState":
				$htmlpath=$this->P->power("47|48",$this->rule_info);
				if($htmlpath['power']){
					$student_id=sql_D($_POST['where']['student_id']);
					$state=sql_D($_POST['data']['c_state']);
					if($state!=null && i_is($state)==true){$c_state=1;}
					elseif($state!=null && i_is($state)==false){$c_state=2;}
					if($c_state!=null){
						$where=pub_pgw('where');
						$colm="effective='$c_state'";
						$up=$this->P->pub_edi("student_assingcar","$colm","$where");
						if($up['state']=="true"){
							if($c_state==1){
								$order_id=sql_D($_POST['data']['order_id']);
								$wheres="student_assingcar|student_id='$student_id' && assing_time='$order_id'|id|1|DESC";
								$coach_id=$this->P->Appoint_value($wheres,"assing_coach");
								$car_id=$this->P->Appoint_value($wheres,"assing_car_id");
								$colms="coach_id='$coach_id',car_id='$car_id'";
								$ups=$this->P->pub_edi("student_info","$colms","$where");
								if($ups['state']=="true"){
									$this->P->error_info('',"申请审核通过",true);
								}else{
									$this->P->error_info('',"查询失败");
								}
							}else{
								$this->P->error_info('',"申请被退回",true);
							}
						}else{
							$this->P->error_info('',"查询失败");
						}
					}
				}else{
					$this->P->error_info('',"错误:无操作权限");
				}
			break;
			case "insert":
				$htmlpath=$this->P->power("47|48",$this->rule_info);
				if($htmlpath['power']){
					$student_id=sql_D($_POST['where']['student_id']);
					$d=$this->P->pub_sel("student_assingcar","student_id='$student_id' && effective='0'","id","1","DESC");
					if($d){
						$data=false;
						$msg="审批上一次提交的更换信息完成后，才可申请新的更换操作！";
						$code=false;
					}else{
						$sql=$this->P->pub_sel($this->table,"student_id='$student_id'","id","1","DESC");
						if($sql){
							$assing_subjectType=sql_D($_POST['data']['subjectType_name']);
							$assing_coach_id=sql_D($_POST['data']['coach_id']);
							$assing_car_id=sql_D($_POST['data']['car_id']);
							$assing_user_id='';
							$assing_time=time();
							$remake=sql_D($_POST['data']['remake']);
							$effective='0';
							$subjectType=$this->student->this_subject($sql);
							$coach_id=$sql['0']['coach_id'];
							$car_id=$sql['0']['car_id'];
							$user_id='';
							$colm="student_id,coach_id,car_id,subjectType,assing_time,assing_coach,assing_car_id,assing_user_id,effective,remake";
							$value="'$student_id','$coach_id','$car_id','$subjectType','$assing_time',
								'$assing_coach_id','$assing_car_id','$assing_user_id','$effective','$remake'";
							$up=$this->P->pub_ins("student_assingcar",$colm,$value);
							if($up['state']==true){$this->P->error_info('1',"申请成功",true);}
							else{$this->P->error_info(false,"insert error !");}
						}else{$this->P->error_info(false,"student_id is null !");}
					}
				}else{
					$this->P->error_info('',"错误:无操作权限");
				}
			break;
		}
	}
	//结业管理
	public function graduation_list($d){
		for($i=0;$i<=count($d)-1;$i++){
			$student_id=$d[$i]['student_id'];
			$where="student_id='$student_id'";
			$info=$this->P->pub_sel($this->table,$where,"id","1","DESC");
			$coach_id=$info['0']['coach_id'];
			$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
			$data[$i]=array(
				'id'=>$d[$i]['id'],
				'student_id'=>$d[$i]['student_id'],
				'name'=>$info['0']['name'],
				'coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),
				'remake'=>$d[$i]['remark'],
				'req_time'=>date("Y-m-d h:i:s",$d[$i]['req_time'])
			);
			$data[$i]=array_merge($data[$i],$this->information_list_format($info));

		}
		return $data;
	}
	public function graduation(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("55|56",$this->rule_info,'admin/student/graduation.html');
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "check":
				$w=pub_pgw('where');
				if($w){
					$sql=$this->P->pub_sel($this->table,$w,"id","1","DESC");
					if($sql){
						for($i=0;$i<=count($sql)-1;$i++){
							$data=array(
								'subjectOneAdoptTime'=>date("Y-m-d h:i:s",$sql[$i]['subjectOneAdoptTime']),
								'subjectOne'=>i_is($sql[$i]['subjectOneState']),
								'subjectTwoAdoptTime'=>date("Y-m-d h:i:s",$sql[$i]['subjectTwoAdoptTime']),
								'subjectTwo'=>i_is($sql[$i]['subjectTwoState']),
								'subjectThreeAdoptTime'=>date("Y-m-d h:i:s",$sql[$i]['subjectThreeAdoptTime']),
								'subjectThree'=>i_is($sql[$i]['subjectThreeState']),
								'subjectFourAdoptTime'=>date("Y-m-d h:i:s",$sql[$i]['subjectFourAdoptTime']),
								'subjectFour'=>i_is($sql[$i]['subjectFourState']),
								'pay_state'=>i_is($sql[$i]['pay_state']),
								'studystate'=>i_is($sql[$i]['studystate']),
								'student_id'=>$sql[$i]['student_id'],
								'national_id'=>$sql[$i]['national_id']
							);
						}
						if($data['pay_state']==false){$msg="检测到该学员尚未付款！请核实";$code=false;
						}else if($data['studystate']==false){$msg="检测到该学员已经退学";$code=false;
						}else if($data['subjectOne']==false){$msg="检测到该学员科目一考试尚未通过";$code=false;
						}else if($data['subjectTwo']==false){$msg="检测到该学员科目二考试尚未通过";$code=false;
						}else if($data['subjectThree']==false){$msg="检测到该学员科目三考试尚未通过";$code=false;
						}else if($data['subjectFour']==false){$msg="检测到该学员科目四考试尚未通过";$code=false;
						}else{
							$msg="可申请结业";$code=true;
						}
					}else{
						$msg="数据库中并没有查询到与该学号相关的信息！";
						$code=false;
						$data=array('student_id'=>$_POST['where']['student_id']);
					}
					//shap
					//
				}else{$msg="请输入正确的学生学号编码";$code=false;$data='';}
				$this->P->error_info($data,$msg,$code);
			break;
			case "insert":
				$htmlpath=$this->P->power("55|56",$this->rule_info);
				if($htmlpath['power']){
					$student_id=sql_D($_POST['data']['student_id']);
					$w="student_id='$student_id'";
					if($student_id){
						$sql=$this->P->pub_sel($this->table,$w,"id","1","DESC");
						if($sql){
							$data=array(
								'subjectOneAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectOneAdoptTime']),
								'subjectOne'=>i_is($sql['0']['subjectOneState']),
								'subjectTwoAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectTwoAdoptTime']),
								'subjectTwo'=>i_is($sql['0']['subjectTwoState']),
								'subjectThreeAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectThreeAdoptTime']),
								'subjectThree'=>i_is($sql['0']['subjectThreeState']),
								'subjectFourAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectFourAdoptTime']),
								'subjectFour'=>i_is($sql['0']['subjectFourState']),
								'pay_state'=>i_is($sql['0']['pay_state']),
								'studystate'=>i_is($sql['0']['studystate']),
								'student_id'=>$sql['0']['student_id'],
							);
							if($data['pay_state']==false){$msg="检测到该学员尚未付款！请核实";$code=false;
							}else if($data['studystate']==false){$msg="检测到该学员已经退学";$code=false;
							}else if($data['subjectOne']==false){$msg="检测到该学员科目一考试尚未通过";$code=false;
							}else if($data['subjectTwo']==false){$msg="检测到该学员科目二考试尚未通过";$code=false;
							}else if($data['subjectThree']==false){$msg="检测到该学员科目三考试尚未通过";$code=false;
							}else if($data['subjectFour']==false){$msg="检测到该学员科目四考试尚未通过";$code=false;
							}else{
								$student_id=sql_D($_POST['data']['student_id']);
								$w="student_id='$student_id'";
								if($student_id){
									$s=$this->P->pub_sel("graduationlist","$w","id","","DESC");
									if($s){
										$msg="请不要重复提交，结业申请,01";$code=false;
									}else{
										$pay_state=$data['pay_state'];
										$studystate=$data['studystate'];
										$remark=sql_D($_POST['data']['remake']);
										$req_time=time();
										$colm="remark,studystate,pay_state,req_time,student_id,req_state,order_type";
										$values="'$remark','$studystate','$pay_state','$req_time','$student_id','0','jieye'";
										$in=$this->P->pub_ins("graduationlist","$colm","$values");
										if($in['state']='true'){
											$msg="结业申请成功！请等待流程审核我们将在7个工作日内完成审核（工作日不包括节假日）";
											$code=true;
										}else{
											$msg="结业申请失败！";
											$code=false;
										}
									}
								}else{
									$msg="请输入正确的学生学号！";
									$code=false;
								}		
							}
						}else{
							$msg="数据库中并没有查询到与该学号相关的信息！";
							$code=false;
							$data=array('student_id'=>$_POST['where']['student_id']);
						}
					}else{$msg="请输入正确的学生学号编码";$code=false;$data='';}
				}else{
					$msg="错误:无操作权限";$code=false;
				}
				$this->P->error_info($data,$msg,$code);
			break;
			case "list":
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("graduationlist","$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("graduationlist","$where","id","$limit","DESC");
				$this->P->page_limit($this->graduation_list($d),$PI['total'],$PI['pageIndex']);
			break;
			case "edit":
				$htmlpath=$this->P->power("55|56",$this->rule_info);
				if($htmlpath['power']){
					$w=pub_pgw('where');
					$req_state=sql_D($_POST['data']['req_state']);
					if($req_state!=null){
						$colm="req_state='$req_state',com_state='1'";
						$up=$this->P->pub_edi("graduationlist","$colm","$w");
					}
					echo json_encode($up);
				}
			break;
		}
	}
	//退学模块
	public function dropout(){
			switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("59|60",$this->rule_info,'admin/student/dropout.html');
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "check":
				$w=pub_pgw('where');
				if($w){
					//判断是否能获取到where
					$sql=$this->P->pub_sel($this->table,$w,"id","1","DESC");
					if(i_is($sql['0']['pay_state'])==true){
						$student_id=$sql['0']['student_id'];
						//获取学员的历史教练和车辆
						$coach=$this->P->pub_sel("student_assingcar","student_id='$student_id'","id","","DESC");
						if($coach){
							for($c=0;$c<=count($coach)-1;$c++){
								$coach_id=$coach[$c]['coach_id'];
								$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
								$car_id=$coach[$c]['car_id'];
								$assing_coach=$coach[$c]['assing_coach'];
								$assing_worker_id=$this->P->Appoint_value("coach|id='$assing_coach'|id|1|DESC","worker_id");
								$assing_car_id=$coach[$c]['assing_car_id'];
								$coach_list[$c]=array(
								'student_id'=>$coach[$c]['student_id'],
								'coach_id'=>$coach[$c]['coach_id'],
								'coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),
								'car_id'=>$coach[$c]['car_id'],
								'car_id_number'=>$this->P->Appoint_value("carinfo|id='$car_id'|id|1|DESC","plate_number"),
								'subjectType'=>$coach[$c]['subjectType'],
								'assing_subjectType'=>$coach[$c]['assing_subjectType'],
								'assing_time'=>date("Y-m-d h:i",$coach[$c]['assing_time']),
								'assing_coach'=>$coach[$c]['assing_coach'],
								'assing_coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$assing_worker_id'|id|1|DESC","name"),
								'assing_car_id'=>$coach[$c]['assing_car_id'],
								'assing_car_number'=>$this->P->Appoint_value("carinfo|id='$assing_car_id'|id|1|DESC","plate_number"),
								'remake'=>$coach[$c]['remake'],
								'effective'=>$coach[$c]['effective'],
								);
							}
						}else{
							$coach_list="";
						}
						//获取学员的已付费用未付费用
						$achie=$this->P->pub_sel("student_achievement","student_id='$student_id' && ac_state='1'","id","","DESC");
						if($achie){
							for($i=0;$i<=count($achie)-1;$i++){
								$achie_list[$i]=array(
									'student_id'=>$achie[$i]['student_id'],
									'rand_id'=>$achie[$i]['rand_id'],
									'subjectType'=>$achie[$i]['subjectType'],
									'test_time'=>$achie[$i]['test_time'],
									'ac_num'=>$achie[$i]['ac_num'],
									'ac_state'=>$achie[$i]['ac_state'],
								);	
							}
						}else{
							$achie_list=null;
						}
						$vehicle_type=$sql['0']['vehicle_type'];
						$pay=$this->P->pub_sel("payment","student_id='$student_id'","id","1","DESC");
						$pay_info=array(
							'train'=>$pay['0']['train'],
							'accreditation'=>$pay['0']['accreditation'],
							'space'=>$pay['0']['space'],
							'datum'=>$pay['0']['datum'],
							'isDiscount'=>$pay['0']['isDiscount'],
							'traffic'=>$pay['0']['traffic'],
							'insurance'=>$pay['0']['insurance'],
							'ctime'=>date("Y-m-d h:i",$pay['0']['ctime']),
							'pay_state'=>$pay['0']['pay_state'],
							'isvip'=>$pay['0']['isvip'],
							'total'=>($pay['0']['train']+$pay['0']['space']+$pay['0']['datum']+$pay['0']['traffic']+$pay['0']['insurance']-$pay['0']['isDiscount'])
							);
						$user_info=array(
							'name'=>$sql['0']['name'],
							'sex'=>$sql['0']['sex'],
							'student_id'=>$sql['0']['student_id'],
							'vehicle_type'=>$this->P->Appoint_value("vehicle_type|id='$vehicle_type'|id|1|DESC","vehicle_type_name"),
							'phone'=>$sql['0']['phone'],
							'national_id'=>$sql['0']['national_id'],
							'reg_time'=>date("Y-m-d h:i",$sql['0']['reg_time']),
							'studentphoto'=>"/".$sql['0']['studentphoto'],
							);
						$data=array(
							'coach_list'=>$coach_list,
							'achie_list'=>$achie_list,
							'user_info'=>$user_info,
							'pay_info'=>$pay_info
							);
						$this->P->error_info($data,"OK",true);
					}else{
						$this->P->error_info($data,"该学员尚未支付学费");
					}
				}else{
					$this->P->error_info($data,"请输入正确的学生学号编码");
				}
			break;
			case "insert":
				$htmlpath=$this->P->power("59|60",$this->rule_info);
				if($htmlpath['power']){
					$national_id=sql_D($_POST['data']['national_id']);
					$w="national_id='$national_id'";
					if($national_id!=null){
						$sql=$this->P->pub_sel($this->table,$w,"id","1","DESC");
						if($sql){
							$data=array(
								'subjectOneAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectOneAdoptTime']),
								'subjectOne'=>i_is($sql['0']['subjectOneState']),
								'subjectTwoAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectTwoAdoptTime']),
								'subjectTwo'=>i_is($sql['0']['subjectTwoState']),
								'subjectThreeAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectThreeAdoptTime']),
								'subjectThree'=>i_is($sql['0']['subjectThreeState']),
								'subjectFourAdoptTime'=>date("Y-m-d h:i:s",$sql['0']['subjectFourAdoptTime']),
								'subjectFour'=>i_is($sql['0']['subjectFourState']),
								'pay_state'=>i_is($sql['0']['pay_state']),
								'studystate'=>i_is($sql['0']['studystate']),
								'student_id'=>$sql['0']['student_id']
							);
							if($data['pay_state']==false){
								$msg="检测到该学员尚未付款！可在收费管理模块将该学员信息删除";
								$code=false;
							}else{
								$student_id=$data['student_id'];
								$w="student_id='$student_id'";
								if($student_id){
									$s=$this->P->pub_sel("graduationlist","$w","id","","DESC");
									if($s){
										$msg="请不要重复提交，结业申请";$code=false;
									}else{
										$pay_state=$data['pay_state'];
										$studystate=$data['studystate'];
										$remark=sql_D($_POST['data']['remake']);
										$req_time=time();
										$colm="remark,studystate,pay_state,req_time,student_id,req_state,order_type";
										$values="'$remark','$studystate','$pay_state','$req_time','$student_id','0','tuixue'";
										$in=$this->P->pub_ins("graduationlist","$colm","$values");
										if($in['state']='true'){
											$msg="结业申请成功！请等待流程审核我们将在7个工作日内完成审核（工作日不包括节假日）";
											$code=true;
										}else{
											$msg="结业申请失败！";$code=false;
										}
									}
								}else{
									$msg="请输入正确的学生学号！";$code=false;
								}	
							}
						}else{
							$msg="数据库中并没有查询到与该学号相关的信息！";
							$code=false;
							$data=array('student_id'=>$_POST['where']['student_id']);
						}
					}else{
						$msg="请输入正确的学生学号编码!";$code=false;$data='';
					}
				}else{
					$msg="错误:无操作权限";
					$code=false;
					$data='';
				}
				$this->P->error_info('',$msg,$code);
			break;
			case "list":
				$d=$this->P->pub_sel("graduationlist","order_type='tuixue'","id","","DESC");
				for($i=0;$i<=count($d)-1;$i++){
						$student_id=$d[$i]['student_id'];
						$where="student_id='$student_id'";
						$info=$this->P->pub_sel($this->table,$where,"id","1","DESC");
						$coach_id=$info['0']['coach_id'];
						$worker_id=$this->P->Appoint_value("coach|id='$coach_id'|id|1|DESC","worker_id");
						$data[$i]=array(
							'id'=>$d[$i]['id'],
							'student_id'=>$d[$i]['student_id'],
							'name'=>$info['0']['name'],
							'coach_name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),
							'com_state'=>i_is($info['0']['name']),
							'remake'=>$d[$i]['remark']
						);
					}
				echo json_encode($data);
			break;
			case "edit":
				$htmlpath=$this->P->power("59|60",$this->rule_info);
				if($htmlpath['power']){
					$w=pub_pgw('where');
					$req_state=sql_D($_POST['data']['req_state']);
					if($req_state!=null){
						$colm="req_state='$req_state',com_state='1'";
						$up=$this->P->pub_edi("graduationlist","$colm","$w");
					}
					echo json_encode($up);
				}
			break;
		}
	}
/////////////////////////////////////////////////////////////////////////////////////////
	public function distributecar(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/student/distributecar.html');
				return $this->SMT();
			break;
		}
	}
	public function assumpsitcar(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/student/assumpsitcar.html');
				return $this->SMT();
			break;
			case "check":
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->table,"$where","id","1","DESC");
				if($d){
					$colm=$_POST['data']['subjecttype'];
					$vehicle_type=$d['0']['vehicle_type'];
					$wheres="vehicle_type|id='$vehicle_type'|id|1|DESC";
					$data=array(
						'name'=>$d['0']['name'],
						'national_id'=>$d['0']['national_id'],
						'subjectType_name'=>$this->student->this_subject($d),
						'student_id'=>$d['0']['student_id'],
						'price'=>$this->P->Appoint_value($wheres,$colm)
					);
					$msg="ok";
					$code=false;
				}else{
					$data="";
					$msg="查询失败";
					$code=false;
				}
				$this->P->error_info($data,$msg,$code);
			break;
		}
	}
	public function feedback(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/student/feedback.html');
				return $this->SMT();
			break;
		}
	}
	public function resultInput(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/student/resultInput.html');
				return $this->SMT();
			break;
		}
	}
	public function SMT(){
		return $this->SMT;
	}
}
$app = new app(); 
$app->action();
?>