<?php
class  producem{
	private $db;
	function __construct() {
		$this->db = new mysql();
	}
	public function M_menu_list(){
		$sql=$this->db->q("security_l","","id","","DESC");
		for($i=0;$i<=count($sql)-1;$i++){
			$data[$i]=array(
				'name'=>$sql[$i][name],
				'l_id'=>$sql[$i][id],
				'r_id'=>$sql[$i][random_id],
				'keyword'=>$sql[$i][keyword],
				'description'=>$sql[$i][description],
				'linkfile'=>$sql[$i][linkfile],
				//'content'=>ATT_name($sql[$i][random_id]),
			);
		}
		return $data;
	}
	//table name security_l
	function M_up_class_values($r_id=false,$action=false,$value=false){
		$action=sql_D(trim($action));
		$value =sql_D(trim($value));
		$r_id  =sql_D(trim($r_id));
		$values="{$action}='{$value}'";
		$data=$this->db->up("security_l",$values,"random_id='$r_id'","");
		$data=$this->errar_s($data);
		return $data;
	}
	//table name produce_att
	function produce_att_list($r_id){
		$r_id=sql_D($r_id);
		$table="produce_att";
		$where="class_random_id='$r_id'";
		$sql=$this->q("$table","$where","system_id","","DESC");
		for($i=0;$i<=count($sql)-1;$i++){
			$data[$i]=array(
				's_id'=>$sql[$i]['system_id'],
				'r_id'=>$sql[$i]['random_id'],
				'name'=>$sql[$i]['name'],
				'value'=>$sql[$i]['str_type'],
				'content'=>$this->get_produce_att_xx($sql[$i]['random_id']),
			);
		}
		return $data;
	}
	function M_add_produce_att($r_id,$i_v,$s_c){
		$r_id=trim($r_id);
		$i_v=sql_D($i_v);
		$s_c=trim($s_c);
    	if($r_id !=null and $i_v!=null and $s_c!=null){
			$random_id=my_rand();
			$where="name,str_type,class_random_id,random_id";
			$value="'$i_v','$s_c','$r_id','$random_id'";
	    	$sql=$this->in("produce_att","$where","$value","");
	    	if($sql){
				$table="produce_att";
				$where="class_random_id='$r_id'";
	    		$d=$this->q("$table","$where","system_id","","DESC");
				for($i=0;$i<=count($d)-1;$i++){
					$data[$i]=array(
						'r_id'=>$d[$i]['random_id'],
						'name'=>$d[$i]['name'],
						'value'=>$d[$i]['str_type'],
						'c'=>$this->get_produce_att_xx($d[$i]['random_id']),
					);
				}
				return $data;
	    	}
		}
	}
	//table name produce_att
	function produce_att_view_list($p_a_r_id){
		$p_a_r_id=sql_D($p_a_r_id);
		if($p_a_r_id){
			$where="random_id='$p_a_r_id'";
			$table="produce_att";
			$sql=$this->q("$table","$where","system_id","1","DESC");
			if($sql){
				for($i=0;$i<=count($sql)-1;$i++){
					$data[$i]=array(
						'r_id'=>$sql[$i]['random_id'],
						'name'=>$sql[$i]['name'],
						'value'=>$sql[$i]['str_type'],
						'c_id'=>$sql[$i]['class_random_id'],
					);
				}
				return $data;
			}else{
				return false;
			}
		}
	}
	//table name produce_att
	function up_produce_att_value($r_id,$action,$value){
		$r_id=sql_D(trim($r_id));
		$value=sql_D(trim($value));
		$action=sql_D(trim($action));
		if($action !=null && $r_id!=null && $value !=null){
			$values="{$action}='{$value}'";
			$table="produce_att";
			$sql=$this->up("$table","$values","random_id='$r_id'","");
			if($sql){
				$data=$this->errar_s($sql);
			}else{
				$data=$this->errar_s($sql);
			}
		}
		return $data;
	}
	//table name produce_att_xx
	function get_produce_att_xx($id){
		$id=sql_D($id);
		$where="att_random_id='$id'";
		$table="produce_att_xx";
		$sql=$this->q($table,$where,"system_id","","DESC");
		for($i=0;$i<=count($sql)-1;$i++){
			$data[$i]=array(
				's_id'=>$sql[$i]['system_id'],
				'value'=>$sql[$i]['att_value'],
			);
		}
		return $data;
	}
	function M_get_produce_att_xx_value($r_id=false,$s_id){
		$where="system_id='$s_id'";
		$table="produce_att_xx";
		$sql=$this->q($table,$where,"system_id","","DESC");
		for($i=0;$i<=count($sql)-1;$i++){
			$data[$i]=array(
				's_id'=>$sql[$i]['system_id'],
				'value'=>$sql[$i]['att_value'],
			);
		}
		return $data;
	}
	function change_att_value_list($s_id,$r_id){
		$s_id=sql_D($s_id);
		$r_id=sql_D($r_id);
		if($s_id!=null and $r_id!=null){
			$where="att_random_id='$r_id' and system_id='$s_id'";
			$table="produce_att_xx";
			$sql=$this->q("$table","$where","system_id","","DESC");
			for($i=0;$i<=count($sql)-1;$i++){
				$data[$i]=array(
					's_id'=>$sql[$i]['system_id'],
					'value'=>$sql[$i]['att_value'],
				);
			}
			return $data;
		}else{
			echo "error!";
		}
	}
	function M_up_produce_att_value_xx($s_id,$r_id,$i_v){
		$i_v=sql_D(trim($i_v));
		$s_id=sql_D(trim($s_id));
		$r_id=sql_D(trim($r_id));
		if($i_v !=null && $r_id !=null && $s_id!=null){
			$where="att_value='$i_v'";
			$value="system_id='$s_id'";
			$sql=$this->up("produce_att_xx","$where","$value","");
			if($sql){
				$data=$this->errar_s($sql);
			}else{
				$data=$this->errar_s();
			}
			return $data;
		}
	}
	function M_add_produce_att_value($r_id,$i_v){
		$rows=$this->get_produce_att_xx($r_id);
		if(count($rows)<5){
			$where="att_value,att_random_id";
			$value="'$i_v','$r_id'";
			$table="produce_att_xx";
			$sql=$this->in("$table","$where","$value","");
			if($sql){
				$where="att_random_id='$r_id'";
				$d=$this->q("$table","$where","system_id","5","DESC");
				for($i=0;$i<=count($d)-1;$i++){
					$data[$i]=array(
						's_id'=>$d[$i]['system_id'],
						'value'=>$d[$i]['att_value'],
						'r_id'=>$d[$i]['att_random_id'],
					);
				}
				return $data;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function produce_list($r_id){
		$random_id=sql_D($r_id);
		if($random_id){
			$where="random_id='$random_id'";
			$table="security_l";
			$sql=$this->q("$table","$where","id","1","DESC");
			for($i=0;$i<=count($sql)-1;$i++){
				$data[$i]=array(
					'name'=>$sql[$i]['name'],
					'link'=>$sql[$i]['linkfile'],
					'desc'=>$sql[$i]['description'],
					'key'=>$sql[$i]['keyword'],
					'r_id'=>$sql[$i]['random_id'],
					'img'=>$sql[$i]['img_path'],
					'redme'=>$sql[$i]['redme'],
				);
			}
		}
		return $data;
	}
	//table name produce_att_xx
	function view_produce_att_value_list($p_a_r_id){
		$p_a_r_id=sql_D($p_a_r_id);
		if($p_a_r_id){
			$where="att_random_id='$p_a_r_id'";
			$table="produce_att_xx";
			$d=$this->q($table,$where,"system_id","5","DESC");
			if($d){
				dump($d);
				for($i=0;$i<=count($data)-1;$i++){
					$data[$i]=array(
						's_id'=>$d[$i]['system_id'],
						'r_id'=>$d[$i]['random_id'],
						'value'=>$d[$i]['system_id'],
					);
				}
				return $data;
			}else{
				return false;
			}
		}
	}
	function errar_s($state=false){
		if(state!=false){
			$data['msg']="success !";
			$data['state']="ok";
		}else{
			$data['msg']="error !";
			$data['state']="no";
		}
		return $data;
	}
	///////////////////////////////////////////

	function M_all_produce_list($r_id=false){
		$l_random_id=trim($r_id);
		if($l_random_id){
			$data=$this->q("produce","l_random='$l_random_id'","id","","DESC");
		}else{
			$data=$this->q("produce","","id","","DESC");
		}
	 	for($i=0;$i<=count($data)-1;$i++){
	 		$data[$i]=array(
	 			'pic'=>$data[$i][pic],
	 			'name'=>$data[$i][produce_name],
	 			'price'=>$data[$i][produce_price],
	 			'r_id'=>$data[$i][random_id],
	 		);
	 	}
	 	return $data;
	}
	//produce class att
	function M_produce_class($r_id=false){
		$r_id=sql_D($r_id);
		$table="security_att";
		$where="class_random_id='$r_id'";
		$class=$this->q("$table","$where","system_id","","DESC");
		for($i=0;$i<=count($class)-1;$i++){
			$data[$i]=array(
				's_id'=>$class[$i][system_id],
				'name'=>$class[$i][name],
				'r_id'=>$class[$i][random_id],
 				'h'=>$this->p_c_value($class[$i][random_id],"height"),
				'value'=>$this->p_c_value($class[$i][random_id]),
			);
		}
		return $data;
	}
	function M_produce_class_name($r_id){
		$d=$this->q("security_att","random_id='$r_id'","system_id","","DESC");
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				's_id'=>$d[$i][system_id],
				'name'=>$d[$i][name],
				'r_id'=>$d[$i][random_id],
 				'h'=>$this->p_c_value($d[$i][random_id],"height"),
				'value'=>$this->p_c_value($d[$i][random_id]),
			);
		}
		return $data;
	}
	function M_delete_class_att($c_id,$r_id){
		$table="security_att_xx";
		$where="att_random_id='$r_id'";
		$del_centent=$this->d("$table","$where","");
		if($del_centent){
			$table="security_att";
			$where="random_id='$r_id'";
			$del=$this->d("$table","$where","");
			if($del){
				return $this->M_produce_class($c_id);
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function p_c_value($a_r_id,$height=false){
		$where="att_random_id='$a_r_id'";
		$table="security_att_xx";
		$sql=$this->q("security_att_xx","$where","system_id","","DESC");
		if($height!=null){
			$row_line=ceil(count($sql)/5);
			if($row_line==0){
				$data="30";
			}else{
				$data=$row_line*30;
			}
		}else{
			for($i=0;$i<=count($sql)-1;$i++){
				$data[$i]=array(
					'value'=>$sql[$i][att_value],
					's_id'=>$sql[$i][system_id],
				);
			}
		}
		return $data;
	}
	function M_ad_new_class($r_id,$value){
		$r_id=sql_D($r_id);
		$value=sql_D($value);
		if($r_id!=null and $value!=null){
			$id=my_rand();
			$value="'$value','$r_id','$id'";
			$where="name,class_random_id,random_id";
			$sql=$this->in("security_att","$where","$value","");
			if($sql){
				$data=$this->M_produce_class($r_id);
				return $data;
			}
		}else{
			return false;
		}
	}
	function M_edit_service($r_id,$value){
		if($r_id !=null and $value!=null){
			$sql=$this->up("security_att","name='$value'","random_id='$r_id'","");
			if($sql){
				$data=$this->M_produce_class_name($r_id);
				return $data;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function M_add_children_value($r_id,$value){
		if($value!=null){
			$where="att_value,att_random_id";
			$value="'$value','$r_id'";
			$sql=$this->in("security_att_xx","$where","$value","");
	    	if($sql){
				$data=$this->p_c_value($r_id);
				return $data;
			}else{
				return false;
			}
		}
	}
	function M_get_children_value($r_id,$s_id){
		$table="security_att_xx";
		$where="system_id='$s_id'";
		$d=$this->q("$table","$where","system_id","1","DESC");
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				$data[$i]=array(
					'value'=>$d[$i]['att_value'],
					's_id'=>$d[$i]['system_id'],
					'r_id'=>$d[$i]['att_random_id']
				);
			}
		}else{
			$data=false;
		}
		return $data;
	}
	function M_edit_children_value($r_id,$s_id,$value){
		$table="security_att_xx";
		$where="system_id='$s_id'";
		$value="att_value='$value'";
		$d=$this->up("$table","$value","$where","");
		if($d){
			$data=$this->p_c_value($r_id);
			return $data;
		}else{
			return false;
		}
	}
	function M_del_children_value($r_id,$s_id){
		$table="security_att_xx";
		$where="system_id='$s_id'";
		$d=$this->d("$table","$where","");
		if($d){
			$data=$this->p_c_value($r_id);
			return $data;
		}else{
			return false;
		}
	}
	//////////// produce display info
	function M_get_produce_info($p_id){
		$d=$this->q("produce","random_id='$p_id'","id","1","DESC");
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				$data[$i]=array(
					'c_id'=>$d[$i]['l_random'],
					'price'=>$d[$i]['produce_price'],
					's_t'=>$d[$i]['sendtime'],
					'name'=>$d[$i]['produce_name'],
					'pic'=>$d[$i]['pic'],
					'r_id'=>$d[$i]['random_id'],
					'state'=>$d[$i]['state'],
					'redme'=>$d[$i]['redme'],
					'cont'=>$d[$i]['body'], //content
					'ip'=>$d[$i]['ipaddress'],
					's_id'=>$d[$i]['id'],
				);
				$this->p_c_id=$d[$i]['l_random'];
				$this->p_id=$d[$i]['random_id'];
			}
			return $data;
		}
	}
	function M_p_class_switch(){
		$p_c_id=$this->p_c_id;
		$p_id=$this->p_id;
		//echo $p_id."\n";
		$table="security_att";
		$where="class_random_id='$p_c_id'";
		$d=$this->M_produce_class($p_c_id);
		for($i=0;$i<=count($d)-1;$i++){
			//echo $a_id;
			$data[$i]=array(
				's_id'=>$d[$i]['s_id'],
				'r_id'=>$d[$i]['r_id'],
				'p_id'=>$p_id,
				'name'=>$d[$i]['name'],
				'value'=>$this->g_p_c_switch_value($p_id,$d[$i]['r_id']),
			);
		}
		return $data;
	}
	function g_p_c_switch_value($p_id,$c_id){
		$where="produce_random_id='$p_id' and class_random_id='$c_id'";
		$table="produce_class_swich";
		$d=$this->q("$table","$where","system_id","","DESC");
		if($d){
			$v_id=$d['0']['att_id'];
			$where="system_id='$v_id'";
			$table="security_att_xx";
			$data=$this->q("$table","$where","system_id","","DESC");
			if($data){
				return $data['0']['att_value'];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function M_p_att_switch(){
		$p_c_id=$this->p_c_id;
		$p_id=$this->p_id;
		$table="produce_att";
		$where="class_random_id='$p_c_id'";
		$d=$this->produce_att_list($p_c_id);
		//dump($d);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				's_id'=>$d[$i]['s_id'],
				'r_id'=>$d[$i]['r_id'],
				'name'=>$d[$i]['name'],
				'value'=>$this->g_p_a_switch_value($p_id,$d[$i]['r_id']),
			);
		}
		return $data;
	}
	function g_p_a_switch_value($p_id,$c_id){
		$where="produce_random_id='$p_id' and class_random_id='$c_id'";
		$table="produce_att_swich";
		$d=$this->q("$table","$where","system_id","","DESC");
		if($d){
			$v_id=$d['0']['att_id'];
			$where="system_id='$v_id'";
			$table="produce_att_xx";
			$data=$this->q("$table","$where","system_id","","DESC");
			if($data){
				return $data['0']['att_value'];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function M_imager($action,$path=false,$p_id=false,$del_id=false){
		$table="photo";
		$p_id=if_is($p_id,$this->p_id);
		if($action){
			switch($action){
				case "view";
					//echo $p_id;
					$where="random_id='$p_id'";
					$d=$this->q("$table","$where","id","","DESC");
					//dump($d);
				break;
				case "insert";
					$r_id=my_rand();
					$where="imager_url,random_id,file_rand_id"; 
					$value="'$path','$p_id','$r_id'";
				break;
				case "del";
					$w="id='$del_id'";
					$d=$this->d("$table","$w","");
				break;

			}
			if($d){
				for($i=0;$i<=count($d)-1;$i++){
					$data[$i]=array(
						'r_id'=>$d[$i]['file_rand_id'],
						's_id'=>$d[$i]['id'],
						'c_id'=>$d[$i]['random_id'],
						'path'=>$d[$i]['imager_url'],
						);
				}
			}
			return $data;
		}
	}
	//M_auto_save_produce_value
	function M_aspv($a_n,$v_s,$p_id){
		//echo "$a_n=$v_s random_id=$p_id";
		if($a_n and $v_s and $p_id){
			$c="{$a_n}='{$v_s}'";
			$w="random_id='{$p_id}'";
			$t="produce";
			$data=$this->up("$t","$c","$w","");
			return $this->errar_s($data);
		}
	}
	function M_save_to_p_class_table($p_id,$r_id,$s_id){
		if($p_id and $r_id and $s_id){
			$w="produce_random_id='$p_id' and class_random_id='$r_id'";
			$t="produce_class_swich";
			$d=$this->q("$t","$w","system_id","","DESC");
			if($d){
				$new_s_id=$d['0']['att_id'];
				$system_id=$d['0']['system_id'];
				if($new_s_id!=$s_id){
					$t="produce_class_swich";
					$w="att_id='$s_id'";
					$data=$this->up("$t","$w","system_id='$system_id'","");
				}
			}else{
				$w="produce_random_id,class_random_id,att_id";
				$v="'$p_id','$r_id','$s_id'";
				$t="produce_class_swich";
				$data=$this->in("$t","$w","$v","");
			}
			return $data;
		
		}
	}
	function M_save_to_p_att_table($p_id,$r_id,$s_id){
		if($p_id and $r_id and $s_id){
			$w="produce_random_id='$p_id' and class_random_id='$r_id'";
			$t="produce_att_swich";
			$d=$this->q("$t","$w","system_id","","DESC");
			if($d){
				$new_s_id=$d['0']['att_id'];
				$system_id=$d['0']['system_id'];
				if($new_s_id!=$s_id){
					$t="produce_att_swich";
					$w="att_id='$s_id'";
					$data=$this->up("$t","$w","system_id='$system_id'","");
				}
			}else{
				$w="produce_random_id,class_random_id,att_id";
				$v="'$p_id','$r_id','$s_id'";
				$t="produce_att_swich";
				$data=$this->in("$t","$w","$v","");
			}
			return $data;
		
		}
	}
}
?>