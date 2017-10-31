<?php
class securityc{
	private $m;
	function __construct(){
		$this->PM=new publicm();
		$this->P = new pubm();
	}
	public function login(){
		if($_SESSION['user']['state']==""){
			Header("Location:http://bzrdjx.com/index.php");
		}
	}
	public function checkusername($username){
		$data=$this->PM->public_select("user","$username","id","","DESC");
		if($data){
			echo json_encode(array('user_total'=>count($data),'user_state'=>$data['0']['user_state'],'user_login'=>false));
		}else{
			echo json_encode(array('user_total'=>'0','user_state'=>'2','user_login'=>false));
		}
	}
	public function logout(){
		$_SESSION['user']=null;
		$data=array('state'=>'logout');
		echo json_encode($data);
		//session_unset();
		//session_destroy();
	}
	public function check_login(){
		$username=sql_D($_POST['data']['username']);
		$password=md5(sql_D($_POST['data']['pwd']));
		$check_number=sql_D($_POST['data']['yzm']);
		echo json_encode($this->check_s($username,$password,$check_number));
	}
	public function check_s($user,$pwd,$check_number){
		if($check_number==$_SESSION['check_number']){
			$data=$this->PM->public_select("user","pwd='$pwd' && username='$user'","id","1","DESC");
			if($data){
				$department_id=$data['0']['department_id'];
				$position_id=$data['0']['position_id'];
				$rule_id=$data['0']['rule_id'];
				$userinfo_id=$data['0']['userinfo_id'];
				$_SESSION['user']=array(
					'state'=>'login',
					'username'=>$data['0']['username'],
					'user_id'=>$data['0']['id'],
					'rule_id'=>$data['0']['rule_id'],
					'department_name'=>$this->P->Appoint_value("department|id='$department_id'|id|1|DESC","department_name"),
					'position_name'=>$this->P->Appoint_value("position|id='$position_id'|id|1|DESC","position_name"),
					'name'=>$this->P->Appoint_value("userinfo|id='$userinfo_id'|id|1|DESC","name"),
					'rule_name'=>$this->P->Appoint_value("rule|id='$rule_id'|id|1|DESC","rule_name"),
					);
				return array('message'=>'okey','code'=>'1');
			}else{
				return array('message'=>'用户名或密码错误,请核对!','code'=>'0');
			}
		}else{
			return array('message'=>'验证码错误','code'=>'0');
		}
	}
	public function c_imager(){
		header("content-type:image/png");  	  //设置创建图像的格式
		$image_width=60;                      //设置图像宽度
		$image_height=26;                     //设置图像高度
		srand(microtime()*100000);         	  //设置随机数的种子
		for($i=0;$i<4;$i++){$new_number.=dechex(rand(0,15));}
		$_SESSION['check_number']=$new_number;    //将获取的随机数验证码写入到SESSION变量中     
		$num_image=imagecreate($image_width,$image_height);  //创建一个画布
		imagecolorallocate($num_image,255,255,255);     	 //设置画布的颜色
		for($i=0;$i<strlen($_SESSION['check_number']);$i++){  //循环读取SESSION变量中的验证码
		   $font=mt_rand(3,5);                            	//设置随机的字体
		   $x=mt_rand(1,8)+$image_width*$i/4;               //设置随机字符所在位置的X坐标
		   $y=mt_rand(1,$image_height/4);                   //设置随机字符所在位置的Y坐标
		   $color=imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));  	 //设置字符的颜色
		   imagestring($num_image,$font,$x,$y,$_SESSION['check_number'][$i],$color);				     //水平输出字符
		}
		imagepng($num_image);  			//生成PNG格式的图像
		imagedestroy($num_image);		//释放图像资源
	}

}
?>