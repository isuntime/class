<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$this->SMT  = new Smarty();
		$this->system = new systemc();
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
	}
	public function action(){
		$this->SE->login();
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "content":
				$this->content();
			break;
			case "column":
				$this->column();
			break;
			case "notice":
				$this->notice();
			break;
			default:
				echo "error !";
			break;
		}
	}
	public function content(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/reception/content.html');
				return $this->SMT();
			break;
			case 'list':
				//http://lexun.date/system.php?model=account&action=list
				//http://lexun.date/system.php?model=account&action=list&u_id=1
				$d=$this->system->account_list('where');
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
	public function column(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/reception/column.html');
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
	public function notice(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->display('admin/reception/notice.html');
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
$app = new app();
$app->action();
?>