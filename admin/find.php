<?php

//foreach ($_POST['data'] as $k=>$v){
//    echo $k."=".$v;
//    $json=array($k=>$v);
//}
//
//echo json_encode($json);



// 需要是php5及其以上的版本
define ( ' UPLOAD_DIR ' ,dirname(__FILE__).'/images/ ' ) ;
$img = $_POST [ ' image ' ] ;
$img = str_replace ( 'data:image/png;base64,', '' , $img ) ;
$img = str_replace ( '   ' , ' + ' , $img ) ;
// Base64解码
$data = base64_decode ( $img ) ;
$file = UPLOAD_DIR . uniqid () . ' .png ' ;
// 将图片数据写入文件
$success = file_put_contents ( $file , $data ) ;
//print   $success ? $file : ' 保存文件失败 ' ;
if($success){
    echo $file;
}




















?>