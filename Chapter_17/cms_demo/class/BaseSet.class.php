<?php
	/*==================================================================*/
	/*		�ļ���:BaseSet.class.php                            */
	/*		��Ҫ: ϵͳ����������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class BaseSet {
		private $messList;

		//==========================================
		// ����: __construct()
		// ����:���ڶԱ����Ա���Խ��г�ʹ��
		// ����:��
		// ����: ��
		//==========================================	
		function __construct(){
			$messList=array();
		}

		//==========================================
		// ����: getSet()
		// ����: ��ȡ��Ҫ���õ���Ϣ����
		// ����: ��
		// ����: ��Ҫ��ϵͳ�������õ�ѡ������
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
		// ����: validateForm($post)
		// ����: ��ϵͳ�������ñ������ݽ�����֤
		// ����: post���û��ύ�Ļ������ñ�����
		// ����: true��false
		//==========================================
		//��֤��ҳ���ĺ���
		function validateForm($post) {
			$result=true;
			//����ȫ�ֱ��� 
			if(!Validate::isNumber($post['articlePageSize'])){
				$this->messList[] = "����ÿҳ��ʾ��Ŀ��������.";
				$result=false;
			}
			if(!Validate::isNumber($post['picturePageSize'])){
				$this->messList[] = "ͼƬÿҳ��ʾ��Ŀ��������.";
				$result=false;
			}
			if($post['articlePageSize'] <= 0) {
				$this->messList[] = "����ÿҳ��ʾ��Ŀ���������.";
				$result=false;
			}
			if($post['picturePageSize'] <= 0){
				$this->messList[] = "ͼƬÿҳ��ʾ��Ŀ���������.";
				$result=false;
			}
			if(!Validate::required($post['waterText1']) || !Validate::required($post['waterText2'])){
				$this->messList[] = "ˮӡ���ֲ���Ϊ��.";
				$result=false;
			}
			if(!Validate::isNumber($post['width']) || !Validate::isNumber($post['height'])) {
				$this->messList[] =  "����ͼ�ߴ粻������.";
				$result=false;
			}
			if(!Validate::isNumber($post['maxWidth']) || !Validate::isNumber($post['maxHeight']))	{
				$errorList[] =  "ͼƬ�ϴ�������ߴ粻������.";
				$result=false;
			}	
			if($post['width'] <= 0 || $post['height'] <= 0){
				$this->messList[] =  "ͼ����ͼ�ߴ���������.";
				$result=false;
			}
			if($post['maxWidth'] <= 0 || $post['maxHeight'] <= 0) {
				$this->messList[] = "ͼƬ�ϴ�������ߴ���������.";
				$result=false;
			}
			return  $result;
		}	

		//==========================================
		// ����: writeConfig($fileName,$post)
		// ����: ���ڽ��û������������Ϣ��д�����ļ�
		// ����: fileName�������ļ������ƣ�����Ҫ���õ���������
		// ����: true��false
		//==========================================
		function writeConfig($fileName,$post){
			$confile=CMS_ROOT.$fileName;
			if(file_exists($confile)){
				$configText = file_get_contents($confile);
			}else{
				$this->messList[]="�����ļ�������.";
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
				$this->messList[]="�����ݴ���Ϊ��.";
				return false;
			}

	
			//ѭ���޸�����
			foreach($configArray as $key => $val) {
				$regV = "/$key\s*=\s*.+;/";		//�������ò���
				$regC = "/define\(\"$key\".+;/";	//�������ò���
	
				if(preg_match($regV, $configText)) {
					$configText = preg_replace($regV, $key." = ".$val, $configText);
				}else{
					if(!Validate::isNumber($val)) {	//�ַ�����������
						$val = "\"$val\"";
					}
					$configText = preg_replace($regC, "define(\"$key\", $val);", $configText);
				}
			}

			if($fp = fopen($confile, "w")) {
				fwrite($fp, $configText);
				fclose($fp);
				$this->messList[]="���������޸ĳɹ�.";
				return true;
			}else{
				$this->messList[]="���������޸�ʧ��,������.";
				return false;
			}
		}


		//==========================================
		// ����: getMessList()
		// ����: ��ȡ���󱨸�����
		// ����: ��
		// ����: ���󱨸���Ϣ��ʾ����
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
