<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$rule_id=$_SESSION['user']['rule_id'];
		$this->SMT  = new Smarty();
		$this->P = new systemc();
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
		$this->rule_info=$this->P->Appoint_value("r_c_j_table|rule_id='$rule_id'|id|1|DESC","c_j_id");
	}
	public function action(){
		$this->SE->login();
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
			case "liucheng":
				$this->liucheng();
			break;
			default:
				echo "error !";
			break;
		}
	}
	//账户管理
	public function account(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("83|84",$this->rule_info,"admin/system/account.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case 'list':
				$where=pub_pgw('where');
				if($where!=null){
					$d=$this->P->pub_sel("user","$where","id","","DESC");
				}else{
					$d=$this->P->pub_sel("user","","id","","DESC");
				}
				if($d){
					for($i=0;$i<=count($d)-1;$i++){
						$department_id=$d[$i]['department_id'];
						$position_id=$d[$i]['position_id'];
						$userinfo_id=$d[$i]['userinfo_id'];
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
							'department'   =>$this->P->Appoint_value("department|id='$department_id'|id|1|DESC","department_name"),
							'position'     =>$this->P->Appoint_value("position|id='$position_id'|id|1|DESC","position_name"),
							'name'         =>$this->P->Appoint_value("userinfo|id='$userinfo_id'|id|1|DESC","name"),
							'user_state'   =>$d[$i]['user_state'],
							);
					}
					echo json_encode($data);
				}
			break;
			case 'insert':
				$htmlpath=$this->P->power("83|84",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pga("data");
					$where="id=".$_POST['data']['userinfo_id'];
					$sql=$this->P->pub_ins("user",$d['colm'],$d['value']);
					if($sql){
						$data=$this->P->pub_edi("userinfo","isuse=1","$where");
						echo json_encode($data);
					}
				}
			break;
			case 'edit':
				$htmlpath=$this->P->power("83|84",$this->rule_info);
				if($htmlpath['power']){
					$where=pub_pgw('where');
					$values=$_POST['data'];
					if($values){
						foreach($values as $c => $v) {
							if($c!=''){
								$c=sql_D($c);
								if($c=="pwd"){
									if($v=="********"){
										$v=$this->P->Appoint_value("user|$where|id|1|DESC","pwd");
									}else{
										$v=md5($v);
									}
								}
								$data = $c . "='" . $v . "'";
								$datas .= $data. ",";
							}
						}
					}
					$values=substr($datas,0,-1);
					$data=$this->P->pub_edi("user","$values","$where");
					echo json_encode($data);
				}
			break;
		}
	}
	//权限管理
	function jurisdiction_fromat($d){
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'id' =>$d[$i]['id'],
				'rand_id' =>$d[$i]['rand_id'],
				'rule_name'=>$d[$i]['rule_name'],
				'm_time'=>$d[$i]['m_time'],
				'c_p_id'=>$d[$i]['c_p_id'],
				'c_time'=>$d[$i]['c_time'],
				'remake'=>$d[$i]['remake'],
				'rule_state'=>$d[$i]['rule_state'],
			);
		}
		return $data;
	}
	public function jurisdiction(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("85|86",$this->rule_info,"admin/system/jurisdiction.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "insert":
				$htmlpath=$this->P->power("85|86",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pg("data");
        			$data=$this->P->pub_ins("rule",$d['colm'],$d['value']);
					echo json_encode($data);
				}
			break;
			case "edit":
				$htmlpath=$this->P->power("85|86",$this->rule_info);
				if($htmlpath['power']){
					$d=pub_pge('data','where');
					$data=$this->P->pub_edi("rule",$d['data'],$d['where']);
					echo json_encode($data);
				}
			break;
			case 'list':
				$where=pub_pgw($where);
		        if($where){
		            $d=$this->P->pub_sel("rule","$where","id","","DESC");
		        }else{
		            $d=$this->P->pub_sel("rule","","id","","DESC");
		        }
				echo json_encode($this->jurisdiction_fromat($d));
			break;
			case 'update':
				$htmlpath=$this->P->power("85|86",$this->rule_info);
				if($htmlpath['power']){
					$data=$this->P->jurisdiction_update('where');
					echo json_encode($data);
				}
			break;
			case "edrule":
				$htmlpath=$this->P->power("85|86",$this->rule_info);
				if($htmlpath['power']){
					$data=$this->P->jurisdiction_edrule('data',pub_pg('where'));
					echo json_encode($data);
				}
			break;
		}
	}
	//系统设置
	public function system(){
		switch(trim(if_is($_POST['action'],$_GET['action']))){
			case '':
				$htmlpath=$this->P->power("87|88",$this->rule_info,"admin/system/system.html");
				$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
				return $this->SMT();
			break;
			case "edit":
				$htmlpath=$this->P->power("87|88",$this->rule_info);
				if($htmlpath['power']){
					$data=$this->system->system_insert();
	                echo json_encode($data);
	            }
			break;
		}
	}
	//备份管理
    public function backupmanager(){
        switch(trim(if_is($_POST['action'],$_GET['action']))){
            case '':
            	$htmlpath=$this->P->power("89|90",$this->rule_info,"admin/system/backupmanager.html");
            	$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
                return $this->SMT();
                break;
            case "insert":
            	$htmlpath=$this->P->power("89|90",$this->rule_info);
				if($htmlpath['power']){
	                $data=$this->system->backupmanager_insert();
	                echo json_encode($data);
	            }
                break;
            case 'list':
                $data=$this->system->backupmanager_list();
                echo json_encode($data);
                break;
        }
    }
    //信息管理
    public function InformationImport(){
        switch(trim(if_is($_POST['action'],$_GET['action']))){
            case '':
            	$htmlpath=$this->P->power("91|92",$this->rule_info,"admin/system/InformationImport.html");
            	$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
                return $this->SMT();
			break;
            case "insert":
            	$htmlpath=$this->P->power("91|92",$this->rule_info);
				if($htmlpath['power']){
	                $data=$this->system->InformationImport_insert();
	                echo json_encode($data);
	            }
			break;
            case 'list':
                //http://lexun.date/system.php?model=jurisdiction&action=list
                //http://lexun.date/system.php?model=jurisdiction&action=list&u_id=1
                $data=$this->system->InformationImport_list();
                echo json_encode($data);
            break;
        }
    }
    public function liucheng(){
        switch(trim(if_is($_POST['action'],$_GET['action']))){
            case '':
            	$htmlpath=$this->P->power("91|92",$this->rule_info,"admin/system/liucheng.html");
            	$this->SMT->assign("user",$_SESSION['user'],true);
				$this->SMT->display($htmlpath['html_path']);
                return $this->SMT();
			break;
            case "insert":
            	$htmlpath=$this->P->power("91|92",$this->rule_info);
				if($htmlpath['power']){
	                $data=$this->system->InformationImport_insert();
	                echo json_encode($data);
	            }
			break;
            case 'list':
                $data=$this->P->pub_sel("department","","id","","DESC");
                echo json_encode($data);
			break;
			case "edit":
				echo "11111";
			break;
			case "create":
				$data=$this->P->pub_sel("department","","id","","DESC");
				$data=$data?$data:$this->P->pub_sel("department","","id","","DESC");
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