<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$rule_id=$_SESSION['user']['rule_id'];
		$this->SMT  = new Smarty();
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
		$this->usertable="userinfo";
		$this->departmenttable="department";
		$this->positiontable="position";
		$this->coachtable="coach";
		$this->rule_info=$this->P->Appoint_value("r_c_j_table|rule_id='$rule_id'|id|1|DESC","c_j_id");
	}
	public function action(){
		$this->SE->login();
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "staff":
				$this->staff();
			break;
			case "department":
				$this->department();
			break;
			case "position":
				$this->position();
			break;
			case "report":
				$this->report();
			break;
            case "coach":
				$this->coach();
			break;
			default:
				echo "error !";
			break;
		}
	}
	//员工管理
	function staff_list_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$d_id=$d[$i]['department_id'];
			$p_id=$d[$i]['position_id'];
			$department=$this->P->pub_sel($this->departmenttable,"id='$d_id'","id","","DESC");
			$position=$this->P->pub_sel($this->positiontable,"id='$p_id'","id","","DESC");
			$data[$i]=array(
				'id'=>$d[$i]['id'],
				'name'=>$d[$i]['name'],
				'worker_id'=>$d[$i]['worker_id'],
				'sex'=>$d[$i]['sex'],
				'phone'=>$d[$i]['phone'],
				'national_id'=>$d[$i]['national_id'],
				'national'=>$d[$i]['national'],
				'adress'=>$d[$i]['adress'],
				'regtime'=>date("Y-m-d",$d[$i]['regtime']),
				'outtime'=>$d[$i]['outtime'],
				'department_id'=>$d_id,
				'department_name'=>$department['0']['department_name'],
				'position_id'=>$p_id,
				'position_name'=>$position['0']['position_name'],
				'isuse'=>$d[$i]['isuse'],
				'user_state'=>$d[$i]['user_state']
			);
		}
		return $data;
	}
	public function staff(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("61|62",$this->rule_info,"admin/workers/staff.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case 'list':
				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->usertable,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->usertable,"$where","id","$limit","DESC");
				$this->P->page_limit($this->staff_list_format($d),$PI['total'],$PI['pageIndex']);
			break;
			// case 'search':
			// 	$where=pub_pgw('where');
			// 	$d=$this->P->pub_sel($this->usertable,$where,"id","","DESC");
			// 	echo json_encode($this->staff_list_format($d));
			// break;
			case 'insert':
				$htmlpath=$this->P->power("61|62",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pga('data');
					$data=$this->P->pub_ins($this->usertable,$d['colm'],$d['value']);
					echo json_encode($data);
				}
			break;
			case 'edit':
				$htmlpath=$this->P->power("61|62",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pge('data','where');
					$data=$this->P->pub_edi($this->usertable,$d['data'],$d['where']);
					echo json_encode($data);
				}
			break;
			case 'state':
				$data=$this->system->account_state();
				echo json_encode($data);
			break;
		}
	}
	//部门管理
	public function department(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("63|64",$this->rule_info,"admin/workers/department.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("63|64",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pg('data');
					$data=$this->P->pub_ins($this->departmenttable,$d['colm'],$d['value']);
					echo json_encode($data);
				}
			break;
			case "edit":
				$htmlpath=$this->P->power("63|64",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pge('data','where');
					$data=$this->P->pub_edi($this->departmenttable,$d['data'],$d['where']);
					echo json_encode($data);
				}
			break;
			case 'list':
				$d=$this->P->pub_sel($this->departmenttable,"","id","","DESC");
				for($i=0;$i<=count($d)-1;$i++){
					$data[$i]=array(
						'id'=>$d[$i]['id'],
						'department_name'=>$d[$i]['department_name'],
					);
				}
				echo json_encode($data);
			break;
			default:
				return array('state'=>'error !');
			break;
		}
	}
	//职称管理
	function position_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$d_id=$d[$i]['department_id'];
			$department=$this->P->pub_sel($this->departmenttable,"id='$d_id'","id","","DESC");
			$data[$i]=array(
				'id'=>$d[$i]['id'],
				'department_id'=>$d[$i]['department_id'],
				'position_name'=>$d[$i]['position_name'],
				'pstate'=>$d[$i]['position_name'],
				'department_name'=>$department['0']['department_name'],
			);
		}
		return $data;
	}
	public function position(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("65|66",$this->rule_info,"admin/workers/position.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert";
				$htmlpath=$this->P->power("65|66",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pg('data');
					$data=$this->P->pub_ins($this->positiontable,$d['colm'],$d['value']);
					echo json_encode($data);
				}
			break;
			case 'list':
				$data=$this->system->system_list();
				echo json_encode($data);
			break;
			case 'all':
				$d=$this->P->pub_sel($this->positiontable,"","department_id","","DESC");
				echo json_encode($this->position_format($d));
			break;
			case "edit":
				$htmlpath=$this->P->power("65|66",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pge('data','where');
					$data=$this->P->pub_edi($this->positiontable,$d['data'],$d['where']);
					echo json_encode($data);
				}
			break;
			case 'search':
				$where=pub_pgw('where');
				$d=$this->P->pub_sel($this->positiontable,$where,"department_id","","DESC");
				echo json_encode($this->position_format($d));
			break;
			default:
				return array('state'=>'error !');
			break;
		}
	}
	//工作汇报
	public function report(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/workers/report.html');
				return $this->SMT();
			break;
			case "insert":
				$data=$this->system->system_insert();
                echo json_encode($data);
			break;
			case 'list':
				$data=$this->system->system_list();
				echo json_encode($data);
			break;
		}
	}
	//教练管理
	function coach_format($d){
		for($i=0;$i<=count($d)-1;$i++){
			$worker_id=$d[$i]['worker_id'];
			$vehicle_id=$d[$i]['vehicle_type'];
			$data[$i]=array(
				'id'=>$d[$i]['id'],
				'worker_id'=>$worker_id,
				'name'=>$this->P->Appoint_value("userinfo|worker_id='$worker_id'|id|1|DESC","name"),
				'vehicle_type'=>$d[$i]['vehicle_type'],
				'vehicle_type_name'=>$this->P->Appoint_value("vehicle_type|id='$vehicle_id'|id|1|DESC","vehicle_type_name"),
				'c_state'=>$d[$i]['c_state'],
				'isvip'=>$d[$i]['isvip'],
				'coach_info'=>$d[$i]['coach_info'],
			);
		}
		return $data;
	}
	public function coach(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("69|70",$this->rule_info,"admin/workers/coach.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("69|70",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pg('data');
					$data=$this->P->pub_ins($this->coachtable,$d['colm'],$d['value']);
					echo json_encode($data);
				}
			break;
			case 'list':
				// $d=$this->P->pub_sel($this->coachtable,"","isvip","","DESC");
				// echo json_encode($this->coach_format($d));

				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->coachtable,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->coachtable,"$where","id","$limit","DESC");
				$this->P->page_limit($this->coach_format($d),$PI['total'],$PI['pageIndex']);
			break;
			case 'search':
				// $where=pub_pgw('where');
				// $d=$this->P->pub_sel($this->coachtable,$where,"isvip","","DESC");
				// echo json_encode($this->coach_format($d));

				$where=pub_pgw('where');
				$total=count($this->P->pub_sel($this->coachtable,"$where","id","","DESC"));
				$PI=$this->P->pageIndex($total,5);
				$limit=$PI['limit'];
				$d=$this->P->pub_sel($this->coachtable,"$where","id","$limit","DESC");
				$this->P->page_limit($this->coach_format($d),$PI['total'],$PI['pageIndex']);
			break;
			case "edit":
				$htmlpath=$this->P->power("69|70",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pge('data','where');
					$data=$this->P->pub_edi($this->coachtable,$d['data'],$d['where']);
					echo json_encode($data);
				}
			break;
			case 'check':
				$where=pub_pgw('where');
				if($this->P->pub_sel($this->usertable,$where,"id","","DESC")){
					if($this->P->pub_sel($this->coachtable,$where,"isvip","","DESC")){
						$data=array('state'=>'use');
					}else{
						$data=array('state'=>'true');
					}
				}else{
					$data=array('state'=>'error');
				}
				echo json_encode($data);
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