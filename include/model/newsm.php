<?php
class newsm{
	private $db;
	public function __construct(){
		$this->db = new mysql();
		//$this->db=new soap_client();// 这要看虚拟主机是否支持哟
	}
	public function news($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'name'=>$d[$i]['new_class_name'],
				'random_id'=>$d[$i]['random_id'],
				'imager'=>$d[$i]['class_imager'],
				'data'=>$this->newsxx("news_xx","class_random_id='{$d[$i]['random_id']}'","system_id","10","DESC"),
				);
		}
		return $data;
	}
	public function newsxx($table,$where=false,$order=false,$limit=false,$desc=false){
		$d=$this->db->q($table,$where,$order,$limit,$desc);
		for($i=0;$i<=count($d)-1;$i++){
			$data[$i]=array(
				'name'=>$d[$i]['new_name'],
				'random_id'=>$d[$i]['random_id'],
				'send_time'=>$d[$i]['sendtime'],
				'count'=>$d[$i]['count'],
				'content'=>$d[$i]['content_body'],
				'nohtml'=>strip_tags($d[$i]['content_body']),
				'imager'=>$d[$i]['imager'],
				'l_id'=>$d[$i]['class_random_id'],
				);
		}
		return $data;
	}
}
?>