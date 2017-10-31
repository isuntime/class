<?php
class mysql{
	private $host;
	private $user;
	private $pass;
	private $database;
	private $ut;
	function __construct(){
		$this->host=HOST_NAME;
		$this->user=DATA_USER;
		$this->pass=DATA_PASS;
		$this->database=DATA_BASE;
		$this->ut=DATA_CHER;
		$this->connect();
	}
	function connect(){
		$this->link=mysql_connect("$this->host","$this->user","$this->pass")or die(mysql_error());
		mysql_select_db("$this->database",$this->link)or die(mysql_error());
		mysql_query("SET NAMES '$this->ut'");
	}
	function query($sql){
		$this->result=mysql_query("$sql",$this->link);
		if($sql==false || $sql == "" || $this->result == false){
			return false;
		}else{
			$num=0;
			$data=array();
			while($row=mysql_fetch_array($this->result)){
				$data[$num]=$row;
				$num++; 
			}
			mysql_free_result($this->result);
			return $data;
		}
	}
	public function q($n,$s=false,$o=false,$t=false,$f=false){	  	
		if($n==""){
			$msg="正确表达式如下:<br> q(‘form name’,‘where = 1’,'order',‘20’,‘desc’);</br>q(‘user’,‘’,‘’,'',‘’)</br><font color=red >注意: 表单名称不能为空!</font>";
		}else{
			if($s != ""){ $s=" WHERE ".$s;}
			if($o != ""){ $o=" ORDER BY ".$o;}
			if($t != ""){ $t=" LIMIT ".$t;}
			if($f != ""){ $f=" ".$f." ";}         
			$this->result=mysql_query("select * from ".$n.$s.$o.$f.$t);  
			if($this->result == false){
				return false;
	  		}else{
	  			$num=0;$data=array();
				while($row=mysql_fetch_array($this->result)){
					$data[$num]=$row;$num++;
				}
			mysql_free_result($this->result);
			return $data;
			}
		}
	}	
	function insert($table,$columnName,$value,$url=''){
		if (mysql_query("INSERT INTO $table ($columnName) VALUES ($value)")){
			if (!empty ($url)){
				$msg="<script language=javascript>location.href = \"$url\"</script>";
			}else{
				return true;
			}
		}
	}
	function u($table, $mod_content, $condition, $url = '') {
//		echo "\n UPDATE $table SET $mod_content WHERE $condition";
		if (mysql_query("UPDATE $table SET $mod_content WHERE $condition")) {

			if (!empty ($url)){
				$msg="<script language=javascript>location.href = \"$url\"</script>";
			}else{
				return true;
			}
		}
	}
	function d($table, $condition, $url = ''){
		if (mysql_query("DELETE FROM $table WHERE $condition")){
			if (!empty ($url)){
				$msg="<script language=javascript>location.href = \"$url\"</script>";
			}else{
				return true;
			}
		}
	}
	function p($table,$pagesize,$other,$where,$get,$order){
		$url=$_SERVER["REQUEST_URI"];
		$url=parse_url($url);
		$url=$url[path];
		$this->url=$url;
		if($get!=""){
			$this->get=$get."&";
		}
		$this->table=$table; //table 名称
		$this->where=$where; //TABLE 的条件
		$this->order=$order;   //这个我怎么不晓得什么了啊
		$this->pagesize=$pagesize;   //每页的显示数量
		if($other==""){
			$other="1";
		}
		$this->other=$other;
		$numq=mysql_query("SELECT * FROM $this->table $this->where");
		$num = mysql_num_rows($numq);
		$this->total=$num;
		if( $this->total <= $this->pagesize ){
			$pageval=1;
		}else{
			$pageval= ceil($this->total / $this->pagesize);
			if(!intval($pageval)){
				$pageval=ceil($pageval);
			}
		} 
		$note="共计: ".$this->total." 条数据 ,  共 ".$pageval." 页 ";
		for($i=0;$i<$pageval;$i++){$a=$i+1;
			if($i-($pageval-$pageval)==0){
				$ii[$i]= "<a href=".$this->url."?".$this->get."page=".$a." > 首页</a> "; 
			}else{
				if($pageval-$a!=0){
					$ii[$i]= "<a href=".$this->url."?".$this->get."page=".$a."> 第".$a."页</a> ";
				}else{
					$ii[$i]="<a href=".$this->url."?".$this->get."page=".$a." > 末页</a> "; 
				}		
			}
		}
    	$this->ii=$ii;                          
    	$this->pageval=($this->other -1)*$this->pagesize;
    	return $note;    	
	}
	function p3(){
		return $this->ii;
	}
	function p2(){
		$result = mysql_query("select * from $this->table $this->where $this->order limit $this->pageval,$this->pagesize"); 
		if($result == false){
			return false;
		}else{
			$num=0;
			$data=array();
			while($row=mysql_fetch_array($result)){
				$data[$num]=$row;$num++;
			}mysql_free_result($result); 
			return $data;
		}
	}
}
?>