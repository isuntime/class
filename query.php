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
        $this->table="carinfo";
        $this->rule_info=$this->P->Appoint_value("r_c_j_table|rule_id='$rule_id'|id|1|DESC","c_j_id");
    }
    public function action(){
        $this->SE->login();
        switch(trim(if_is($_POST['model'],$_GET['model']))){
            case "query":
                $this->query();
                break;
            default:
                echo "error !";
                break;
        }
    }
    //车辆管理
    public function query_format($d){
        for($i=0;$i<=count($d)-1;$i++){
            $data[$i]=array(
                'Annual_examination_time'=>$d[$i]['Annual_examination_time'],
                'Cylinder_detection_time'=>$d[$i]['Cylinder_detection_time'],
                'Engine_number'=>$d[$i]['Engine_number'],
                'Frame_number'=>$d[$i]['Frame_number'],
                'InstallChronograph'=>$d[$i]['InstallChronograph'],
                'Insurance_company'=>$d[$i]['Insurance_company'],
                'Insurance_number'=>$d[$i]['Insurance_number'],
                'Insurance_period'=>$d[$i]['Insurance_period'],
                'Vehicle_type'=>$d[$i]['Vehicle_type'],
                'brand'=>$d[$i]['brand'],
                'car_type'=>$d[$i]['car_type'],
                'carstate'=>$d[$i]['carstate'],
                'coach_id'=>$d[$i]['coach_id'],
                'id'=>$d[$i]['id'],
                'plate_number'=>$d[$i]['plate_number'],
                'remark'=>$d[$i]['remark'],
                'taxiregtime'=>$d[$i]['taxiregtime'],
                'two_guaranteed_time'=>$d[$i]['two_guaranteed_time']
            );
        }
        return $data;
    }
    public function query(){
        switch(trim(if_is($_POST['action'],$_GET['action']))){
            case '':

                $this->SMT->display('query.html');
                return $this->SMT();
                break;
            case 'list':
                $where=pub_pgw('where');
                $total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
                $PI=$this->P->pageIndex($total,5);
                $limit=$PI['limit'];
                $d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
                $this->P->page_limit($this->carlist_format($d),$PI['total'],$PI['pageIndex']);
                break;
            case 'search':
                $where=pub_pgw('where');
                $total=count($this->P->pub_sel($this->table,"$where","id","","DESC"));
                $PI=$this->P->pageIndex($total,5);
                $limit=$PI['limit'];
                $d=$this->P->pub_sel($this->table,"$where","id","$limit","DESC");
                $this->P->page_limit($this->carlist_format($d),$PI['total'],$PI['pageIndex']);
                break;
            case 'insert':
                $htmlpath=$this->P->power("81|82",$this->rule_info);
                if($htmlpath['power']){
                    $d=pub_pg('data');
                    $data=$this->P->pub_ins($this->table,$d['colm'],$d['value']);
                    echo json_encode($data);
                }
                break;
            case 'edit':
                $htmlpath=$this->P->power("81|82",$this->rule_info);
                if($htmlpath['power']){
                    $d=pub_pge('data','where');
                    $data=$this->P->pub_edi($this->table,$d['data'],$d['where']);
                    echo json_encode($data);
                }
                break;
            case 'typeList':
                $d=$this->P->pub_sel('subjectlist',"","id","","DESC");
                for($i=0;$i<=count($d)-1;$i++){
                    $data[$i]=array('id'=>$d[$i]['id'],'vehicle_type_name'=>$d[$i]['name']);
                }
                echo json_encode($data);
                break;
            default:
                return ture;
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