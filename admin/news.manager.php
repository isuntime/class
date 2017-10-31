<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
require_once ROOR_P.'/admin.init.php';
include_once ROOR_P."/".ROOT_PATH."/".ROOT_FILE;
$app = new manager(); 
$app->news_manager();
?>
