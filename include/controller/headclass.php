<?php
class headclass{
	private $head;
	public function __construct(){
		$this->css_name=CSS_NAME;
		$this->css_pach=CSS_PATH;
		$this->js_name=JS_NAME;
		$this->js_path=JS_PATH;
		$this->webname=WEBNAME;
		$this->title_t=TITLE_T;
		$this->key_1=KEY_1;
		$this->key_2=KEY_2;
	}
	public function my_head($css,$js,$layer=false,$edit=false){
		echo "<!DOCTYPE HTML>\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "	<meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>\n";
		echo "	<meta http-equiv='X-UA-Compatible' content='IE=Edge,chrome=1'/>\n";
		echo "	<title>{$this->webname} | {$this->title_t}</title>\n";
		echo "	<meta name='keywords' content='{$this->key_1}'>\n";
		echo "	<meta name='description' content='{$this->key_2}'>\n";
		$css_name=explode("|",trim($css));
		if(count($css_name)>=1){
			echo "	<style type='text/css'>\n";
			if($this->css_name!=false){
				echo "		@import url({$this->css_pach}{$this->css_name});\n";
			}
			for($i=0;$i<=count($css_name)-1;$i++){
				echo "		@import url({$this->css_pach}{$css_name[$i]});\n";
			}
			echo "	</style>\n";
		}
		// JS 文件控制
		if($edit!=false){
			echo "	<script type='text/javascript' src='../ueditor/ueditor.config.js'></script>\n";
			echo "	<script type='text/javascript' src='../ueditor/ueditor.all.min.js'></script>\n";
		}
		if($this->js_name!=false){
			echo "	<script type='text/javascript' src='{$this->js_path}{$this->js_name}'></script>\n";
		}
		$js_name=explode("|",trim($js));
		if(count($js_name)>=1){
			for($i=0;$i<=count($js_name)-1;$i++){
				echo "	<script type='text/javascript' src='{$this->js_path}{$js_name[$i]}'></script>\n";
			}
		}
		if($layer!=false){
			echo "	<script type='text/javascript' src='".TPL."layer/layui.js'></script>\n";
		}
		echo "</head>\n";
		echo "<body >";
	}
} 
?>