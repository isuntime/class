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
			case "home":
				$this->home();
			break;
			case "reginfo":
				$this->reginfo();
			break;
			case "student_pay":
				$this->student_pay();
			break;
			case "examination":
				$this->examination();
			break;
            case "reTestPay":
				$this->reTestPay();
			break;
			case "assign_car":
				$this->assign_car();
			break;
			case "achievement":
				$this->achievement();
			break;
			case "graduation":
				$this->graduation();
			break;
			default:
				echo "error !";
			break;
		}
	}
	public function home(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/home.html');
				return $this->SMT();
			break;
			case 'list':
				$d=$this->system->account_list('where');
				echo json_encode($data);
			break;
			case 'insert':
				$data=$this->system->account_insert();
				if($data){
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
	public function reginfo(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/reginfo.html');
				return $this->SMT();
			break;
			case "insert":
				$data=$this->system->jurisdiction_insert();
				echo json_encode($data);
			break;
			case "edit":
				$data=$this->system->jurisdiction_edit('data','where');
				echo json_encode($data);
			break;
			case 'list':
				$data=$this->system->jurisdiction_list('where');
				echo json_encode($data);
			break;
			case 'update':
				$data=$this->system->jurisdiction_update('where');
				echo json_encode($data);
			break;
			case "edrule":
				$data=$this->system->jurisdiction_edrule('data',pub_pg('where'));
				echo json_encode($data);
			break;
		}
	}
	public function student_pay(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/student_pay.html');
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
	public function examination(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/examination.html');
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
	public function reTestPay(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/reTestPay.html');
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
	public function assign_car(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/assign_car.html');
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
	public function achievement(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/achievement.html');
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
	public function graduation(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display('admin/home/graduation.html');
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
	public function SMT(){
		return $this->SMT;
	}
}
$app = new app();
$app->action();
?>