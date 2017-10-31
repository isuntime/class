<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$this->SMT  = new Smarty();
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
	public function index(){
    	switch(trim(if_is($_POST['model'],$_GET['model']))){
    		case "login":
    			$this->login();
    		break;
    		case "imager":
    			$this->SE->c_imager();
    		break;
    		case "logout":
    			$this->SE->logout();
    		break;
    		default:
    			$this->SMT->display('admin/login.html');
    			//return $this->SMT();
    		break;
    	}
	}
	public function login(){
		switch (sql_D(if_is($_POST['action'],$_GET['action']))) {
		case 'check':
			$this->SE->check_login();
		break;
		case "login":
			echo "login";
		break;
		case "checkusername":
			$this->SE->checkusername(pub_pgw('where'));
		break;
		}
	}
}
$app = new app(); 
$app->index();
?>