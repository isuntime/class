<?php
/**
 * Created by PhpStorm.
 * User: li
 * Date: 2017-04-10
 * Time: 10:03
 */
define(ROOT_PATH, "lib");
define(ROOT_FILE, "lexun.php");
define(ROOR_P,$_SERVER['DOCUMENT_ROOT']);
require_once ROOR_P.'/init.php';
$app = new app();
$app->adminIndex();