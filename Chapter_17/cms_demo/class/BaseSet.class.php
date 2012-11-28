<?php
	/*==================================================================*/
	/*		文件名:BaseSet.class.php                            */
	/*		概要: 系统基本设置类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class BaseSet {
		private $messList;

		//==========================================
		// 函数: __construct()
		// 功能:用于对本类成员属性进行初使化
		// 参数:无
		// 返回: 无
		//==========================================	
		function __construct(){
			$messList=array();
		}

		//==========================================
		// 函数: getSet()
		// 功能: 获取需要设置的信息数组
		// 参数: 无
		// 返回: 需要对系统进行设置的选择数组
		//==========================================
		function getSet(){
			global $styleList,$waterText,$pictureSize,$thumbSize;
			$varList = array("selectStyle"		=> $styleList,
					 "appStyle"		=> APP_STYLE,
					 "articlePageSize"	=> ARTICLE_PAGE_SIZE,
					 "picturePageSize"	=> PICTURE_PAGE_SIZE,	
					 "pictureShowType"	=> PICTURE_SHOW_TYPE,
					 "waterText1"		=> $waterText[0],
					 "waterText2"		=> $waterText[1],
					 "width"		=> $thumbSize["width"],
					 "height"		=> $thumbSize["height"],
					 "maxWidth"		=> $pictureSize["maxWidth"],
					 "maxHeight"		=> $pictureSize["maxHeight"]
				 );
			return $varList;
		}

		//==========================================
		// 函数: validateForm($post)
		// 功能: 对系统基本设置表单的内容进行验证
		// 参数: post是用户提交的基本设置表单内容
		// 返回: true或false
		//==========================================
		//验证本页表单的函数
		function validateForm($post) {
			$result=true;
			//载入全局变量 
			if(!Validate::isNumber($post['articlePageSize'])){
				$this->messList[] = "文章每页显示数目不是数字.";
				$result=false;
			}
			if(!Validate::isNumber($post['picturePageSize'])){
				$this->messList[] = "图片每页显示数目不是数字.";
				$result=false;
			}
			if($post['articlePageSize'] <= 0) {
				$this->messList[] = "文章每页显示数目必须大于零.";
				$result=false;
			}
			if($post['picturePageSize'] <= 0){
				$this->messList[] = "图片每页显示数目必须大于零.";
				$result=false;
			}
			if(!Validate::required($post['waterText1']) || !Validate::required($post['waterText2'])){
				$this->messList[] = "水印文字不能为空.";
				$result=false;
			}
			if(!Validate::isNumber($post['width']) || !Validate::isNumber($post['height'])) {
				$this->messList[] =  "缩略图尺寸不是数字.";
				$result=false;
			}
			if(!Validate::isNumber($post['maxWidth']) || !Validate::isNumber($post['maxHeight']))	{
				$errorList[] =  "图片上传后的最大尺寸不是数字.";
				$result=false;
			}	
			if($post['width'] <= 0 || $post['height'] <= 0){
				$this->messList[] =  "图缩略图尺寸必须大于零.";
				$result=false;
			}
			if($post['maxWidth'] <= 0 || $post['maxHeight'] <= 0) {
				$this->messList[] = "图片上传后的最大尺寸必须大于零.";
				$result=false;
			}
			return  $result;
		}	

		//==========================================
		// 函数: writeConfig($fileName,$post)
		// 功能: 用于将用户输入的设置信息改写配置文件
		// 参数: fileName是配置文件的名称，和需要设置的内容数组
		// 返回: true或false
		//==========================================
		function writeConfig($fileName,$post){
			$confile=CMS_ROOT.$fileName;
			if(file_exists($confile)){
				$configText = file_get_contents($confile);
			}else{
				$this->messList[]="配置文件不存在.";
				return false;
			}

			if(!empty($post)){
				$configArray['APP_STYLE'] = $post['appStyle'];
				$configArray['ARTICLE_PAGE_SIZE'] = $post['articlePageSize'];
				$configArray['PICTURE_PAGE_SIZE'] = $post['picturePageSize'];
				$configArray['PICTURE_SHOW_TYPE'] = $post['pictureShowType'];

				$configArray["waterText"] = "array('{$post['waterText1']}', '{$post['waterText2']}');";
				$configArray["pictureSize"] = "array('maxWidth' => {$post['maxWidth']}, 'maxHeight' => {$post['maxHeight']});";
				$configArray["thumbSize"] = "array('width' => {$post['width']}, 'height' => {$post['height']});";

			}else{
				$this->messList[]="表单数据传递为空.";
				return false;
			}

	
			//循环修改配置
			foreach($configArray as $key => $val) {
				$regV = "/$key\s*=\s*.+;/";		//变量配置参数
				$regC = "/define\(\"$key\".+;/";	//常量配置参数
	
				if(preg_match($regV, $configText)) {
					$configText = preg_replace($regV, $key." = ".$val, $configText);
				}else{
					if(!Validate::isNumber($val)) {	//字符串加上引号
						$val = "\"$val\"";
					}
					$configText = preg_replace($regC, "define(\"$key\", $val);", $configText);
				}
			}

			if($fp = fopen($confile, "w")) {
				fwrite($fp, $configText);
				fclose($fp);
				$this->messList[]="基本设置修改成功.";
				return true;
			}else{
				$this->messList[]="基本设置修改失败,请重试.";
				return false;
			}
		}


		//==========================================
		// 函数: getMessList()
		// 功能: 获取错误报告数组
		// 参数: 无
		// 返回: 错误报告信息提示数组
		//==========================================
		function getMessList(){
			$message="";
			if(!empty($this->messList)){
				foreach($this->messList as $value){
					$message.=$value."<br>";
				}
			}
			return $message; 	
		}
	}
?>
