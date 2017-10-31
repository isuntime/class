<?php
class producec{
	private $PM;
	function __construct() {
		$this->PM = new producem();
	}
	public function Menu_list(){
		$data=$this->PM->M_menu_list();
		return $data;
	}
	function up_class_value($r_id=false,$action=false,$value=false){
		if($action !=null and $r_id!=null and $value !=null){
			$data=$this->M_up_class_values($r_id,$action,$value);
		}else{
			$data=$this->errar_s();
		}
		return $data;
	}
	function produce_att($r_id){
		$data=$this->produce_att_list($r_id);
		return $data;
	}
	function class_edit($r_id){
		$data=$this->produce_list($r_id);
		//dump($data);
		return $data;
	}
	function view_produce_att_value($p_a_r_id){
		$d=$this->view_produce_att_value_list($p_a_r_id);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<span class='my_s' id='{$d[$i][s_id]}' ";
				echo "onclick=C_A_V('{$d[$i][s_id]}|{$d[$i][a_r_id]}')>";
				echo "{$d[$i][value]}</span>";
			}
		}else{
			echo "<span class='my_o'>未添加!</span>";
		}
	}
	function produce_att_view($p_a_r_id){
		$d=$this->produce_att_view_list($p_a_r_id);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<div class='a_t'>\n";
				echo "	<input type='hidden' value='{$d[$i][r_id]}' id='produce_att_random_id'>\n";
				echo "	<span class=\"r_t\">属性名称</span>\n";
				echo "	<input value='{$d[$i][name]}' class=\"ipt\" id='auto_save_input_name'>\n";
				echo "</div>\n";
				echo "<div class='a_t' onDBLclick=\"disp_list_type_over()\">\n";
				echo "	<div class=\"n_t\">显示方式</div>\n";
				echo "	<div class=\"l_s\">\n";
				echo "		<div  id=\"disp_value_viewss\" class=\"al\">{$d[$i][value]}</div>\n";
				echo "		<ul id='disp_list_type_xx'><li>open</li><li>close</li></ul>\n"; 
				echo "	</div>\n";
				echo "</div>\n";
				echo "<div class='a_t'>\n";
				echo "	<input value='' class=\"ipt iptw\" id='insert_new_produce_att_value'>\n";
				echo "	<span class=\"ad\" id='insert_produce_att_submit'>添加 / ADD</span>\n";
				echo "</div>";
			}
		}
	}
	function up_produce_att($r_id=false,$action=false,$value=false){
		$data=$this->up_produce_att_value($r_id,$action,$value);
		return $data;
	}
	function change_att_value($s_id,$r_id){
		$d=$this->change_att_value_list($s_id,$r_id);
		if($d){
			echo "	<input type='hidden' value='{$r_id}' id='produce_att_random_id'>";
			echo "	<input type='hidden' value='{$s_id}' id='att_system_id'>";
			echo "	<div class='a_t'>";
			echo "	<span class=\"r_t\">改变属性</span>";
			echo "	</div>";
			echo "	<div class='a_t'>";
			echo "		<span class=\"r_t\">属性值</span>";
			echo "		<input type='text' class=\"ipt\" value='{$d[0][value]}' id='auto_save_att_xx_value'>";
			echo "	</div>";
		}
	}
	function up_produce_att_value_xx($s_id,$r_id,$i_v){
		$data=$this->M_up_produce_att_value_xx($s_id,$r_id,$i_v);
		return $data;
	}
	function add_produce_att_value($r_id,$i_v){
		$data=$this->M_add_produce_att_value($r_id,$i_v);
		if($data){
			for($i=0;$i<=count($data)-1;$i++){
				echo "<span class=\"my_s\" id=\"{$data[$i][s_id]}\" ";
				echo "onclick=\"C_A_V('{$data[$i][s_id]}|{$data[$i][r_id]}')\">";
				echo "{$data[$i][value]}</span>";
		   }
		}
	}
	function add_produce_att($r_id,$i_v,$s_c){
		$d=$this->M_add_produce_att($r_id,$i_v,$s_c);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<div id=\"pal|{$d[$i][r_id]}\" class=\"r_a\">\n"; 
				echo "<div id=\"palv|{$d[$i][r_id]}\" class=\"a_n\" onclick=\"P_A_V('{$d[$i][r_id]}')\">{$d[$i][name]}</div>\n";
				echo "<div id=\"palt|{$d[$i][r_id]}\" class=\"a_t\">{$d[$i][value]}</div>\n";
				echo "<div id=\"palx|{$d[$i][r_id]}\" class=\"a_l\" >\n";
				$cs=$d[$i][c];
				for($s=0;$s<=count($cs)-1;$s++){
					echo "<span id=\"{$cs[$s]['s_id']}\" onclick=\"C_A_V('{$cs[$s][s_id]}|{$cs[$s][r_id]}')\">{$cs[$s]['value']}</span>\n";
				}
				echo "</div>\n";
				echo "</div>\n";	
			}
		}
	}

	function all_produce_list($r_id=false){
		$data=$this->M_all_produce_list($r_id=false);
		return $data;
	}
	function produce_class($r_id=false){
		$data=$this->M_produce_class($r_id);
		return $data;
	}
	function ad_b_c(){
		echo "<span class=\"btn\">分类属性 / Class /Att</span>";
		echo "<input class=\"ipt\" id=\"ipt\" type=\"text\"/>";
		echo "<span class=\"btn\" onclick=\"ad_new_class()\" >确定提交 / Submit</span>";
		echo "<span class=\"web_state\" id=\"web_state\"></span>";
	}
	function delete_class_att($r_id,$c_id){
		$c_id=sql_D(trim($c_id));
		$r_id=sql_D(trim($r_id));
		if($r_id){
			$d=$this->M_delete_class_att($c_id,$r_id);
			if($d){
				echo "<et id=\"{$c_id}\">";
				echo "<span class=\"btn\">分类属性 / Class /Att</span>";
				echo "<input class=\"ipt\" id=\"ipt\" type=\"text\"/>";
				echo "<span class=\"btn\" onclick=\"ad_new_class()\" >确定提交 / Submit</span>";
				echo "<span class=\"web_state\" id=\"web_state\"></span>";
				echo "</et>";
				for($i=0;$i<=count($d)-1;$i++){
					echo "<ls id=\"{$d[$i][r_id]}\">";
					echo "<lsl id=\"father\" onclick=\"c_t('{$d[$i][r_id]}')\" style=\"height:{$d[$i][h]}px;\">{$d[$i][name]}</lsl>";
					echo "<lsr id=\"son\" style=\"height:{$d[$i][h]}px;\">";
					$c=$d[$i]['value'];
					for($k=0;$k<=count($c)-1;$k++){
						echo "<cent id=\"{$c[$k][s_id]}\" onclick=\"c_e('{$c[$k][s_id]}|{$d[$i][r_id]}')\">{$c[$k]['value']}</cent>\n";
					}
					echo "</lsr>";
					echo "</ls>";
				}
			}else{
				echo "error ! ?";
			}
		}
	}
	function ad_new_class($r_id,$value){
		$d=$this->M_ad_new_class($r_id,$value);
		if($d){
			echo "<et id=\"{$r_id}\">";
			echo "<span class=\"btn\">分类属性 / Class /Att</span>";
			echo "<input class=\"ipt\" id=\"ipt\" type=\"text\"/>";
			echo "<span class=\"btn\" onclick=\"ad_new_class()\" >确定提交 / Submit</span>";
			echo "<span class=\"web_state\" id=\"web_state\"></span>";
			echo "</et>";
			for($i=0;$i<=count($d)-1;$i++){
				echo "<ls id=\"{$d[$i][r_id]}\">";
				echo "<lsl id=\"father\" onclick=\"c_t('{$d[$i][r_id]}')\" style=\"height:{$d[$i][h]}px;\">{$d[$i][name]}</lsl>";
				echo "<lsr id=\"son\" style=\"height:{$d[$i][h]}px;\">";
				$c=$d[$i]['value'];
				for($k=0;$k<=count($c)-1;$k++){
					echo "<cent id=\"{$c[$k][s_id]}\" onclick=\"c_e('{$c[$k][s_id]}|{$d[$i][r_id]}')\">{$c[$k]['value']}</cent>\n";
				}
				echo "</lsr>";
				echo "</ls>";
			}
		}else{
			echo "error ! ?";
		}
	}
	//get_a_s get add service table or style!
	function get_a_s($r_id,$c_id){
		if($r_id!=false and $c_id!=false){
			$data=$this->M_produce_class_name($r_id);
			echo "<span class=\"btn\" style=\"width:90px\">修改 || 添加</span>";
			echo "<input class=\"ipt\" type=\"text\" id=\"e_s\" value=\"{$data['0']['name']}\"/>";
			echo "<span class=\"btn\" onclick=\"e_s('{$c_id}|{$r_id}')\" style=\"width:90px\">修改属性</span>";
			echo "<input class=\"ipt\" type=\"text\" id=\"a_v\"/>";
			echo "<span class=\"btn\" onclick=\"a_v('{$c_id}|{$r_id}')\">插入属性</span>";
			echo "<span class=\"btn\" onDBLclick=\"d_c('{$r_id}')\" style=\"width:90px\">delete</span>";
			echo "<span class=\"btn\" onclick=\"b_k('{$c_id}|{$r_id}')\" style=\"width:90px\">come back</span>";
		}
	}
	function edit_service($r_id,$value){
		$r_id=sql_D(trim($r_id));
		$value=sql_D(trim($value));
		$data=$this->M_edit_service($r_id,$value);
		if($data){
			echo $data['0']['name'];	
		}else{
			echo "error !";
		}
	}
	function add_children_value($r_id,$value){
		$r_id=sql_D(trim($r_id));
		$value=sql_D(trim($value));
		$d=$this->M_add_children_value($r_id,$value);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<cent id=\"{$d[$i][s_id]}\" onclick=\"c_e('{$d[$i][s_id]}|{$r_id}')\">{$d[$i][value]}</cent>\n";
			}
		}
	}
	function get_children_value($r_id,$s_id){
		$s_id=sql_D(trim($s_id));
		$r_id=sql_D(trim($r_id));
		$d=$this->M_get_children_value($r_id,$s_id);
		if($d){
			echo "<span class=\"btn\">edit || delete</span>";
			echo "<input class=\"ipt\" type=\"text\" id=\"c_e\" value=\"{$d['0']['value']}\"/>";
			echo "<span class=\"btn\" onclick=\"c_e_s('{$s_id}|{$r_id}')\">修改属性</span>";
			echo "<span class=\"btn\" onDBLclick=\"c_e_d('{$s_id}|{$r_id}')\">delete</span>";
		}else{
			echo "error !";
		}
	}
	function edit_children_value($r_id,$s_id,$value){
		$s_id=sql_D(trim($s_id));
		$r_id=sql_D(trim($r_id));
		$value=sql_D(trim($value));
		$d=$this->M_edit_children_value($r_id,$s_id,$value);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<cent id=\"{$d[$i][s_id]}\" onclick=\"c_e('{$d[$i][s_id]}|{$r_id}')\">{$d[$i][value]}</cent>\n";
			}
		}
	}
	function del_children_value($r_id,$s_id){
		$s_id=sql_D(trim($s_id));
		$r_id=sql_D(trim($r_id));
		$d=$this->M_del_children_value($r_id,$s_id);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<cent id=\"{$d[$i][s_id]}\" onclick=\"c_e('{$d[$i][s_id]}|{$r_id}')\">{$d[$i][value]}</cent>\n";
			}
		}
	}
	function get_produce_info($p_id){
		$p_id=sql_D(trim($p_id));
		if($p_id){
			$data=$this->M_get_produce_info($p_id);
			//dump($data);
			return $data;
		}else{
			return false;
		}
	}
	function p_class_switch(){
		$data=$this->M_p_class_switch();
		//dump($data);
		return $data;
	}
	function p_att_switch(){
		$data=$this->M_p_att_switch();
		//dump($data);
		return $data;
	}
	//view producce imager list
	function v_p_img(){
		$data=$this->M_imager("view");
		//dump($data);
		return $data;
	}
	function i_p_img(){
		$path=sql_D(trim($_POST['img_path']));
		$p_id=sql_D(trim($_POST['random_id']));
		$data=$this->M_imager("view",$path,$p_id);
		//dump($data);
		return $data;	
	}
	//auto_save_produce_value
	function aspv($a_n,$v_s,$p_id){
		$a_n=sql_D(trim($a_n));
		$v_s=sql_D(trim($v_s));
		$p_id=sql_D(trim($p_id));
		$data=$this->M_aspv($a_n,$v_s,$p_id);
		echo json_encode($data);
	}
	function cpcv($r_id){
		$d=$this->p_c_value($r_id);
		//dump($d);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
				echo "<xl onclick=\"cpcv_up('{$r_id}|{$d[$i][s_id]}')\">{$d[$i][value]}</xl>\n";
			}
		}
	}
	function cpcv_up($p_id,$r_id,$s_id){
		$r_id=sql_D(trim($r_id));
		$s_id=sql_D(trim($s_id));
		$p_id=sql_D(trim($p_id));
		//echo "$p_id,$r_id,$s_id";
		$data=$this->M_save_to_p_class_table($p_id,$r_id,$s_id);
		if($data){
			$d=$this->M_produce_class_name($r_id);
			$v=$this->M_get_children_value($r_id,$s_id);
			$data=array(
				's_id'=>$d['0']['s_id'],
				'state'=>"yes", 
				'msg'=>"?",
				'value'=>$v['0']['value'],
				'r_id'=>$r_id,
			);
			echo json_encode($data);
		}
	}
	function cpav($r_id){
		$d=$this->get_produce_att_xx($r_id);
		//dump($d);
		if($d){
			for($i=0;$i<=count($d)-1;$i++){
echo "<xl onclick=\"cpav_up('{$r_id}|{$d[$i][s_id]}')\">{$d[$i][value]}</xl>\n";
			}
		}
	}
	function cpav_up($p_id,$r_id,$s_id){
		$r_id=sql_D(trim($r_id));
		$s_id=sql_D(trim($s_id));
		$p_id=sql_D(trim($p_id));
		$data=$this->M_save_to_p_att_table($p_id,$r_id,$s_id);
		if($data){
			$v=$this->M_get_produce_att_xx_value($r_id,$s_id);
			$data=array(
				'state'=>"yes", 
				'msg'=>"?",
				'value'=>$v['0']['value'],
				'r_id'=>$r_id,
			);
			echo json_encode($data);
		}
	}
	function del_imager($p_id,$del_id){
		$p_id=sql_D(trim($p_id));
		$del_id=sql_D(trim($del_id));
		$data=$this->M_imager("del","",$p_id,$del_id);
		if($data){
			$d=$this->M_imager("view","",$p_id,"");
			for($i=0;$i<=count($d)-1;$i++){
echo "<im_d onDBLclick=\"im_del('{$d[$i][s_id]}')\" style=\"background-image:url({$d[$i][path]})\"></im_d>\n";
			}
		}
	}
}

?>