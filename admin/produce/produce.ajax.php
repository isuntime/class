<?php
include_once "../web.config.php";
include_once "../../lib.inc.php";
function save_imager(){
	$random_id=sql_D(trim($_POST[random_id]));
	$img_path=trim($_POST[img_path]);
	$sql=my_q("photo","random_id='$random_id'","id","","DESC");
	if(count($sql)<45){
		if($random_id and $img_path){
			$file_rand_id=my_rand();
			$where="imager_url,random_id,file_rand_id"; 
			$value="'$img_path','$random_id','$file_rand_id'";
			$sql=my_in("photo","$where","$value","");
			echo  "保存本地服务器成功。";
		}
	}else{
		echo "error !";
	}
}
function produce_imager_re_display(){
	$random_id=sql_D(trim($_POST[random_id]));
	if($random_id){
		$sql=my_q("photo","random_id='$random_id'","id","","DESC");
	    if($sql){
			for($i=0;$i<=count($sql)-1;$i++){
				echo "<div class='imager_display' onDBLclick=del_imager('{$sql[$i][id]}') style='background:url({$sql[$i][imager_url]}) no-repeat;background-size:100px 100px;'></div>";
			}
			
		}
	}
}
function del_imager(){
	$del_id=sql_D(trim($_POST[del_id]));
	if($del_id){
		$sql=my_q("photo","id='$del_id'","id","","DESC");
		if($sql){
			$random_id=$sql[0][random_id];
			$where="id='$del_id'";
			$del_sql=my_del("photo","$where","");
			$sql=my_q("photo","random_id='$random_id'","id","","DESC");
			for($i=0;$i<=count($sql)-1;$i++){
				echo "<div class='imager_display' onDBLclick=del_imager('{$sql[$i][id]}') style='background:url({$sql[$i][imager_url]}) no-repeat;background-size:100px 100px;'></div>";
			}
			
		}
	}
}
