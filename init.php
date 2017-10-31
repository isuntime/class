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
define(WEBNAME,"111");
define(TITLE_T,"222");
define(CSS_NAME,"pub.css");
define(JS_NAME,"pub.js");
define(CSS_PATH,TPL."css/");
define(JS_PATH,TPL."js/");
define(KEY_1,"keyworks");
define(KEY_2,"description");
define(HOST_NAME, "localhost");
define(DATA_USER, "jiaxiao");
define(DATA_PASS, "lexundatalgsg@.");
define(DATA_BASE, "jiaxiao");
define(DATA_CHER, "utf8");
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