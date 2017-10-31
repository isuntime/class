<?php
error_reporting(7);
ob_start();
session_start();
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
// define(ROOT_PATH, "lib");
// define(ROOT_FILE, "lexun.php");
define(RUN_PATH, ".");
define(TPL, "/html/default/");
//include_once ROOR_P."/".ROOT_PATH."/".ROOT_FILE;
include_once ROOR_P."/".ROOT_PATH."/funlib.php";
include_once ROOR_P."/smarty/Smarty.php";

spl_autoload_register(Mydefineautoload);
	function Mydefineautoload($class) {
		$class = strtolower($class);
		if (file_exists(ROOR_P.'/include/model/' . $class . '.php')) {
			require_once(ROOR_P.'/include/model/' . $class . '.php');
		} elseif (file_exists(ROOR_P.'/include/lib/' . $class . '.php')) {
			require_once(ROOR_P.'/include/lib/' . $class . '.php');
		} elseif (file_exists(ROOR_P.'/include/controller/' . $class . '.php')) {
			require_once(ROOR_P.'/include/controller/' . $class . '.php');
		}else {
			emMsg($class . '加载失败。');
		}
	}
function emMsg($msg) {
	echo $msg;
	exit;
}
?>
