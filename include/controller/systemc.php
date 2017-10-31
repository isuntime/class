<?php
class systemc extends pubm{
    //保存数据
    public function jurisdiction_edrule($data,$where){
        $data=$_POST[$data];
        $rule_id=$where['value'];
        for($i=0;$i<=count($data)-1;$i++){
            $value.=$this->ed_arr($data[$i]['data']);
        }
        $data=substr($value,0,-1);
        if($data){
            $sql=$this->pub_sel("r_c_j_table","rule_id=$rule_id");
            if($sql){
                return $this->pub_edi("r_c_j_table","c_j_id='$data'","rule_id=$rule_id");
            }else{
                return $this->pub_ins("r_c_j_table","rule_id,c_j_id","$rule_id,'$data'");
            }
        }
    }
    public function ed_arr($data){
        for($i=0;$i<=count($data)-1;$i++){
            if($data[$i]['cedit']['state']!="false"){$d.=$data[$i]['cedit']['cjtable']."|";}
            if($data[$i]['cview']['state']!="false"){$d.=$data[$i]['cview']['cjtable']."|";}
        }
        return $d;
    }
    //解析数据
    public function jurisdiction_update($data){
        $data=pub_pg($data);
        $colm=$data['colm'];
        $value=$data['value'];
        $data=$this->pub_sel('columnlist',"p_id='0'","id","","DESC");
        if($data){
            for($i=0;$i<=count($data)-1;$i++){
                $id=$data[$i]['id'];
                $d[$i]=array(
                    'id'=>$id,
                    'p_id'=>$data[$i]['p_id'],
                    'c_name'=>$data[$i]['c_name'],
                    'data'=>$this->array_sel('columnlist',"p_id='$id'",$value),
                );    
            }
        }else{
            $d=array(
                'state'=>'error',
                'msg'=>'data null',
                );
        }
        return $d;
    }
    public function array_sel($table,$where,$rule_id){
        $d=$this->pub_sel($table,$where);
        //1 edit
        //2 view
        for($i=0;$i<=count($d)-1;$i++){
            $id=$d[$i]['id'];
            $data[$i]=array(
                'id'=>$id,
                'p_id'=>$d[$i]['p_id'],
                'c_name'=>$d[$i]['c_name'],
                'cedit'=>$this->check_r_c_j("c_j_table","column_id='$id' && j_id='1'",$rule_id),
                'cview'=>$this->check_r_c_j("c_j_table","column_id='$id' && j_id='2'",$rule_id),
            );    
        }
        return $data;
    }
    public function check_r_c_j($table,$where,$rule_id){
        if($where){
            $data=$this->pub_sel($table,$where);
            if($data){
                return array(
                    'cjtable'=>$data['0'][id],
                    'state'=>$this->check_user_rule($data['0'][id],$rule_id),
                    );
            }    
        }
    }
    public function check_user_rule($c_j_id,$rule_id){
        //return $c_j_id."|".$rule_id;
        $data=$this->pub_sel("r_c_j_table","rule_id=$rule_id");
        $data=explode("|",$data['0'][c_j_id]);
        $state=in_array($c_j_id,$data);
        if($state){
            return true;
        }else{
            return false;
        }
    }
    
}
?>