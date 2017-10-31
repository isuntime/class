<?php
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
define(ROOT_PATH, "lib");
define(ROOT_FILE, "lexun.php");
require_once ROOR_P.'/init.php';
$app = new app();
$app->login();  
?>