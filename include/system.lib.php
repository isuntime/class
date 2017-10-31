<?php
class app{
	private $smat;
	function __construct(){
		$this->SMT  = new Smarty();
		$this->system = new systemc();
		$this->SMT->debugging=false;
		$this->SMT->caching=false;
		$this->SMT->cache_lifetime=0;
		$this->SMT->template_dir  =ROOR_P.TPL;
		$this->SMT->compile_dir   =ROOR_P."/c/";
		$this->SMT->config_dir    =ROOR_P."/c/c/";
		$this->SMT->cache_dir     =ROOR_P."/c/s/";
		$this->SMT->left_delimiter="{#";
		$this->SMT->right_delimiter="#}";
	}
	public function action(){
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "account":
				$this->account();
			break;
			case "jurisdiction":
				$this->jurisdiction();
			break;
			case "system":

				$this->system();
			break;
			case "backupmanager":
				$this->backupmanager();
			break;
            case "InformationImport":
				$this->InformationImport();
			break;
			default:
				echo "error !";
			break;
		}
	}
	public function account(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/system/account.html');
				return $this->SMT();
			break;
			case 'list':
				//http://lexun.date/system.php?model=account&action=list
				//http://lexun.date/system.php?model=account&action=list&u_id=1
				$d=$this->system->account_list('where');
				for($i=0;$i<=count($d)-1;$i++){
					$department_id=$d[$i]['department_id'];
					$department=$this->system->pub_sel("department","id='$department_id'");
					$position_id=$d[$i]['position_id'];
					$position=$this->system->pub_sel("position","id='$position_id'");
					$userinfo_id=$d[$i]['userinfo_id'];
					$userinfo=$this->system->pub_sel("userinfo","id='$userinfo_id'");
					$data[$i]=array(
						'id'   		   =>$d[$i]['id'],
						'random_id'    =>$d[$i]['rand_id'],
						'username'     =>$d[$i]['username'],
						'rule_id'      =>$d[$i]['rule_id'],
						'pwd'          =>"********",
						'c_time'       =>date("Y-m-d",$d[$i]['c_time']),
						'department_id'=>$department_id,
						'position_id'  =>$position_id,
						'userinfo_id'  =>$userinfo_id,
						'department'   =>$department['0']['department_name'],
						'position'     =>$position['0']['position_name'],
						'name'         =>$userinfo['0']['name'],
						'user_state'   =>$d[$i]['user_state'],
						);
				}
				echo json_encode($data);
			break;
			case 'insert':
				$data=$this->system->account_insert();
				if($data){
//					$data=$this->system->account_list();
					echo json_encode($data);
				}
			break;
			case 'edit':
				$data=$this->system->account_edit('data','where');
				echo json_encode($data);
			break;
			case 'state':
				$data=$this->system->account_state();
				echo json_encode($data);
			break;
			default:
				return ture;
			break;
		}
	}
	public function jurisdiction(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/system/jurisdiction.html');
				return $this->SMT();
			break;
			case "insert":
				$data=$this->system->jurisdiction_insert();
				echo json_encode($data);
			break;
			case "edit":
				//print_r(getallheaders());
				$data=$this->system->jurisdiction_edit('data','where');
				echo json_encode($data);
			break;
			case 'list':
				//http://lexun.date/system.php?model=jurisdiction&action=list
				//http://lexun.date/system.php?model=jurisdiction&action=list&u_id=1
				$data=$this->system->jurisdiction_list('where');
				echo json_encode($data);
			break;
			case 'update':
				//http://lexun.date/system.php?model=jurisdiction&action=list
				//http://lexun.date/system.php?model=jurisdiction&action=list&u_id=1
				$data=$this->system->jurisdiction_update('where');
				echo json_encode($data);
			break;
			case "edrule":
				$data=$this->system->jurisdiction_edrule('data',pub_pg('where'));
				echo json_encode($data);
			break;
		}
	}
	public function system(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/system/system.html');
				return $this->SMT();
			break;
			case "insert":
				$data=$this->system->system_insert();
                echo json_encode($data);
			break;
			case 'list':
				//http://lexun.date/system.php?model=jurisdiction&action=list
				//http://lexun.date/system.php?model=jurisdiction&action=list&u_id=1
				$data=$this->system->system_list();
				echo json_encode($data);
			break;
		}
	}
	public function SMT(){
		return $this->SMT;
	}
}
?>