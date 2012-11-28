<?php	
	/*==================================================================*/
	/*		�ļ���:Install_class.php                            */
	/*		��Ҫ: ϵͳ��װ�࣬���ڰ�װ���ݵĴ���ͱ����ݵ���֤*/
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-01                                */
	/*		����޸�ʱ��:2009-05-01                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Install {
		private $process;   
		private $installFrom;
		private $messageList;

		//==========================================
		// ����:  __construct()
		// ����: ���췽�����ڳ�ʹ������ĳ�Ա����
		// ����: ��
		// ����: ��
		//==========================================
		function __construct(){
			$this->process=new Process("../config.inc.php", "lampcms.sql");
			$this->installFrom=new InstallFrom();
			$this->messageList="";
		}

		//==========================================
		// ����: exeStep($step)
		// ����: �������ð�װ��ִ�в���
		// ����: step�ǵ�ǰ��װ���������
		// ����: ��
		//==========================================
		function exeStep($step){
			switch($step) {
				case 1:
					echo $this->installFrom->getAgreement();
					break;
				case 2:
					$this->messageList='��������ı�����ȷ��д���ݿ����ӵ�������Ϣ';
					$inputs=array("DB_HOST"=>DB_HOST,
						"DB_USER"=>DB_USER,
						"DB_PWD"=>DB_PWD,
						"DB_NAME"=>DB_NAME,
						"TAB_PREFIX"=>TAB_PREFIX,
						"APP_NAME"=>APP_NAME
						);
					echo $this->installFrom->getDbFrom($this->messageList, $inputs);
					break;
				case 3:
					if(!$this->validateDbFrom($_POST)){
						echo $this->installFrom->getDbFrom($this->messageList, $_POST, "error");
					}else{
						if($this->process->configSYS($_POST)){
							$this->messageList='��������ı�����ȷ��д����Ա�˺���Ϣ';
							$inputs=array("ADMIN_USER"=>"admin",
								"ADMIN_pwd"=>"",
								"ADMIN_REPWD"=>""
							);
							echo $this->installFrom->getAdminFrom($this->messageList, $inputs);
						}else{
							echo "д�������ļ�ʧ��!!";
						}	
					}	
					break;
				case 4:
					if(!$this->validateAdminFrom($_POST)){
						echo $this->installFrom->getAdminFrom($this->messageList, $_POST, "error");
					}else{
						if($this->process->createDb($_POST)){
							$installStats=true;
						}else{
							$installStats=false;
						}
						echo $this->installFrom->getInstallMessage($this->process->getInstallInfo(), $installStats);
					}
					break;
				case 5:
					if(file_put_contents ("../install_lock.txt", "CMS INATALL OK ...")){
						echo '<script>window.location="'.APP_PATH.'"</script>';
					}
					break;

			}	
			
		}
		//==========================================
		// ����: validateDbFrom($post)
		// ����: ���������ݿ�������Ϣ�ı�������֤
		// ����: $post�Ǳ����û���������ݿ���Ϣ����������
		// ����: true��false
		//==========================================
		function validateDbFrom($post){
			$result=true;
			if(trim(($post['DB_HOST'])=="")){
				$this->messageList.="���ݿ�����������Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['DB_USER'])=="")){
				$this->messageList.="���ݿ��û�������Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['DB_PWD'])=="")){
				$this->messageList.="���ݿ����벻��Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['DB_NAME'])=="")){
				$this->messageList.="���ݿ����Ʋ���Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['TAB_PREFIX'])=="")){
				$this->messageList.="������ǰ׺����Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['APP_NAME'])=="")){
				$this->messageList.="��վ���Ʋ���Ϊ��!!<br>";
				$result=false;
			}
			if(!$result){
				return false;
			}
			if(!@mysql_connect($post['DB_HOST'],$post['DB_USER'],$post['DB_PWD'])) {
				$this->messageList.="���ݿ�����ʧ��,�����û�������!!<br>";	
				$result=false;
			}
			return $result;
		} 
		//==========================================
		// ����: validateAdminFrom($post)
		// ����: ���������Ա������Ϣ�ı�������֤
		// ����: $post�Ǳ����û�����Ĺ���Ա��Ϣ����������
		// ����: true��false
		//==========================================
		function validateAdminFrom($post){
			$result=true;
			if(trim(($post['ADMIN_USER'])=="")){
				$this->messageList.="����Ա�ʺŲ���Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['ADMIN_PWD'])=="")){
				$this->messageList.="����Ա���벻��Ϊ��!!<br>";
				$result=false;
			}
			if(trim(($post['ADMIN_REPWD'])=="")){
				$this->messageList.="�ظ���������벻��Ϊ��!!<br>";
				$result=false;
			}
			if(trim($post['ADMIN_PWD'])!=trim($post['ADMIN_REPWD'])){
				$this->messageList.="�����������벻һ��!!<br>";
				$result=false;
			}
			if(trim(($post['ADMIN_MAIL'])=="")){
				$this->messageList.="����Ա���䲻��Ϊ��!!<br>";
				$result=false;
			}elseif(!preg_match("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $post['ADMIN_MAIL'])){
				$this->messageList.="���ǺϷ��ĵ��������ʽ!!<br>";
				$result=false;
			}
			return $result;
		}

	}
?>
