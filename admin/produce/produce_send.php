<?php
include_once "web.config.php";
include_once "../lib.inc.php";
include_once '../smarty/Smarty.class.php';
function view_class_att(){
	$produce_random_id=rad_temp_produce();
    $produce_random_id=$produce_random_id[0][random_id];
	
	$l_random_id=trim($_GET[l_random_id]);
	$l_random_id=if_is($l_random_id,"3wH4xL7gW_2014050713_6fO6xP4zG_07131558");
	if($l_random_id!=null){
		$sql=my_q("security_att","class_random_id='$l_random_id'","system_id","","DESC");
		for($i=0;$i<=count($sql)-1;$i++){
			$att_random_id=$sql[$i][random_id];
			$value=get_produce_class_swith_value($produce_random_id,$att_random_id);
			$array_sql=my_q("security_att_xx","att_random_id='$att_random_id'","system_id","","DESC");
			array_push($sql[$i],$array_sql,$value);
		}
		//dump($sql);
		return $sql;
	}
}
function view_produce_att(){
	$produce_random_id=rad_temp_produce();
    $produce_random_id=$produce_random_id[0][random_id];
	
	$l_random_id=trim($_GET[l_random_id]);
	$l_random_id=if_is($l_random_id,"3wH4xL7gW_2014050713_6fO6xP4zG_07131558");
	if($l_random_id!=null){
		$sql=my_q("produce_att","class_random_id='$l_random_id'","system_id","","DESC");
		for($i=0;$i<=count($sql)-1;$i++){
			$att_random_id=$sql[$i][random_id];
			$value=get_produce_att_swith_value($produce_random_id,$att_random_id);
			$array_sql=my_q("produce_att_xx","att_random_id='$att_random_id'","system_id","","DESC");
			array_push($sql[$i],$array_sql,$value);
		}
		//dump($sql);
		return $sql;
	}
}
function get_produce_class_swith_value($produce_random_id,$class_random_id){
	$sql=my_q("produce_class_swich","produce_random_id='$produce_random_id' and class_random_id='$class_random_id'","system_id","","DESC");
	$system_id=$sql[0][att_id]; 
	$array_sql=my_q("security_att_xx","system_id='$system_id'","system_id","","DESC");
	return $array_sql[0][att_value];
}
function get_produce_att_swith_value($produce_random_id,$class_random_id){
	$sql=my_q("produce_att_swich","produce_random_id='$produce_random_id' and class_random_id='$class_random_id'","system_id","","DESC");
	$system_id=$sql[0][att_id]; 
	$array_sql=my_q("produce_att_xx","system_id='$system_id'","system_id","","DESC");
	return $array_sql[0][att_value];
}

//判断是否是新的产品发布 否则读取之前的临时产品发布信息
function rad_temp_produce(){
	$l_random_id=sql_D(trim($_GET[l_random_id]));
	$sql=my_q("produce","l_random='$l_random_id' and state='no'","id","1","DESC");
	if($sql){
		return $sql;
	}else{
	    $random_id=my_rand();
		
		$insert_sql=my_in("produce","l_random,state,random_id","'$l_random_id','no','$random_id'","");
		$sql=my_q("produce","state='no'","id","1","DESC");
		if($sql){
			return $sql;
		}
	}
}

function produce_imager(){
	$id_array=rad_temp_produce();
	$random_id=$id_array[0][random_id];
	if($random_id){
		$sql=my_q("photo","random_id='$random_id'","id","","DESC");
	    if($sql){
			return $sql;
		}
	}
}
function red_produce_class_att($class_random_id=false){
	$id_array=rad_temp_produce();
	$random_id=$id_array[0][random_id];
	if($class_random_id){
		$sql=my_q("produce_class_swich","produce_random_id='$random_id' and class_random_id='$class_random_id'","system_id","","DESC");
	}else{
		$sql=my_q("produce_class_swich","produce_random_id='$random_id'","system_id","","DESC");
	}
	return $sql;
}
//produce_imager();
$total=ceil(count(view_class_att())/5)*37;
$smarty = new Smarty();
$smarty->debugging=false;
$smarty->caching=false;
$smarty->cache_lifetime=2;
$smarty->template_dir  =$smart_path[admin_html];
$smarty->compile_dir   =$smart_path[ templates_c];
$smarty->config_dir    =$smart_path[configs];
$smarty->cache_dir     =$smart_path[cache];
$smarty->left_delimiter="{#";
$smarty->right_delimiter="#}";
$smarty->assign("Html_head",my_head("css/pub.css|css/produce_send.css","jquery.js|produce_send.js|upfile.inc.js","ajax",$iwebname,$title_t,$webinfo_keyword,$webinfo_description), true);
$smarty->assign("class_random_id",trim($_GET[l_random_id]), true); //产品随机字符串ID值
$smarty->assign("view_class_att",view_class_att(), true);  //查看类属性
$smarty->assign("view_produce_att",view_produce_att(), true); //查看产品属性
$smarty->assign("produce_info",rad_temp_produce(), true); // 产品基本信息
$smarty->assign("produce_imager",produce_imager(), true);// 图片
$smarty->display(get_file_name());
?>