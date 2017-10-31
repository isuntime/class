<?php

//// 需要是php5及其以上的版本
//
//$img = $_POST [ ' image ' ] ;
//$img = str_replace ( 'data:image/png;base64,', '' , $img ) ;
//$img = str_replace ( '   ' , ' + ' , $img ) ;
//// Base64解码
//$data = base64_decode ( $img ) ;
//$file = UPLOAD_DIR . uniqid () . ' .png ' ;
//// 将图片数据写入文件
//$success = file_put_contents ( $file , $data ) ;
////print   $success ? $file : ' 保存文件失败 ' ;
//if($success){
//    echo $file;
//}
define("UPLOADPHOTOS_DIR", dirname(__FILE__) . '/images/');
$file = UPLOADPHOTOS_DIR . uniqid() . '.png';
if ($_POST['type'] == "pixel") {
// input is in format 1,2,3...|1,2,3...|...

    $im = imagecreatetruecolor(320, 240);

    foreach (explode("|", $_POST['image']) as $y => $csv) {
        foreach (explode(";", $csv) as $x => $color) {
            imagesetpixel($im, $x, $y, $color);
        }
    }
} else {
// input is in format: data:image/png;base64,...

    if ($_POST['image']) {
        $im = imagecreatefrompng($_POST['image']);
//        $img = $_POST [' image '];
//        $img = str_replace('data:image/png;base64,', '', $img);
//        $img = str_replace('   ', ' + ', $img);
//        // Base64解码
//        echo $img;
//        $data = base64_decode($img);
//        echo $data;
//        // 将图片数据写入文件
//        $success = file_put_contents($file, $data);
//        //print   $success ? $file : ' 保存文件失败 ' ;
//        echo $success;
//        echo $file;

    }
}
imagepng($im, $file);
// do something with
if(file_exists($file)){
    $file = str_replace('/home/wwwroot/jiaxiao/public_html/', '../', $file);
    echo $file;
}


?>