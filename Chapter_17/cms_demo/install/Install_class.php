<?php	
	/*==================================================================*/
	/*		文件名:Install_class.php                            */
	/*		概要: 系统安装类，用于安装内容的处理和表单内容的验证*/
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-01                                */
	/*		最后修改时间:2009-05-01                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Install {
		private $process;   
		private $installFrom;
		private $messageList;

		//==========================================
		// 函数:  __construct()
		// 功能: 构造方法用于初使化对象的成员属性
		// 参数: 无
		// 返回: 无
		//==========================================
		function __construct(){
			$this->process=new Process("../config.inc.php", "lampcms.sql");
			$this->installFrom=new InstallFrom();
			$this->messageList="";
		}

		//==========================================
		// 函数: exeStep($step)
		// 功能: 用于设置安装的执行步骤
		// 参数: step是当前安装步骤的数字
		// 返回: 无
		//==========================================
		function exeStep($step){
			switch($step) {
				case 1:
					echo $this->installFrom->getAgreement();
					break;
				case 2:
					$this->messageList='请在下面的表单中正确填写数据库连接的配置信息';
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
							$this->messageList='请在下面的表单中正确填写管理员账号信息';
							$inputs=array("ADMIN_USER"=>"admin",
								"ADMIN_pwd"=>"",
								"ADMIN_REPWD"=>""
							);
							echo $this->installFrom->getAdminFrom($this->messageList, $inputs);
						}else{
							echo "写入配置文件失败!!";
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
		// 函数: validateDbFrom($post)
		// 功能: 对输入数据库配置信息的表单进行验证
		// 参数: $post是表单中用户输入的数据库信息的数据数组
		// 返回: true或false
		//==========================================
		function validateDbFrom($post){
			$result=true;
			if(trim(($post['DB_HOST'])=="")){
				$this->messageList.="数据库主机名不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['DB_USER'])=="")){
				$this->messageList.="数据库用户名不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['DB_PWD'])=="")){
				$this->messageList.="数据库密码不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['DB_NAME'])=="")){
				$this->messageList.="数据库名称不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['TAB_PREFIX'])=="")){
				$this->messageList.="表名的前缀不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['APP_NAME'])=="")){
				$this->messageList.="网站名称不能为空!!<br>";
				$result=false;
			}
			if(!$result){
				return false;
			}
			if(!@mysql_connect($post['DB_HOST'],$post['DB_USER'],$post['DB_PWD'])) {
				$this->messageList.="数据库连接失败,请检查用户名密码!!<br>";	
				$result=false;
			}
			return $result;
		} 
		//==========================================
		// 函数: validateAdminFrom($post)
		// 功能: 对输入管理员配置信息的表单进行验证
		// 参数: $post是表单中用户输入的管理员信息的数据数组
		// 返回: true或false
		//==========================================
		function validateAdminFrom($post){
			$result=true;
			if(trim(($post['ADMIN_USER'])=="")){
				$this->messageList.="管理员帐号不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['ADMIN_PWD'])=="")){
				$this->messageList.="管理员密码不能为空!!<br>";
				$result=false;
			}
			if(trim(($post['ADMIN_REPWD'])=="")){
				$this->messageList.="重复输出的密码不能为空!!<br>";
				$result=false;
			}
			if(trim($post['ADMIN_PWD'])!=trim($post['ADMIN_REPWD'])){
				$this->messageList.="两次密码输入不一致!!<br>";
				$result=false;
			}
			if(trim(($post['ADMIN_MAIL'])=="")){
				$this->messageList.="管理员邮箱不能为空!!<br>";
				$result=false;
			}elseif(!preg_match("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $post['ADMIN_MAIL'])){
				$this->messageList.="不是合法的电子邮箱格式!!<br>";
				$result=false;
			}
			return $result;
		}

	}
?>
