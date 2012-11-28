<?php
	/*==================================================================*/
	/*		�ļ���:SysInfo.class.php                            */
	/*		��Ҫ: ϵͳ��Ϣ������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class SysInfo {
		private $mydb;
		private $gd;
		private $serverEnv;
		private $domainName;
		private $phpVersion;
		private $gdInfo;
		private $freeType;
		private $mysqlVersion;
		private $allowUrl;
		private $fileUpload;
		private $dbSize;
		private $maxExeTime;

		function __construct($db){
			$this->mydb=$db;
			$this->serverEnv =$this->getServerEnv();
			$this->domainName = $this->getDomainName();
			$this->phpVersion = $this->getPhpVersion();
			$this->gdInfo = $this->getGdInfo();
			$this->freeType = $this->getFreeType();
			$this->mysqlVersion = $this->getMysqlVersion();
			$this->allowUrl = $this->getAllowUrl();
			$this->fileUpload = $this->getFileUpload();
			$this->dbSize = $this->getDbSize();
			$this->maxExeTime = $this->getMaxExeTime();
		}

		private function getServerEnv() {
			return PHP_OS.' | '.$_SERVER['SERVER_SOFTWARE'];
		}

		private function getDomainName() {
			return $_SERVER['SERVER_NAME'];
		}

		private function getPhpVersion() {
			return PHP_VERSION;
		}

		private function getGdInfo() {
			if(function_exists('gd_info')){
				$this->gd = gd_info();
				$gdInfo = $this->gd['GD Version'];
			}else {
				$gdInfo = '<span class="red_font">δ֪</span>';
			}
			return $gdInfo;
		}

		private function getFreeType() {
			if($this->gd["FreeType Support"])
				return '֧��';
			else
				return '<span class="red_font">��֧��</span>';
		}

		private function getMysqlVersion() {
			return  $this->mydb->getVersion();
		}

		private function getAllowUrl() {
			if(@ini_get('allow_url_fopen'))
				return '֧��';
		        else
				return '<span class="red_font">��֧��</span>';
		}

		private function getFileUpload() {
			if(@ini_get('file_uploads')){
				$umfs = ini_get('upload_max_filesize');
				$pms = ini_get('post_max_size');
   				return '���� | �ļ�:'.$umfs.' | ����'.$pms;
			}else{
				return '<span class="red_font">��ֹ</span>';
			}
		}

		private function getDbSize() {
			return Common::sizeCount($this->mydb->getDBSize(DB_NAME, TAB_PREFIX));
		}

		private function getMaxExeTime() {
			return ini_get('max_execution_time').'��';
		}
		
		public function getSysInfos() {
			$infos=array(
				"����������:" => $this->serverEnv,
				"����:" => $this->domainName,
				"PHP�汾:" => $this->phpVersion,
				"GD��汾:" => $this->gdInfo,
				"FreeType:" => $this->freeType,
				"MYSQL�汾:" => $this->mysqlVersion,
				"Զ���ļ���ȡ:" => $this->allowUrl,
				"�ļ��ϴ�:" => $this->fileUpload,
				"���ݿ�ʹ��:" => $this->dbSize,
				"�ű����ִ��ʱ��"=> $this->maxExeTime
			);
			return $infos;
		}	
	}
?>
