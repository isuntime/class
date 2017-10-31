<?php
class studentc{
	private $PM;
	function __construct(){
		$this->PM = new pubm();
	}

	public function student_list(){
		$d=$this->PM->pub_sel("student_info","","id","","DESC");
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				$data[$i]=
				array(
					'student_id'=>$d[$i]['rand_id'],
					'name'=>$d[$i]['name'],
					'reg_time'=>date("Y:m:d",$d[$i]['reg_time']),
					'subjectOneState'=>$d[$i]['subjectOneState'],
					'subjectTwoState'=>$d[$i]['subjectTwoState'],
					'subjectThreeState'=>$d[$i]['subjectThreeState'],
					);
			}
			return $data;
		}
	}
	public function this_subject($d){
		if(i_is($d['0']['subjectOneState'])!=true){
			$sub=array(
				'subjectType_name'=>'subjectOne',
				'ch_name'=>$this->ch_name('subjectOne')
				);
		}elseif(i_is($d['0']['subjectTwoState'])!=true){
			$sub=array(
				'subjectType_name'=>'subjectTwo',
				'ch_name'=>$this->ch_name('subjectTwo')
				);
		}elseif(i_is($d['0']['subjectThreeState'])!=true){
			$sub=array(
				'subjectType_name'=>'subjectThree',
				'ch_name'=>$this->ch_name('subjectThree')
				);
		}elseif(i_is($d['0']['subjectFourState'])!=true){
			$sub=array(
				'subjectType_name'=>'subjectFour',
				'ch_name'=>$this->ch_name('subjectFour')
				);
		}else{
			$sub=array(
				'subjectType_name'=>'',
				'ch_name'=>''
			);
		}
		return $sub;
	}
	public function graduationdata($d){
		$One=i_is($d['0']['subjectOneState']);
		$Two=i_is($d['0']['subjectTwoState']);
		$Three=i_is($d['0']['subjectThreeState']);
		$Four=i_is($d['0']['subjectFourState']);
		$student_id=$d['0']['student_id'];
		if($One && $Two && $Three && $Four){
			$info=$this->PM->pub_sel("graduationlist","student_id='$student_id'","student_id","","DESC");
			if(count($info)==0){
				$remark="系统自动提交。";
				$studystate=$d['0']['studystate'];
				$pay_state=i_is($d['0']['pay_state']);
				$req_time=time();
				$req_state=0;
				$com_state=0;
				$order_type="jieye";
				$colm="student_id,remark,studystate,pay_state,req_time,req_state,com_state,order_type";
				$value="'$student_id','$remark','$studystate','$pay_state','$req_time','$req_state','$com_state','$order_type'";
				$this->PM->pub_ins("graduationlist","$colm","$value","");
			}
			return " 系统判断，该学员已经通过考试，已经自动列入结业列表中。";
		}else{
			return false;
		}
		
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
	public function check_subject($student_id,$subjecttype_name){
		$where="student_id='$student_id' && subjecttype_name='$subjecttype_name'";
		$d=$this->PM->pub_sel("retestapply","$where","id","1","DESC");
		if($d){
			$pay_state=$d['0']['pay_state'];
			$order_id=$d['0']['order_id'];
			$record['0']=array(
				'd_time'=>date("Y-m-d h:i:s",$d['0']['testtime']),
				'times'=>$i+1,
				'money'=>$d['0']['money'],
				'order_id'=>$order_id,
				'pay_state'=>$pay_state,
				'pay_time'=>date("Y-m-d h:i:s",if_is($d['0']['pay_time'],'1'))
			);
			switch ($pay_state) {
				case '0':
					$msg="该学员此项科目尚未付款";
					$pay_state=false;
				break;
				case '1':
					$msg="该学员此项科目完成付款";
					$pay_state=true;
				break;
				case '2':
					$msg="考试未通过需要重新报考";
					$pay_state=false;
				break;
			}
			$data=array(
				'name'=>$subjecttype_name,
				'ch_name'=>$this->ch_name($subjecttype_name),
				'total'=>count($d),
				'record'=>$record,
				'state'=>$pay_state,
				'msg'=>$msg,
				'order_id'=>$order_id,
				);
		}else{
			$data=array(
				'name'=>'',
				'ch_name'=>$this->ch_name($subjecttype_name),
				'total'=>'',
				'record'=>'',
				'state'=>false,
				'order_id'=>'',
				'msg'=>"该学员尚未报考此项科目"
				);
		}
		return $data;
	}
	public function byworker_id($worker_id,$coach_id){
		$total=$this->PM->pub_sel("student_info","coach_id='$coach_id'","id","","DESC");
		if(count($total)<29){
			$d=$this->PM->pub_sel("userinfo","worker_id='$worker_id'","id","","DESC");
			if($d){
				for($i=0;$i<=count($d)-1;$i++){
					$data=array(
						'worker_id'=>$d[$i]['worker_id'],
						'name'=>$d[$i]['name'],
						'total'=>count($total),
						'coach_id'=>$coach_id,
						);
				}
				return $data;
			}
		}
	}
	public function change_coach($coach_id,$vehicle_type){
		$d=$this->PM->pub_sel("coach","vehicle_type='$vehicle_type'","id","","DESC");
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				$worker_info=$this->byworker_id($d[$i]['worker_id'],$d[$i]['id']);
				//$current=$worker_info['name'];
				$data[$i]=array(
					'worker_id'=>$worker_info['worker_id'],
					'coach_name'=>$worker_info['name'],
					'all_student'=>$worker_info['total'],
					'coach_id'=>$worker_info['coach_id'],

				);
				if($d[$i]['id']==$coach_id){
					$current=$worker_info['name'];
					$coachid=$worker_info['coach_id'];
				}
			}
		}
		return array('data'=>$data,'current'=>$current,'coach_id'=>$coachid);
	}
	public function retestapp($stdent_id,$subject){
		$where="student_id='{$stdent_id}' and subjecttype_name='$subject'";
		//echo $where."\n";
		$d=$this->PM->pub_sel('retestapply',"$where","id","","DESC");
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				$order_id=$d[$i]['order_id'];
				$pay_state=$d[$i]['pay_state'];
				$rec_state=$d[$i]['rec_state'];
				$point=$this->PM->Appoint_value("student_achievement|order_id='$order_id'|id|1|DESC","ac_num");
				if(i_is($pay_state)==false){
					$point="未缴费";
				}elseif(i_is($rec_state)==false){
					$point="未录入";
				}elseif($point==null){
					$point="0";
				}
				$data[$i]=array(
					'pay_state'=>$d[$i]['pay_state'],//考试费用是否支付
					'rec_state'=>$d[$i]['rec_state'],//考试录入没有！
					'money'=>$d[$i]['money'],
					'order_id'=>$d[$i]['order_id'],//订单编号
					'subjecttype_name'=>$d[$i]['subjecttype_name'],
					'pay_time'=>$d[$i]['pay_time'],//支付时间
					'testtime'=>date("Y-m-d",$d[$i]['testtime']),//
					'student_id'=>$d[$i]['student_id'],
					'ch_name'=>$this->ch_name($d[$i]['subjecttype_name']),
					'point'=>$point
				);
			}
			//dump($data);
		}else{
			$data=array();
		}
		return $data;
	}
	/////////////////////////////////////////////////////////////////////////////////////////
	public function check_order($student_id,$subject_type){
		$where="student_id='$student_id' && subjecttype='$subject_type'";
		//$wheres="student_id='$student_id'";
		$d=$this->PM->pub_sel("retestapply",$where,"student_id","","DESC");
		//$b=$this->PM->pub_sel("retestapply",$wheres,"student_id","","DESC");
		$code=true;
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				
				// $info[$i]=array(
				// 	'd_time'=>date("Y-m-d",$d[$i]['order_id']),
				// 	'times'=>$i+1,
				// 	'money'=>$d[$i]['money'],
				// 	'order_id'=>$d[$i]['order_id'],
				// 	'pay_state'=>i_is($d[$i]['pay_state']),
				// 	'test_type'=>$test_type,
				// 	'test_state'=>$test_state

				// );
				if(i_is($d[$i]['pay_state'])==false){
					$code=false;
					$test_state=1;
					$msg="该学员存在未付款科目";
				}elseif(i_is($d[$i]['rec_state'])==false){
					$code=false;
					$test_state=1;
					$msg="请考试完成后重新申请，成绩尚未录入！";
				}else{
					$test_state=0;
					$msg="该学员付清了报考费用";
				}
			}
			return array(
				'total'=>count($d)+1,
				'code'=>$code,
				'msg'=>$msg,
				'needpay'=>$test_state,
				);
		}else{
			$test_state=0;
			return array(
				'total'=>'',
				'code'=>1,
				'msg'=>"该学员尚未报考此项科目",
				'needpay'=>$test_state,
				);
		}
	}
	public function v_t_p($subject_id,$colm){
		$d=$this->PM->pub_sel("vehicle_type","id='$subject_id'","id","1","DESC");
		return $d['0'][$colm];
	}
	public function c_s_f($state,$vehicle_id,$subjectname){
		if(($state['total']+1)==1){
			$test_type="初次考试";
			$test_state=0;
			$subject_price="0.0";
		}else{
			$test_type="第 {$state['total']} 次补考";
			$test_state=1;
			$subject_price=$this->v_t_p($vehicle_id,$subjectname);
		}
		$data=array(
			'subject'=>array(
				'subjectname'=>$subjectname,
				'ch_name'=>$this->ch_name($subjectname),
				'subject_id'=>$vehicle_id,
				'subject_price'=>$subject_price,
				'needpay'=>$state['needpay'],
				'test_type'=>$test_type,
			),
			'code'=>$state['code'],
			'msg'=>$state['msg']
			);
		return $data;
	}
	//考试申请模块 查询
	public function check_student_id($data){
		if(i_is($data['0']['subjectOneState'])!=true){
			$s=$this->check_order($data['0']['student_id'],$data['0']['vehicle_type']);
			$data=$this->c_s_f($s,$data['0']['vehicle_type'],"subjectOne");
		}elseif(i_is($data['0']['subjectTwoState'])!=true) {
			$s=$this->check_order($data['0']['student_id'],$data['0']['vehicle_type']);
			$data=$this->c_s_f($s,$data['0']['vehicle_type'],"subjectTwo");
		}elseif(i_is($data['0']['subjectThreeState'])!=true) {
			$s=$this->check_order($data['0']['student_id'],$data['0']['vehicle_type']);
			$data=$this->c_s_f($s,$data['0']['vehicle_type'],"subjectThree");
		}elseif(i_is($data['0']['subjectFourState'])!=true) {
			$s=$this->check_order($data['0']['student_id'],$data['0']['vehicle_type']);
			$data=$this->c_s_f($s,$data['0']['vehicle_type'],"subjectFour");
		}else{
			$data=array(
				'subject'=>array(
					'subjectname'=>'该学员已考完所有科目',
					'subject_price'=>'',
					'subject_id'=>$vehicle_id
				),
				'code'=>0,
				'msg'=>'该学员已考完所有科目'
			);
		}
		return $data;
	}
}
?>