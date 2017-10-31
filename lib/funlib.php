<?php
function my_rand(){
	$i_time=time();
	for($i=0;$i<=1;$i++){
		$jj.=chr(rand(97,122));
	} 
	$jj = strtoupper($jj);
	return $i_time.$jj;
}
//echo my_rand();
//1判断为运行和关闭
function my_rand_number(){
	$i_time=time();
	return $i_time;}
function worker_id($total){
	for($i=0;$i<=$total;$i++){
		$j.=ucwords(chr(rand(97,122)));
	}
	$i_time=time();
	return "RD".substr($i_time,3).$j;
}
//连接如本本目录文件
function sql_D(&$str){
    $farr = array(
            "/<(\\/?)(script|i?frame|style|html|body|title|link|meta|object|\\?|\\%)([^>]*?)>/isU",
            "/(<[^>]*)on[a-zA-Z]+\s*=([^>]*>)/isU",
            "/select\b|insert\b|update\b|delete\b|drop\b|;|\"|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile|dump/is"
        );
        $str = preg_replace($farr,'',$str);
        $str = strip_tags($str);
        return $str;
}
function load_myfile($filename,$mypach){
	if($filename==false && $mypach!=false){
	     $php_self=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
		 $php_self=$mypach."/".$php_self;
	}else if($filename!=false && $mypach==false){ 
		 $php_self=$filename;
	}else{$php_self=$mypach."/".$filename;}
	return $php_self;
	}	
function  send_info(){
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
		$ip = getenv("REMOTE_ADDR");
	} else if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}else{
		$ip="unknown";
	}
	$send_data=date("Y-m-d");
	$send_time=date("h-i-s");
	$page_my=$_SERVER[PHP_SELF];
 	return $send_info=$ip."|".$send_data."|".$send_time."|".$page_my;
}
function  my_order(){
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	} else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) {
		$ip = getenv("REMOTE_ADDR");
	} else if (isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip = "unknown";
	}
	$send_data=date("Ymd");
	$send_time=date("his");
	for($i=0;$i<=2;$i++){
		$d=rand(65,90);$b = chr($d);
		$x=rand(65,90); $c = chr($x);
		$jj=$b.$c;
 	}
 	return "ST".$send_data.$send_time."-".$jj;
}
function  my_ip(){
	if(getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")){
		$ip = getenv("HTTP_CLIENT_IP");
	}else if(getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")){
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	}else if(getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")){
		$ip = getenv("REMOTE_ADDR");
	}else if(isset ($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
		$ip = $_SERVER['REMOTE_ADDR'];
	}else{
		$ip = "unknown";
	}
return $ip;
}

function my_url($file_name,$my_get){
	 $my_array=explode("&",$_SERVER[QUERY_STRING]);	//获取链接后面的参数
	 $my_get=trim($my_get);
     if(in_array($my_get,$my_array)){ 	//判断my_get参数是否在链接参数里面
    	 $my_url=$file_name."?".$_SERVER[QUERY_STRING]; 
     }else{	     
         $long=explode("=",$my_get); 	//分解my_get参数
		 $lo=$long[0]; 					//myget参数的名称
		 for($i=0;$i<=count($my_array)-1;$i++){		
		    $my_arra=explode("=",$my_array[$i]);	//$my_arr是每一个链接参数
		    if(in_array($lo,$my_arra)){
				//如果他存在的话 就直接保存 那么不存在的话 就可以直接在后面加一个咯 
   			     $my_arra = array(
					'0'=>$long[0],
					'1'=>$long[1]);
				 $my_array[$i] = implode("=",$my_arra);		
				 $state =  1;	  
				 //$my_url=$file_name."?".$_SERVER[QUERY_STRING];
			}
		 }
		if($state ==1 ){
			$my_url=$file_name."?".implode("&",$my_array);
		}else{
			$my_url=$file_name."?".implode("&",$my_array)."&".$my_get;
		}
	}
     return $my_url;
}
function up_myfile($my_file){
	if (is_uploaded_file($my_file['tmp_name'])){
		$upfile=$my_file;
		$name ="JM".date('Ymdhis').createRandomStr(2);
		$type = $upfile["type"];
		$size = $upfile["size"];
		$tmp_name = $upfile["tmp_name"];
		$error = $upfile["error"];
		switch ($type) {
			case 'image/pjpeg' : 
				$ok=1;
			break;
			case 'image/jpeg'  : 
				$ok=1;
			break;
			case 'image/gif'   : 
				$ok=1;
			break;
	  		case 'image/png'   :
	  			 $ok=1;
			break;
		}
		if($ok && $error=='0'){
			sleep(1);
			move_uploaded_file($tmp_name,'../upfile/'.$name.".jpg");
			$action['file'] = $filename="../upfile/".$name.".jpg";
			return $action;
		}
	}else{
		return $my_file;
	}
}
function createRandomStr($length){ 
	$str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$strlen = 62; 
	while($length > $strlen){ 
		$str .= $str; 
		$strlen += 62; 
	} 
	$str = str_shuffle($str); 
	return substr($str,0,$length); 
}

// 发送邮件   $mail_subject 为邮件的标题 另外一个就是邮件的内容咯
function sendmail($mailsubject,$mailbody,$smtpemailto){
	require_once ('email.class.php');
	$smtpserver = "mail.sintian.cn";            //SMTP服务器
	$smtpserverport =25;                        //SMTP服务器端口
	$smtpusermail = "admin@sintian.cn";         //SMTP服务器的用户邮箱
	// $smtpemailto = "50777513@qq.com";        //发送给谁
	$smtpuser = "admin@sintian.cn";             //SMTP服务器的用户帐号
	$smtppass = "123456a";                      //SMTP服务器的用户密码
	$mailtype = "HTML";                         //邮件格式（HTML/TXT）,TXT为文本邮件
	##########################################
	//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp->debug = false;//是否显示发送的调试信息
 	 $sendmail=$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
  	if($sendmail){
  		return true;
  	}else{
  		return false;
  	}
}                              
function send_mobile2($moble,$mbody){
	$maildomain="hongpuxin.com";                 
	$mailpwd="sintianadmin";    
	$sendport="1";                               
	$sendmobile=$moble;                           
    $sendcontent=$mbody;                        
    if($maildomain!="" && $mailpwd!="" && $sendmobile !="" && $sendcontent !="" ){
    	$key=md5($maildomain.$mailpwd);
        $url="http://usericp.west263.cn/default.aspx"; 
        $data=array('mobile'=>$sendmobile,
			'sendcontent'=>mb_convert_encoding($sendcontent, "UTF-8", "auto"),
			'port'=>$sendport,
			'maildomain'=>$maildomain,
			'key'=>$key);
       $data=http_build_query($data);
       $opts=array('http'=>array('method'=>'POST',
			'header'=>"Content-type: application/x-www-form-urlencoded\r\n"."Content-Length:".strlen($data)."\r\n",  
			'content'=>$data),);  
			$context=stream_context_create($opts);  
			$html=file_get_contents($url,false,$context);		
			$result=iconv("UTF-8","gb2312",$html); 
         if($result=="200 ok"){
	         return true;
         }else{
	         return false;
		}             
    }else{
    	return false;
    }
}
function get_file_name($lost=false){
	$path=$_SERVER[PHP_SELF];
	if($lost==""){
		return basename($path,".php").".html";
	}else{
	    return basename($path,".php").$lost;
	}
}
// 这个方法用来做百度地图的初步筛选功能哟!
function dump($vars, $label = '', $return = false) {
        	if (ini_get('html_errors')) {
            	$content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            	}
				$content .= htmlspecialchars(print_r($vars, true));
				$content .= "\n</pre>\n";
			} else {
				$content = $label . " :\n" . print_r($vars, true);
			}
			if ($return) { return $content; } echo $content; return null;
    	}
function where_in($column='1',$arr,$index=0){
	$where=null;
	if($arr && $column!='1'){
		$where = "$column in (";
		for ($j = 0; $j < count($arr); $j++) { 
			$where .= "'".$arr[$j][$index]."'".",";
		}
		$where = substr($where,0,-1);
		$where.=")";
	}
	return $where;
}
function resText($object,$content){
  $xmlText="<xml>
                  <ToUserName><![CDATA[%s]]></ToUserName>
                  <FromUserName><![CDATA[%s]]></FromUserName>
                  <CreateTime>%s</CreateTime>
                  <MsgType><![CDATA[%s]]></MsgType>
                  <Content><![CDATA[%s]]></Content>
                  </xml>";
     $resultStr=sprintf($xmlText,$object->FromUserName,$object->ToUserName,time(),$object->MsgType,$content);
  echo $resultStr; 
  exit();
}
function http_post_data($url,$data){ // 模拟提交数据函数
	$curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)'); // 模拟用户使用的浏览器
    // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    // curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer
    curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); // Post提交的数据包
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); // 获取的信息以文件流的形式返回
    $tmpInfo = curl_exec($curl); // 执行操作
    if (curl_errno($curl)) {
       echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl); // 关闭CURL会话
    return $tmpInfo; // 返回数据
}
function b_edis($input_name,$value,$Height,$Weight,$intro){
		$Height=if_is($Height,"100");
		$Weight=if_is($Weight,"300");
        $one="        <script id='$intro' name='$input_name' type='text/plain'>$value</script>\n";
        $one.="        <script type='text/javascript'>var ue = UE.getEditor('$intro', { initialFrameHeight:$Height,initialFrameWidth:$Weight });</script>\n";
	    echo  $one;
}
function b_edit($input_name,$value,$Height,$Weight,$pach){
		$Height=if_is($Height,"100");
		$Weight=if_is($Weight,"300");
		$pach=if_is($pach,"");
        $one="        <script type='text/javascript' src='".$pach."ueditor/ueditor.config.js'></script>\n";
        $one.="        <script type='text/javascript' src='".$pach."ueditor/ueditor.all.min.js'></script>\n";
        $one.="        <script id='intro' name='$input_name' type='text/plain'>$value</script>\n";
        $one.="        <script type='text/javascript'>var ue = UE.getEditor('intro', { initialFrameHeight:$Height,initialFrameWidth:$Weight });</script>\n";
	    echo  $one;
}
function if_is($one,$tdata){
	if($one){
		return $one;
	}else{
		return $tdata;
	}
}
function if_iss($one,$odata,$tdata){
	if($one=="true"){
		return $odata;
	}else{
		return $tdata;
	}
}
function ifs($data){
	if($data=="1"){
		$data="0";
	}else{
		$data=="1";
	}
	return $data;
}
function if_iis($one,$odata,$tdata){
	if($one!=''){
		return $odata;
	}else{
		return $tdata;
	}
}
function i_is($data){
	if($data==1 || $data=="true"){
		return true;
	}else{
		return false;
	}
}
function load_tpl($filename=false){    
	if($filename == false){
		$php_self=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
		//$array=explode(".",$php_self);
		//$tpl=array(0=>"tpl");
		}		
	return include_once("tpl/".$php_self); 
}
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
        if($suffix){
            return mb_substr($str, $start, $length, $charset);
        }else{
            return mb_substr($str, $start, $length, $charset);
        }
    }elseif(function_exists('iconv_substr')) {
        if($suffix){
            return iconv_substr($str,$start,$length,$charset);
        }else{
            return iconv_substr($str,$start,$length,$charset);
        }
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix){ 
        return $slice;
    }else{
        return $slice;
    }
}
function num2rmb($number = 0, $int_unit = '元', $is_round = TRUE, $is_extra_zero = FALSE) 
{ 
    // 将数字切分成两段 
    $parts = explode('.', $number, 2); 
    $int = isset($parts[0]) ? strval($parts[0]) : '0'; 
    $dec = isset($parts[1]) ? strval($parts[1]) : ''; 
 
    // 如果小数点后多于2位，不四舍五入就直接截，否则就处理 
    $dec_len = strlen($dec); 
    if (isset($parts[1]) && $dec_len > 2) 
    { 
        $dec = $is_round 
                ? substr(strrchr(strval(round(floatval("0.".$dec), 2)), '.'), 1) 
                : substr($parts[1], 0, 2); 
    } 
 
    // 当number为0.001时，小数点后的金额为0元 
    if(empty($int) && empty($dec)) 
    { 
        return '零'; 
    } 
 
    // 定义 
    $chs = array('0','壹','贰','叁','肆','伍','陆','柒','捌','玖'); 
    $uni = array('','拾','佰','仟'); 
    $dec_uni = array('角', '分'); 
    $exp = array('', '万'); 
    $res = ''; 
 
    // 整数部分从右向左找 
    for($i = strlen($int) - 1, $k = 0; $i >= 0; $k++) 
    { 
        $str = ''; 
        // 按照中文读写习惯，每4个字为一段进行转化，i一直在减 
        for($j = 0; $j < 4 && $i >= 0; $j++, $i--) 
        { 
            $u = $int{$i} > 0 ? $uni[$j] : ''; // 非0的数字后面添加单位 
            $str = $chs[$int{$i}] . $u . $str; 
        } 
        //echo $str."|".($k - 2)."<br>"; 
        $str = rtrim($str, '0');// 去掉末尾的0 
        $str = preg_replace("/0+/", "零", $str); // 替换多个连续的0 
        if(!isset($exp[$k])) 
        { 
            $exp[$k] = $exp[$k - 2] . '亿'; // 构建单位 
        } 
        $u2 = $str != '' ? $exp[$k] : ''; 
        $res = $str . $u2 . $res; 
    } 
 
    // 如果小数部分处理完之后是00，需要处理下 
    $dec = rtrim($dec, '0'); 
 
    // 小数部分从左向右找 
    if(!empty($dec)) 
    { 
        $res .= $int_unit; 
 
        // 是否要在整数部分以0结尾的数字后附加0，有的系统有这要求 
        if ($is_extra_zero) 
        { 
            if (substr($int, -1) === '0') 
            { 
                $res.= '零'; 
            } 
        } 
 
        for($i = 0, $cnt = strlen($dec); $i < $cnt; $i++) 
        { 
            $u = $dec{$i} > 0 ? $dec_uni[$i] : ''; // 非0的数字后面添加单位 
            $res .= $chs[$dec{$i}] . $u; 
        } 
        $res = rtrim($res, '0');// 去掉末尾的0 
        $res = preg_replace("/0+/", "零", $res); // 替换多个连续的0 
    } 
    else 
    { 
        $res .= $int_unit . '整'; 
    } 
    return $res; 
} 
function pub_pg($data,$times=false){
	$data=if_is($_POST[$data],$_GET[$data]);
	if($data) {
		foreach($data as $c => $v) {
			if($c!=''){
				$c=sql_D($c);
				if($c=="pwd"){
					$v=md5($v);
				}else{
					$v=sql_D($v);
				}
				$colm.=$c.",";
				$value.="'".$v."',";
			}
		}
	if($times!=null){
		$colm.="c_time,";
		$value.="'".time()."',";
	}
	$data=array(
		'colm'=>substr($colm,0,-1),
		'value'=>substr($value,0,-1),
	);
	return $data;
	}
}
function pub_pge($data,$where){
	$data=if_is($_POST[$data],$_GET[$data]);
	$where=if_is($_POST[$where],$_GET[$where]);
    if($data){
		foreach($data as $c => $v) {
			if($c!=''){
				$c=sql_D($c);
				if($c=="pwd"){
					$v=md5($v);
				}elseif($c=="pay_time"){
					$v=time();
				}else{
					$v=sql_D($v);
				}
				$data = $c . "='" . $v . "'";
				$datas .= $data. ",";
			}
		}
	}
	if($where) {
		foreach ($where as $c => $v) {
			if($c!='') {
				$c=trim(sql_D($c));
				$v=trim(sql_D($v));
				$where = $c . "='" . $v . "'";
				$wheres .= $where . " & ";
			}
		}
	}
	$data=array(
		'data'=>substr($datas,0,-1),
		'where'=>substr($wheres,0,-3),
	);
	return $data;
}
function pub_pgw($where){
	$where=if_is($_POST[$where],$_GET[$where]);
	if($where) {
		foreach ($where as $c => $v) {
			if($c!='' && $v!=''){
				$c=trim(sql_D($c));
				$v=trim(sql_D($v));
				$where = $c . "='" . $v . "'";
				$wheres .= $where . " && ";
			}
		}
	}
	return substr($wheres,0,-4);
}
function pub_pgi($data,$imager=false,$times=false){
	//i=imager
    $data=if_is($_POST[$data],$_GET[$data]);
        if($data) {
            foreach($data as $c => $v) {
                if($c!=''){
                    $c=sql_D($c);
                    if($c==$imager){
                    	$v=up_myfile($c);
                    }elseif($c=="testtime"){
                    	$v=time($v);
                    }elseif($c=="order_id"){
                    	$v=time();
                    }else{
                    	$v=sql_D($v);
                    }
                    if($v==''){
                    	contiune;
                    }
                    $colm.=$c.",";
                    $value.="'".$v."',";
                	}
            }
            if($times!=null){
            	$colm.="c_time,";
            	$value.="'".time()."',";
            }
            $data=array(
            	'colm'=>substr($colm,0,-1),
            	'value'=>substr($value,0,-1),
            	);
            return $data;
        }
}
function pub_pga($data){
    	$data=if_is($_POST[$data],$_GET[$data]);
        if($data){
            foreach($data as $c => $v) {
				$c=sql_D($c);
				switch ($c) {
					case 'pwd':
						$v=md5($v);
					break;
					case 'worker_id':
						$v=worker_id('2');
					break;
					case "testtime":
						$v=time($v);
					break;
					case "order_id":
						$v=time();
					break;
					case "reg_time":
						$v=time();
					break;
					case "c_time":
						$v=time();
					break;
					case "student_id":
						$v=file_get_contents("http://bzrdjx.com/public.php?model=get_student_id");
					break;
					default:
						$v=sql_D($v);
					break;
				}
                $colm.=$c.",";
                $value.="'".$v."',";
            }
            $data=array(
            	'colm'=>substr($colm,0,-1),
            	'value'=>substr($value,0,-1),
            	);
            return $data;
        }
}
?>