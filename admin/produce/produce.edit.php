<?php
include_once "web.config.php";
include_once "../lib.inc.php";
include_once '../smarty/Smarty.class.php';
//produce_imager();
$total=ceil(count(view_class_att())/5)*37;
$smarty = new Smarty();
$smarty->debugging=false;
$smarty->caching=false;
$smarty->cache_lifetime =0;
$smarty->template_dir   =$smart_path[admin_html];
$smarty->compile_dir    =$smart_path[templates_c];
$smarty->config_dir     =$smart_path[configs];
$smarty->cache_dir      =$smart_path[cache];
$smarty->left_delimiter ="{#";
$smarty->right_delimiter="#}";
$css="css/pub.css|css/produce_send.css";
$js="jquery.js|produce_send.js|upfile.inc.js";
$smarty->assign("Html_head",my_head($css,$js,"ajax","","","",""), true);
$smarty->assign("C_R_I",sql_D(trim($_GET[l_random_id])), true); //产品随机字符串ID值
$smarty->assign("V_C_A",view_class_att(),true);   //查看类属性
$smarty->assign("V_P_A",view_produce_att(),true); //查看产品属性
$smarty->assign("P_I",rad_temp_produce(),true);   // 产品基本信息
$smarty->assign("P_IMG",produce_imager(),true);   // 图片
$smarty->display("produce_send.html");
?>