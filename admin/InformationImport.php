<?php
    error_reporting(7);
    ob_start();
    session_start();
    header('Content-Type: text/html; charset=UTF-8');
    include_once '../lib/PHPExcel-1.8/Classes/PHPExcel.php';
    include_once '../lib/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
    include_once '../include/lib/mysql.php';
    include_once '../lib/funlib.php';
    define(HOST_NAME, "localhost");
    define(DATA_USER, "jiaxiao");
    define(DATA_PASS, "lexundatalgsg@.");
    define(DATA_BASE, "jiaxiao");
    define(DATA_CHER, "utf8");
    $db= new mysql();
    function ExcelToArray($inputFileName){
        $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($inputFileName);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData= array();
        for($row=2;$row<=$highestRow;$row++){
            for($col=0;$col<$highestColumnIndex;$col++){$excelData[$row][]=(string)$objWorksheet->getCellByColumnAndRow($col,$row)->getValue();}
        }
        return $excelData;
    }
    if($_SESSION['user']['state']=='login'){
        if(!empty($_FILES['upfile']['name'])){
            $tmp_file=$_FILES['upfile']['tmp_name'];
            $file_types=explode(".",$_FILES['upfile']['name']);
            $file_type=$file_types[count($file_types)-1];
            $savePath=dirname(__FILE__).'/upfile/Excel/';
            $file_name=date('Ymdhis').".".$file_type;
            if(strtolower($file_type )!= "xls"){
                echo json_encode(array('data'=>'','msg'=>'不是xls格式文件，重新上传','code'=>false));
            }else{
                copy($tmp_file,$savePath.$file_name);
                $res=ExcelToArray($savePath.$file_name);
                $colm="student_id,name,sex,nationality,certificatetype,national_id,nation,studentphoto,postalcode,
                    address,birthday,tel,phone,vehicle_type,electronic_card,coach_id,reg_time,
                    subjectOneState,subjectOneAdoptTime,subjectTwoState,subjectTwoAdoptTime,
                    subjectThreeState,subjectThreeAdoptTime,subjectFourState,subjectFourAdoptTime,
                    studystate,retest_num,isvip,note_state,car_id,recommend,pay_state,dropout";
                for($i=2;$i<count($res)+2;$i++){
                    $national_id=$res[$i][4];
                    $student_id=file_get_contents("http://bzrdjx.com/public.php?model=get_student_id");$name=$res[$i][1];
                    $sex=$res[$i]['2'];$nationality=$res[$i]['3'];$certificatetype=$res[$i]['4'];$nation=$res[$i]['6'];
                    $studentphoto='';$postalcode=$res[$i]['6'];$address=$res[$i]['9'];$birthday=$res[$i]['7'];$tel=$res[$i][''];
                    $phone=$res[$i]['8'];$vehicle_type=$res[$i]['11'];$electronic_card='';$coach_id='';$reg_time=time();
                    $subjectOneState='';$subjectOneAdoptTime='1';$subjectTwoState='';$subjectTwoAdoptTime='1';$subjectThreeState='';
                    $subjectThreeAdoptTime='1';$subjectFourState='';$subjectFourAdoptTime='1';$studystate='1';
                    $retest_num='';$isvip=$res[$i]['12'];$note_state='0';$car_id='';$recommend='0';$pay_state='0';$dropout='0';
                    $where="national_id='$national_id'";
                    if($db->q('student_info',"$where","id","1","DESC")){
                        continue;
                    }else{
                        $values="'$student_id','$name','$sex','$nationality','$certificatetype','$national_id',
                            '$nation','$studentphoto','$postalcode','$address','$birthday','$tel',
                            '$phone','$vehicle_type','$electronic_card','$coach_id','$reg_time','$subjectOneState',
                            '$subjectOneAdoptTime','$subjectTwoState','$subjectTwoAdoptTime','$subjectThreeState',
                            '$subjectThreeAdoptTime','$subjectFourState','$subjectFourAdoptTime','$studystate',
                            '$retest_num','$isvip','$note_state','$car_id','$recommend','$pay_state','$dropout'";
                        $db->insert("student_info","$colm","$values");
                        }
                    }
                echo json_encode(array('data'=>'','msg'=>"数据写入成功",'code'=>true));
            }
        }else{echo json_encode(array('data'=>'','msg'=>"请选择文件后点击上传",'code'=>false));}
    }else{echo json_encode(array('data'=>'','msg'=>"错误:无权操作!",'code'=>false));}
?>

