<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
require_once ROOR_P.'/init.php';
$PR = new app(); 
$PR->produce_list();
?>