<?php
header('Content-Type:text/html;Charset=utf-8');
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
require_once ROOR_P.'/admin.init.php';
include_once ROOR_P."/".ROOT_PATH."/".ROOT_FILE;
$app = new manager(); 
$data=$app->news_ajax();
//echo $data;
?>
