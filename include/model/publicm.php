<?php
class publicm{
	private $db;
	public function __construct(){
		$this->db = new mysql();
	}
	public function department($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'id' =>$d[$i]['id'],
				'random_id' =>$d[$i]['rand_id'],
				'department_name'=>$d[$i]['department_name'],
				);
		}
		return $data;
	}
	public function position($table,$where=false,$order=false,$limit=false,$desc=false){
//	    echo $where;
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'id' =>$d[$i]['id'],
				'random_id' =>$d[$i]['department_id'],
				'position_name'=>$d[$i]['position_name'],
				);
		}
		return $data;
	}
	public function rule($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'id' =>$d[$i]['id'],
				'random_id' =>$d[$i]['rand_id'],
				'rule_name'=>$d[$i]['rule_name'],
                'rule_state'=>$d[$i]['rule_state'],
				);
		}
		return $data;
	}
    public function userinfo($table,$where=false,$order=false,$limit=false,$desc=false){
        $d=$this->db->q($table,$where,$order,$limit,$desc);
        for($i=0;$i<=count($d)-1;$i++){
            $data[$i]=array(
                'id' =>$d[$i]['id'],
                'random_id' =>$d[$i]['rand_id'],
                'name'=>$d[$i]['name'],
                'worker_id' =>$d[$i]['worker_id'],
                'phone' =>$d[$i]['phone'],
                'sex'=>$d[$i]['sex'],
                'nation' =>$d[$i]['nation'],
                'adress' =>$d[$i]['adress'],
                'national_id'=>$d[$i]['national_id'],
                'regtime' =>$d[$i]['regtime'],
                'outtime' =>$d[$i]['outtime'],
            );
        }
        return $data;
    }
	public function public_select($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		return $d;
	}
}
?>