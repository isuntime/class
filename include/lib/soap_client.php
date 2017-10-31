<?php
/*
使用这个功能主要是访问公司内部数据库服务器

缺点是如果动态域名停止服务 那么网站就打不开了！！！
*/
class soap_client{
	private $dbh;
	public function __construct(){
		$r_adde="http://lexun.f3322.net:7080/soap.php";
		$r_file="soap.php";
		try{
			$this->dbh = new SoapClient(NULL, array('location'=>$r_adde,'uri' =>$r_file));
		}catch(SoapFault $e){
			echo $e->getMessage();
		}catch(Exception $e){
			echo $e->getMessage(); 
		}
	}
	// function soap(){
	// 	//这一个是做验证的  但是现在不需要用 因为主要是做测试
	// 	$data=$this->dbh->web_rand(W_KEY);
	// 	if($data[state]!="no"){
	// 		return $data;
	// 	}
	// }
	function view($table=false,$where=false){
		if($where){$where="where ".$where;}
			//$data=$this->soap();
			$data['state']="ok"; //这里是做强制
		if($data['state']=="ok"){
			return $this->dbh->querys("select * from $table");
		}else{
			return false;
		}
	}
}
?>