<?php
class newsc{
	private $m;
	private $filename;
	function __construct() {
		$this->m = new newsm();
	}
	public function news(){
		$data=$this->m->news("news");
		return $data;
	}
	public function news_content($id){
		$data=$this->m->newsxx("news_xx","random_id='{$id}'","system_id","","DESC");
		//dump($_SERVER);
		return $data;
	}
	public function news_fun($action){
		switch ($action) {
			case 'content':
				$id=sql_D($_GET['id']);
				$data=$this->m->newsxx("news_xx","random_id='{$id}'","system_id","","DESC");
				$this->filename="news_xx.html";
				$this->l_id=$data['0'][l_id];
				return $data;
			break;
			case 'class':
				$this->filename="news.html";
				$id=sql_D(if_is($_GET['l_id'],$_POST['l_id']));
				$data=$this->m->news("news","random_id='{$id}'","system_id","","DESC");
				return $data;
			break;
			case 'news_xx':
				$id=sql_D(if_is($_GET['l_id'],$_POST['l_id']));
				if($id){
					$where="class_random_id='{$id}'";
					$data=$this->m->newsxx("news_xx",$where,"system_id","","DESC");
					return $data;
				}
			break;
			case "allnews":
				$data=$this->m->newsxx("news_xx","","system_id","","DESC");
				//dump($data);
				return $data;
			break;
			default:
				exit();
				break;
		}
	}
	public function newsclas(){
		$data=$this->m->news("news","random_id='{$this->l_id}'","system_id","","DESC");
		return $data;
	}
	public function callback(){
		return $this->filename;
	}
}
?>