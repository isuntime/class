<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
require_once ROOR_P.'/init.php';
class app{
	private $smat;
	function __construct(){
		$this->PC = new publicc();
		$this->PM=new pubm();
	}
	public function action(){
		switch(trim(if_is($_POST['model'],$_GET['model']))){
			case "department":
				$data=$this->PC->department();
				echo json_encode($data);
			break;
			case "position":
				$data=$this->PC->position();
				echo json_encode($data);
			break;
			case "workers":
				$data=$this->workers();
				echo json_encode($data);
			break;
			case "rule":
				$data=$this->PC->rule();
				echo json_encode($data);
			break;
            case "userinfo":
                $data=$this->PC->userinfo();
                echo json_encode($data);
            break;
			case "carinfo":
				$data=$this->PC->public_select("carinfo");
				echo json_encode($data);
			break;
			case "coach":
				$data=$this->PC->public_select("coach");
				if($data){
				    for($i=0;$i<=count($data)-1;$i++){
				        $sdata=array('data'=>$this->PC->public_array_select("userinfo","id='".$data[$i]['coach_info']."'","id"));
                        $data[$i]=array_merge($data[$i],$sdata);
                    }
                }
                echo json_encode($data);
			break;
			case "passportcheck":
				$data=$this->PC->public_select("student_info");
				echo json_encode($data);
			break;
			case "vehicle_type":
				$data=$this->PC->public_select("vehicle_type");
				$this->PM->error_info($data,"ok",1);
			break;
			case "subjectlist":
				$data=$this->subjectlist();
				echo json_encode($data);
			break;
			default:
				$data=array('state'=>'error',msg=>'error');
				echo json_encode($data);
			break;
			case "get_student_id":
				$student_id=$this->PM->Appoint_value("student_info||student_id|1|DESC","student_id");
				$this->PM->add_student_id($student_id);
			break;
		}
		
	}
	public function workers(){
		$where=pub_pgw('where');
		$d=$this->PM->pub_sel("userinfo","$where","id","","DESC");
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				$data[$i]=array(
					'id'=>$d[$i]['id'],
					'name'=>$d[$i]['name'],
					'worker_id'=>$d[$i]['worker_id'],
				);
			}
		}
		return $data;
	}
	public function subjectlist(){
		switch (sql_D(if_is($_POST['action'],$_GET['action']))){
			case 'list':
				$where=pub_pgw('where');
				if($where){
					$d=$this->PM->pub_sel('subjectlist',$where,"id","","ASC");
				}else{
					$d=$this->PM->pub_sel('subjectlist',"","id","","ASC");
				}
				for($i=0;$i<=count($d)-1;$i++){
					$data[$i]=array(
						'id'=>$d[$i]['id'],
						'name'=>$d[$i]['name'],
						);
				}
			break;
			default:
				$data=array('state'=>'error',msg=>'error');
			break;
		}
		return $data;
	}
}
$app = new app(); 
$app->action();
?>