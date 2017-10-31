<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$rule_id=$_SESSION['user']['rule_id'];
		$this->SMT  = new Smarty();
		$this->P= new pubm();
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
		$this->studenttable="student_info";
		$this->rule_info=$this->P->Appoint_value("r_c_j_table|rule_id='$rule_id'|id|1|DESC","c_j_id");
	}
	public function action(){
		$this->SE->login();
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "payment":
				$this->payment();
			break;
			case "test":
				$this->test();
			break;
			case "dropout":
				$this->dropout();
			break;
			case "chargeType":
				$this->chargeType();
			break;
			case "voucher":
				$this->voucher();
			break;
			default:
				echo "error !";
			break;
		}
	}
	//入学缴费
	public function payment_list_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$vehicle_type_id=$d[$i]['vehicle_type'];
			$data[$i]=array(
				'student_id'=>$d[$i]['student_id'],
				'name'=>$d[$i]['name'],
				'vehicle_type_name'=>$this->P->Appoint_value("vehicle_type|id='$vehicle_type_id'|id|1|DESC","vehicle_type_name"),
				'pay_state'=>i_is($d[$i]['pay_state'])
				);
		}
		return $data;
	}
	public function payment(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("71|72",$this->rule_info,"admin/finance/payment.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case 'find':
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->studenttable,$where,"id","","DESC");
				if($d){
					$vehicle_type=$d['0']['vehicle_type'];
					$c=$this->P->pub_sel('vehicle_type',"id='$vehicle_type'","id","","DESC");
					$traffic=if_iss(i_is($c['0']['traffic_state']),$c['0']['traffic'],'0');
					$datum=if_iss(i_is($c['0']['datum_state']),$c['0']['datum'],'0');
					$insurance=if_iss(i_is($c['0']['insurance_state']),$c['0']['insurance'],'0');
					if(i_is($c['0']['isDiscount']==true)){
						$total_price=$c['0']['isDiscount_money'];
					}else{
						$total_price=$c['0']['train']+$c['0']['accreditation']+$c['0']['space'];
					}
					$data=array(
						'vehicle_type'=>$d['0']['vehicle_type'],
						'vehicle_type_name'=>$c['0']['vehicle_type_name'],
						'student_id'=>$d['0']['student_id'],
						'name'=>$d['0']['name'],
						'id'=>$d['0']['id'],
						//'paystate'=>$d['0']['nation'],
						'state'=>'true',
						'isvip'=>$d['0']['isvip'],
						'nation'=>array(
							'nation_id'=>$c['0']['nation'],
							'name'=>'汉族',
							'd_state'=>i_is($c['0']['nation_state'])
							),
						'train'=>$c['0']['train'],
						'accreditation'=>$c['0']['accreditation'],
						'space'=>$c['0']['space'],
						'datum'=>array(
							'money'=>$c['0']['datum'],
							'state'=>i_is($c['0']['datum_state']),
							'd_state'=>i_is($c['0']['datum_state'])
							),
						'traffic'=>array(
							'money'=>$c['0']['traffic'],
							'state'=>i_is($c['0']['traffic_state']),
							'd_state'=>i_is($c['0']['traffic_state'])
							),
						'insurance'=>array(
							'money'=>$c['0']['insurance'],
							'state'=>i_is($c['0']['insurance_state']),
							'd_state'=>i_is($c['0']['insurance_state'])
							),
						'isDiscount'=>array(
							'money'=>$c['0']['isDiscount_money'],
							'state'=>i_is($c['0']['isDiscount']),
							'd_state'=>i_is($c['0']['isDiscount'])
							),
						'total'=>$traffic+$insurance+$datum+$total_price,
					);
					$_SESSION['student']=$data;
				}else{
					$data=array('state'=>'error');
				}
				$this->P->error_info($data,"ok",1);
			break;
			case "nation":
				$d=$this->P->pub_sel("gov_nation","","system_id","","DESC");
				if($d){
					for($i=0;$i<=count($d)-1;$i++){
						$data[$i]=array(
							'id'=>$d[$i]['system_id'],
							'nation'=>$d[$i]['value_name'],
							'price'=>$d[$i]['price'],
						);
					}
				}else{
					$data=array('state'=>'error');
				}
				$this->P->error_info($data,"",1);
			break;
			case "total":
				$student_id=sql_D($_POST['data']['student_id']);
				$d=$this->P->pub_sel($this->studenttable,"student_id='$student_id'","id","","DESC");
				if($d){
					$vehicle_type=$d['0']['vehicle_type'];
					$c=$this->P->pub_sel('vehicle_type',"id='$vehicle_type'","id","","DESC");

					if($_POST['data']['isDiscount']['state']=="true"){
						$fist_total=$c['0']['isDiscount_money'];
					}else{
						$fist_total=$c['0']['train']+$c['0']['accreditation']+$c['0']['space'];
					}
					$nation_id=$_POST['data']['nation']['nation_id'];
					if($nation_id){
						$nation=$this->P->pub_sel('gov_nation',"system_id='$nation_id'","system_id","1","DESC");
						$traffic_m=$nation['0']['price'];
					}
					$datum=if_iss($_POST['data']['datum']['state'],$c['0']['datum'],$traffic_m);
					$traffic=if_iss($_POST['data']['traffic']['state'],$c['0']['traffic'],"0");
					$insurance=if_iss($_POST['data']['insurance']['state'],$c['0']['insurance'],"0");
					$data=array(
						'vehicle_type'=>$d['0']['vehicle_type'],
						'vehicle_type_name'=>$c['0']['vehicle_type_name'],
						'student_id'=>$d['0']['student_id'],
						'name'=>$d['0']['name'],
						'id'=>$d['0']['id'],
						'state'=>'true',
						'isvip'=>$d['0']['isvip'],
						'nation'=>array(
							'nation_id'=>if_is($nation_id,$c['0']['national']),
							'name'=>if_iss($nation_id,$nation['0']['value_name'],$_POST['data']['nation']['name']),
							'd_state'=>i_is($c['0']['nation_state'])
							),
						'train'=>$c['0']['train'],
						'accreditation'=>$c['0']['accreditation'],
						'space'=>$c['0']['space'],
						'datum'=>array(
							'money'=>if_iss($_POST['data']['datum']['state'],$c['0']['datum'],$traffic_m),
							'state'=>i_is($_POST['data']['datum']['state']),
							'd_state'=>i_is($c['0']['datum_state'])
							),
						'traffic'=>array(
							'money'=>$c['0']['traffic'],
							'state'=>i_is($_POST['data']['traffic']['state']),
							'd_state'=>i_is($c['0']['traffic_state'])
							),
						'insurance'=>array(
							'money'=>$c['0']['insurance'],
							'state'=>i_is($_POST['data']['insurance']['state']),
							'd_state'=>i_is($c['0']['insurance_state'])
							),
						'isDiscount'=>array(
							'money'=>$c['0']['isDiscount_money'],
							'state'=>i_is($_POST['data']['isDiscount']['state']),
							'd_state'=>i_is($c['0']['isDiscount'])
							),
						'look'=>"fist=".$fist_total."datum:".$datum."traffic:".$traffic."insurance:".$insurance,
						'total'=>$fist_total+$datum+$traffic+$insurance,
						);
					$_SESSION['student']=$data;
				}else{
					$data=array('state'=>'error');
				}
				echo json_encode($data);
			break;
			case 'list':
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("student_info","$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("student_info","$where","id","$limit","DESC");
				$this->P->page_limit($this->payment_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
			case "print_obj":
				$where=$_POST['where'];
				if($where){
					foreach ($where as $key =>$value) {
						$comm.="'".$value."',";
					}
					$comm=substr($comm,0,-1);
				}
				$SQL="student_id IN ({$comm})";
				$data=$this->P->pub_sel("student_info","$SQL","id","","DESC");
				$this->P->error_info($data,"ok",1);
				//dump($data);

			break;
			case "makeSure":
				$where=pub_pgw('where');
				$in=$this->P->pub_edi('student_info',"pay_state='1'","$where","");
				if($in['state']=='true'){
					$ins=$this->P->pub_edi("payment","pay_state='1'","$where");
					if($ins['state']=='true'){
						$student_id=sql_D($_POST['where']['student_id']);
						$data=$this->P->pub_sel("payment","student_id='{$student_id}'","id","1","DESC");
						$order_id=$data['0']['order_id'];
						$c_number=$this->P->voucher_mg();
						$pay_time=time();
						$voucher_type="1"; //考试费

						$s_where="c_number='{$c_number}'";
						$s_coml="order_id='$order_id',
								voucher_state='1',
								voucher_type='$voucher_type',
								inser_time='$pay_time',
								student_id='$student_id'";
						$res=$this->P->pub_edi("voucher","$s_coml","$s_where");
						$this->P->error_info("","",1);
					}else{
						$this->P->error_info("","",0);
					}
				}else{
					$in=$this->P->pub_edi('student_info',"pay_state='0'","$where","");
					$this->P->error_info("","",0);
				}
				
			break;
			case 'edit':
				$htmlpath=$this->P->power("71|72",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pgw('where');
					$student_id=sql_D($_POST['where']['student_id']);
					
					$vehicle_type=sql_D($_POST['data']['vehicle_type']);
					$train=sql_D($_POST['data']['train']);
					$accreditation=sql_D($_POST['data']['accreditation']);
					$space=sql_D($_POST['data']['space']);
					$datum=sql_D($_POST['data']['datum']['money']);
					$isDiscount=sql_D($_POST['data']['isDiscount']['money']);
					$traffic=sql_D($_POST['data']['traffic']['money']);
					$insurance=sql_D($_POST['data']['insurance']['money']);
					$ctime=time();
					$total=sql_D($_POST['data']['total']);
					$pay_state=true;
					$isvip=sql_D($_POST['data']['isvip']);
					$c_number=$this->P->voucher_mg();

					$data=$this->P->pub_sel("payment","student_id='{$student_id}'","id","1","DESC");
					if($data){
						$order_id=$data['0']['order_id'];
						$where="order_id='{$order_id}'";
						$colm="vehicle_type='$vehicle_type',train='$train',accreditation='$accreditation',
							space='$space',datum='$datum',isDiscount='$isDiscount',traffic='$traffic',
							insurance='$insurance',ctime='$ctime',pay_state='0',isvip='$isvip',total='$total'";
						$result=$this->P->pub_edi("payment","$colm","$where");
						if($result['state']=='true'){
							$datas=$this->P->pub_sel("payment","$where","id","1","DESC");
							$info=$this->P->pub_sel("student_info","student_id='{$student_id}'","id","1","DESC");
							$ch_vehicle=$this->P->Appoint_value("vehicle_type|id='{$info['0']['vehicle_type']}'|id|1|DESC","vehicle_type_name");
							$data=array(
								'order_id'=>$datas['0']['order_id'],
								'name'=>$info['0']['name'],
								'ch_service'=>"入学费",
								'year'=>date("Y",$datas['0']['ctime']),
								'month'=>date("m",$datas['0']['ctime']),
								'day'=>date("d",$datas['0']['ctime']),
								'vehicle_type'=>$info['0']['vehicle_type'],
								'ch_vehicle'=>$ch_vehicle,
								'Briefly'=>$ch_vehicle." - 相关费用",
								'money'=>$datas['0']['total'],
								'ch_money'=>'￥ '.$datas['0']['total'].".00",
								'daxie'=>num2rmb($datas['0']['total']),
								'c_number'=>$c_number,
							);
							$c_number=substr($c_number, 1);
							$msg="该学员 ".$student_id." 在 ".date("Y-m-d h:i:s",$datas['0']['ctime'])." 已经完成付款，本次属于重新开票，当前票据编号为:{$c_number}！票据打印成功后请点击打印成功！若选择未打印程序将取消本次缴费！";
							$this->P->error_info($data,"$msg",1);
						}else{
							$this->P->error_info("","未知错误",0);
						}
					}else{
						$coml="student_id,vehicle_type,train,accreditation,space,datum,isDiscount,traffic,insurance,ctime,pay_state,isvip,total,order_id";
						$values="'$student_id','$vehicle_type','$train','$accreditation','$space','$datum','$isDiscount','$traffic','$insurance',
								'$ctime','$pay_state','$isvip','$total','$ctime'";
						$in=$this->P->pub_ins('payment',"$coml","$values","");
						if($in['state']=='true'){
							$where="order_id='$ctime'";
							$data=$this->P->pub_sel("payment","$where","id","1","DESC");
							$info=$this->P->pub_sel("student_info","student_id='{$student_id}'","id","1","DESC");
							$ch_vehicle=$this->P->Appoint_value("vehicle_type|id='{$info['0']['vehicle_type']}'|id|1|DESC","vehicle_type_name");
							$data=array(
								'order_id'=>$data['0']['order_id'],
								'name'=>$info['0']['name'],
								'ch_service'=>"入学费",
								'year'=>date("Y",$data['0']['ctime']),
								'month'=>date("m",$data['0']['ctime']),
								'day'=>date("d",$data['0']['ctime']),
								'vehicle_type'=>$info['0']['vehicle_type'],
								'ch_vehicle'=>$ch_vehicle,
								'Briefly'=>$ch_vehicle." - 相关费用",
								'money'=>$data['0']['total'],
								'ch_money'=>'￥ '.$data['0']['total'].".00",
								'daxie'=>num2rmb($data['0']['total']),
								'c_number'=>$c_number,
							);
							$c_number=substr($c_number, 1);
							$msg="当前票据编号为:{$c_number},票据打印成功后请点击打印成功！若选择未打印程序将取消本次缴费！";
							$this->P->error_info($data,$msg,true);
						}else{
							$this->P->error_info("","缴费数据处理失败，操作退回！");
							$this->P->pub_edi('student_info',"pay_state='0'","$d","");
						}
					}
				}else{
					$this->P->error_info("","错误:无此权限");
				}
			break;
			case 'Payedlist':
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("student_info","$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("student_info","$where","id","$limit","DESC");
				$this->P->page_limit($this->payment_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
		}
	}
	public function vehicle_type($vehicle_type){
		$c=$this->P->pub_sel('vehicle_type',"id='$vehicle_type'","id","","DESC");
		if($c){

			return $c['0']['vehicle_type_name'];
		}
	}
	//科目考试缴费
	public function test_list_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'student_id'=>$d[$i]['student_id'],
				'name'=>$this->P->Appoint_value("student_info|student_id='{$d[$i]['student_id']}'|id|1|DESC","name"),
				'vehicle_type_name'=>$this->vehicle_type($d[$i]['subjecttype']),
				'subject'=>$d[$i]['subjecttype_name'],
				'testtime'=>date("Y-m-d h:i:s",$d[$i]['testtime']),
				'money'=>$d[$i]['money'],
				'pay_state'=>i_is($d[$i]['pay_state']),
				'order_id'=>$d[$i]['order_id'],
				'ch_name'=>$this->P->ch_name($d[$i]['subjecttype_name']),
				);
		}
		return $data;
	}
	public function test(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("73|74",$this->rule_info,"admin/finance/test.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "Payedlist":
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("retestapply","$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("retestapply","$where","id","$limit","DESC");
				$this->P->page_limit($this->test_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
			case "edit":
				$htmlpath=$this->P->power("73|74",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pge('data','where');
					$student_id=$_POST['where']['student_id'];
					$s_where="student_id='{$student_id}'";
					$info=$this->P->pub_sel("student_info","$s_where","id","1","DESC");
					$where="order_id='{$_POST['where']['order_id']}'";
					$re=$this->P->pub_sel("retestapply","$where","id","1","DESC");
					for($i=0;$i<=count($re)-1;$i++){
						$ch_vehicle=$this->P->Appoint_value("vehicle_type|id='{$info['0']['vehicle_type']}'|id|1|DESC","vehicle_type_name");
						$data=array(
							'ch_name'=>$this->P->ch_name($re['0']['subjecttype_name']),
							'subjecttype_name'=>$this->P->ch_name($re['0']['subjecttype_name']),
							'pay_state'=>i_is($re['0']['pay_state']),
							'testtime'=>date("Y-m-d",$re['0']['testtime']),
							'order_id'=>$re['0']['order_id'],
							'name'=>$info['0']['name'],
							'ch_service'=>"报考费",
							'year'=>date("Y",$re['0']['testtime']),
							'month'=>date("m",$re['0']['testtime']),
							'day'=>date("d",$re['0']['testtime']),
							'vehicle_type'=>$info['0']['vehicle_type'],
							'ch_vehicle'=>$ch_vehicle,
							'Briefly'=>$ch_vehicle." - ".$this->P->ch_name($re['0']['subjecttype_name']),
							'money'=>$re['0']['money'],
							'ch_money'=>'￥ '.$re['0']['money'].".00",
							'daxie'=>num2rmb($re['0']['money']),
							'c_number'=>$this->P->voucher_mg(),
						);
					}
					//$data=$this->P->pub_edi("retestapply",$d['data'],$d['where']);
					$msg="当前正在打印的票据号为：".$this->P->voucher_mg()." 请核实后打印！";
					$this->P->error_info($data,$msg,1);
				}
			break;
			case "makeSure":
				$htmlpath=$this->P->power("73|74",$this->rule_info);
				if($htmlpath['power']){
					$c_number=$_POST['where']['c_number'];
					$student_id=$_POST['where']['student_id'];
					$order_id=$_POST['where']['order_id'];
					$where="order_id='$order_id'";
					$pay_time=time();
					$coml="pay_state='1',pay_time='$pay_time'";
					$data=$this->P->pub_edi("retestapply","$coml","$where");
					if($data['state']){
						$s_where="c_number='{$c_number}'";
						$voucher_type="2"; //考试费
						$s_coml="order_id='$order_id',voucher_state='1',voucher_type='$voucher_type',inser_time='$pay_time',student_id='$student_id'";
						$res=$this->P->pub_edi("voucher","$s_coml","$s_where");
						$this->P->error_info("","",1);
					}else{
						$this->P->error_info('',"数据库中没有查询到该条需付款记录，所以付款失败！",0);
					}
				}
			break;
			case 'list':
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("retestapply","$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("retestapply","$where","id","$limit","DESC");
				$this->P->page_limit($this->test_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
			// case 'update':
			// 	$data=$this->system->jurisdiction_update('where');
			// 	echo json_encode($data);
			// break;
			// case "edrule":
			// 	$data=$this->system->jurisdiction_edrule('data',pub_pg('where'));
			// 	echo json_encode($data);
			// break;
		}
	}
	public function dropout(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("75|76",$this->rule_info,"admin/finance/dropout.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "edit":
				$htmlpath=$this->P->power("75|76",$this->rule_info);
				if($htmlpath['power']){
					$data=$this->system->system_insert();
	                echo json_encode($data);
	            }
			break;
			case 'list':
				$data=$this->system->system_list();
				echo json_encode($data);
			break;
		}
	}
	//费用管理
	public function chargeType(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("77|78",$this->rule_info,"admin/finance/chargeType.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("77|78",$this->rule_info);
				if($htmlpath['power']){
					$coml="vehicle_type_name,
	                        train,
	                        accreditation,
	                        space,
	                        datum,
	                        datum_state,
	                        traffic,
	                        traffic_state,
	                        insurance,
	                        insurance_state,
	                        isDiscount,
	                        isDiscount_money,
	                        nation_state,
	                        subjectOne,
	                        subjectTwo,
	                        subjectThree,
	                        subjectFour,
	                        twoAboutPay,
	                        threeAboutPay";
					$vehicle_type_name=$_POST['data']['vehicle_type_name'];
					$train=$_POST['data']['train'];
	                $accreditation=$_POST['data']['accreditation'];
	                $space=$_POST['data']['space'];
	                $datum=$_POST['data']['datum'];
	                $datum_state=if_iss($_POST['data']['datum_state'],"1","0");
	                $traffic=$_POST['data']['traffic'];
	                $traffic_state=if_iss($_POST['data']['traffic_state'],"1","0");
	                $insurance=$_POST['data']['insurance'];
	                $insurance_state=if_iss($_POST['data']['insurance_state'],"1","0");
	                $isDiscount=if_iss($_POST['data']['isDiscount'],"1","0");
	                $isDiscount_money=$_POST['data']['isDiscount_money'];
	                $nation_state=if_iss($_POST['data']['nation_state'],'1','0');
	                $subjectOne=$_POST['data']['subjectOne'];
	                $subjectTwo=$_POST['data']['subjectTwo'];
	                $subjectThree=$_POST['data']['subjectThree'];
	                $subjectFour=$_POST['data']['subjectFour'];
	                $twoAboutPay=$_POST['data']['twoAboutPay'];
	                $threeAboutPay=$_POST['data']['threeAboutPay'];
	                $value="'$vehicle_type_name',
		                	'$train',
		                	'$accreditation',
		                	'$space',
		                	'$datum',
		                	'$datum_state',
		                	'$traffic',
		                	'$traffic_state',
		                	'$insurance',
		                	'$insurance_state',
		                	'$isDiscount',
		                	'$isDiscount_money',
		                	'$nation_state',
		                	'$subjectOne',
		                	'$subjectTwo',
		                	'$subjectThree',
		                	'$subjectFour',
		                	'$twoAboutPay',
		                	'$threeAboutPay'";
					$data=$this->P->pub_ins("vehicle_type",$coml,$value,"");
	                $this->P->error_info($data,"新增成功",1);
	             }
			break;
			case 'list':
                $d=$this->P->pub_sel("vehicle_type","","id","","DESC");
                if($d){
                    for($i=0;$i<=count($d)-1;$i++){
                    $data[$i]=array(
                        'id'=>$d[$i]['id'],
                        'vehicle_type_name'=>$d[$i]['vehicle_type_name'],
                        'train'=>$d[$i]['train'],
                        'accreditation'=>$d[$i]['accreditation'],
                        'space'=>$d[$i]['space'],
                        'datum'=>$d[$i]['datum'],
                        'datum_state'=>i_is($d[$i]['datum_state']),
                        'traffic'=>$d[$i]['traffic'],
                        'traffic_state'=>i_is($d[$i]['traffic_state']),
                        'insurance'=>$d[$i]['insurance'],
                        'insurance_state'=>i_is($d[$i]['insurance_state']),
                        'isDiscount'=>i_is($d[$i]['isDiscount']),
                        'isDiscount_money'=>$d[$i]['isDiscount_money'],
                        'nation_state'=>i_is($d[$i]['nation_state']),
                        'nation'=>array(
                        	'id'=>'',
                        	'name'=>'',
                        	'money'=>''
                        	),
                        'subjectOne'=>$d[$i]['subjectOne'],
                        'subjectTwo'=>$d[$i]['subjectTwo'],
                        'subjectThree'=>$d[$i]['subjectThree'],
                        'subjectFour'=>$d[$i]['subjectFour'],
                        'twoAboutPay'=>$d[$i]['twoAboutPay'],
                        'threeAboutPay'=>$d[$i]['threeAboutPay'],
                    );
                    }
                    $this->P->error_info($data,"",1);
                }else{
                    $this->P->error_info($data,"",0);
                }
			break;
			case "edit":
				$htmlpath=$this->P->power("77|78",$this->rule_info);
				if($htmlpath['power']){
					$where=pub_pgw('where');
					$vehicle_type_name=$_POST['data']['vehicle_type_name'];
					$train=$_POST['data']['train'];
	                $accreditation=$_POST['data']['accreditation'];
	                $space=$_POST['data']['space'];
	                $datum=$_POST['data']['datum'];
	                $datum_state=if_iss($_POST['data']['datum_state'],"1","0");
	                $traffic=$_POST['data']['traffic'];
	                $traffic_state=if_iss($_POST['data']['traffic_state'],"1","0");
	                $insurance=$_POST['data']['insurance'];
	                $insurance_state=if_iss($_POST['data']['insurance_state'],"1","0");
	                $isDiscount=if_iss($_POST['data']['isDiscount'],"1","0");
	                $isDiscount_money=$_POST['data']['isDiscount_money'];
	                $nation_state=if_iss($_POST['data']['nation_state'],'1','0');
	                $subjectOne=$_POST['data']['subjectOne'];
	                $subjectTwo=$_POST['data']['subjectTwo'];
	                $subjectThree=$_POST['data']['subjectThree'];
	                $subjectFour=$_POST['data']['subjectFour'];
	                $twoAboutPay=$_POST['data']['twoAboutPay'];
	                $threeAboutPay=$_POST['data']['threeAboutPay'];
					$coml= "vehicle_type_name='$vehicle_type_name',
	                        train='$train',
	                        accreditation='$accreditation',
	                        space='$space',
	                        datum='$datum',
	                        datum_state='$datum_state',
	                        traffic='$traffic',
	                        traffic_state='$traffic_state',
	                        insurance='$insurance',
	                        insurance_state='$insurance_state',
	                        isDiscount='$isDiscount',
	                        isDiscount_money='$isDiscount_money',
	                        nation_state='$nation_state',
	                        subjectOne='$subjectOne',
	                        subjectTwo='$subjectTwo',
	                        subjectThree='$subjectThree',
	                        subjectFour='$subjectFour',
	                        twoAboutPay='$twoAboutPay',
	                        threeAboutPay='$threeAboutPay'";
					$data=$this->P->pub_edi("vehicle_type",$coml,$where);
					$this->P->error_info($data,"修改成功",1);
				}
			break;
		}
	}
	//票据管理
	public function voucher_check_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$ch_voucher_type=$this->P->voucher_type($d[$i]['voucher_type']);
			switch ($d[$i]['voucher_type']) {
				case '1':
					$money=if_is($this->P->Appoint_value("payment|order_id='{$d[$i]['order_id']}'|id|1|DESC","total"),"0");
				break;
				case '2':
					$money=if_is($this->P->Appoint_value("retestapply|order_id='{$d[$i]['order_id']}'|id|1|DESC","money"),"0");
				break;
				case '3':
					$money=if_is($this->P->Appoint_value("retestapply|order_id='{$d[$i]['order_id']}'|id|1|DESC","money"),"0");
				break;
			}
			$data[$i]=array(
				'c_number'=>$d[$i]['c_number'],
				'n_number'=>substr($d[$i]['c_number'],1),
				'c_time'=>date("Y-m-d",if_is($d[$i]['c_time'],"0")),
				'c_user'=>$d[$i]['c_user'],
				'dorpstate'=>$d[$i]['dorpstate'],
				'dorptime'=>date("Y-m-d",if_is($d[$i]['dorptime'],"0")),
				'inser_time'=>date("Y-m-d",if_is($d[$i]['inser_time'],"0")),
				'order_id'=>$d[$i]['order_id'],
				'student_id'=>$d[$i]['student_id'],
				'system_id'=>$d[$i]['system_id'],
				'voucher_state'=>$d[$i]['voucher_state'],
				'voucher_type'=>$d[$i]['voucher_type'],
				'ch_voucher_type'=>$ch_voucher_type['name'],
				'total_money'=>$money,
				'ch_money'=>'￥ '.$money.".00",
			);
		}
		return $data;
	}
	public function voucher_check($number=false){
		if($number){
			$where="c_number='{$number}'";
			$state=$this->P->pub_sel("voucher","$where","system_id","","DESC");
			if($state){
				return false;
			}else{
				return true;
			}
		}else{
			return false;
		}
	}
	public function voucher(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("79|80",$this->rule_info,"admin/finance/voucher.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("79|80",$this->rule_info);
				if($htmlpath['power']){
					$data=$this->system->system_insert();
					echo json_encode($data);
				}
			break;
			case "check":
				$data=pub_pgw('where');
				dump($data);
			break;
			case "add":
				$data=pub_pg('data');
				$start_number="1".sql_D($_POST['data']['voucherStartnum']);
				$end_number="1".sql_D($_POST['data']['vouchercontinuitynumber']);
				$total=$end_number-$start_number;
				if($total!=(-1)){
					for($i=0;$i<=$total;$i++){
						$c_number=$start_number+$i;
						if($this->voucher_check($c_number)){
							$dorptime=false;
							$inser_time=false;
							$student_id=false;
							$c_time=time();
							$c_user=null;
							$voucher_type=false;
							$voucher_state=false;
							$order_id=false;
							$value="'$order_id','$voucher_state','$voucher_type','$c_time','$c_number','$c_user','$inser_time','$dorptime','$student_id'";
							$colm="order_id,voucher_state,voucher_type,c_time,c_number,c_user,inser_time,dorptime,student_id";
							$this->P->pub_ins("voucher","$colm","$value");
							$datas[$i]=array(
								'c_number'=>$c_number,
								'state'=>'ok',
								'msg'=>'添加成功',
							);
						}else{
							$datas[$i]=array(
								'c_number'=>$c_number,
								'state'=>'no',
								'msg'=>'此号已经存在与之前的操作保存中',
							);
						}
					}
					$this->P->error_info($datas,"error !",1);
				}else{
					$this->P->error_info("","error !",0);
				}
			break;
			case "makeFalse":
				$where=pub_pgw('where');
				$order_id=sql_D($_POST['where']['order_id']);
				$data=$this->P->pub_sel("voucher","$where","system_id","1","DESC");
				$cj=$this->P->pub_sel("student_achievement","order_id='$order_id'","id","1","DESC"); //成绩拼音的简写
				if($data==false){
					$this->P->error_info("","数据错误",0);
				}elseif(i_is($data['0']['dorpstate'])){
					$this->P->error_info("","数据错误，或者该票据已经作废!",0);
				}elseif($cj['state']){
					$this->P->error_info("","学员已经完成考试流程，不能做退票处理!",0);
				}else{
					$dorptime=time();
					$colm="dorptime='$dorptime',dorpstate='1'";
					$res=$this->P->pub_edi("voucher","$colm","$where");
					if($res['state']){
						$t_info=$this->P->voucher_type($data['0']['voucher_type']);
						$colm="pay_state='0'";
						$result=$this->P->pub_edi("{$t_info['table']}","$colm","$where");
						$this->P->error_info($result,"ok !",1);
					}else{
						$colm="dorptime='',dorpstate='0'";
						$result=$this->P->pub_edi("voucher","$colm","$where");
						$this->P->error_info($result,"更新失败 !",0);
					}
				}
			break;
			case 'list':
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel("voucher","$where","system_id","","DESC"));
				$PI=$this->P->pageIndex($total,15);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel("voucher","$where","system_id","$limit","ASC");
				$this->P->page_limit($this->voucher_check_format($d),$PI['total'],$PI['pageIndex']);
                // $data=$this->P->pub_sel("voucher","","system_id","","DESC");
                // if($data){
                // 	$this->P->error_info($this->voucher_check_format($data),"ok !",0);
                // }else{
                //     $this->P->error_info("","error !",0);
                // }
		}
	}
	public function SMT(){
		return $this->SMT;
	}
}
$app = new app();
$app->action();
?>