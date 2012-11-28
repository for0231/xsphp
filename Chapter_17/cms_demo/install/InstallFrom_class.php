<?php
	/*==================================================================*/
	/*		文件名:InstallFrom_class.php                        */
	/*		概要: 安装程序中的用户表单界面处理类.          	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-01                                */
	/*		最后修改时间:2009-05-01                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class InstallFrom {	
		private $method;
		private $action;
		private $class;
		//==========================================
		// 函数: __construct($method="POST", $action="index.php", $class="white-box") 
		// 功能: 构造方法用于初使化对象的成员属性
		// 参数: metchod是指定表单的提交方法，action是指定表单提交的位置，class指定表单的样式类
		// 返回: 无
		//==========================================	
		function __construct($method="POST", $action="index.php", $class="white-box") {
			$this->method=$method;
			$this->action=$action;
			$this->class=$class;
		}
		//==========================================
		// 函数:  getAgreement()
		// 功能: 用于获取许可协议界面
		// 参数: 无
		// 返回: 返回许可协议界面字符串
		//==========================================
		function getAgreement(){
			$fc.='<div class="body-box tip-msg">';
			$fc.='欢迎您使用LAMP_CMS内容管理系统1.0beta，请认真阅读以下安装条款后进行安装.';
			$fc.='</div>';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'" class="'.$this->class.'">';
			$fc.='<div class="body-box">';
			$fc.='<div class="center red-font">LAMP_CMS 许可协议</div>';
			$fc.='<div class="license">';
			$fc.='<ol>';
			$fc.='<li>LAMP_CMS内容管理系统的所有权归<a href="http://bbs.lampbrother.net"><span class="red-font">LAMP兄弟连</span></a>所有,未经允许不得用于任何商业用途.</li>';
			$fc.='<li>用户可以无条件使用并传播本软件的测试版本,对本软件的任何更新请将更新版本发给LAMP兄弟连工作室一份.</li>';
			$fc.='<li>任何自愿使用测试版本的用户,LAMP兄弟连将不提供任何使用保障、技术服务，也不承担任何因使用本软件而产生问题的相关责任。</li>';
			$fc.='<ol>';	
			$fc.='</div></div>';
			$fc.='<div class="center body-box">';
			$fc.='<input type="hidden" name="step" value="2">';
			$fc.='<input type="submit" class="button" value="我同意">';
			$fc.='<input type="button" class="button" value="我不同意" onclick="window.close()">';
			$fc.='</div>';
			$fc.='</form>';
			return $fc;	
		}
		//==========================================
		// 函数: getDbFrom($info, $inputs, $error="tip-msg")
		// 功能: 获取数据库配置表单
		// 参数: info是安装过程中的提示信息，inputs是用户在表单中输入的内容数组，error是错误报告的样式类
		// 返回: 数据库配置表单界面字符串
		//==========================================
		function getDbFrom($info, $inputs, $error="tip-msg"){
			$fc.='<div class="body-box '.$error.'">'.$info.'</div>';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'" class="'.$this->class.'">';
			$fc.='<ul>';

			$fc.='<li class="light-row">';
			$fc.='<span class="col_width">数据库主机名称</span>';
			$fc.='<input type="text" class="text-box" name="DB_HOST" value="'.$inputs["DB_HOST"].'">';
			$fc.='数据库服务器地址, 一般为 localhost';
			$fc.='</li>';
			
			$fc.='<li class="dark-row">';
			$fc.='<span class="col_width">数据库用户名</span>';
			$fc.='<input type="text" class="text-box" name="DB_USER" value="'.$inputs["DB_USER"].'">';	
			$fc.='数据库账号用户名';
			$fc.='</li>';

			$fc.='<li class="light-row">';
			$fc.='<span class="col_width">数据库密码</span>';
			$fc.='<input type="password" class="text-box" name="DB_PWD" value="'.$inputs["DB_PWD"].'">';	
			$fc.='数据库账号密码';
			$fc.='</li>';

			$fc.='<li class="dark-row">';
			$fc.='<span class="col_width">数据库名称</span>';
			$fc.='<input type="text" class="text-box" name="DB_NAME" value="'.$inputs["DB_NAME"].'">';	
			$fc.='数据库名称';
			$fc.='</li>';


			$fc.='<li class="light-row">';
			$fc.='<span class="col_width">表名前缀</span>';
			$fc.='<input type="text" class="text-box" name="TAB_PREFIX" value="'.$inputs["TAB_PREFIX"].'">';
			$fc.='同一数据库安装多CMS时可改变默认';
			$fc.='</li>';

			$fc.='<li class="dark-row">';
			$fc.='<span class="col_width">网站名称</span>';
			$fc.='<input type="text" class="text-box" name="APP_NAME" value="'.$inputs["APP_NAME"].'">';	
			$fc.='用于在标题栏上显示';
			$fc.='</li>';

			$fc.='</ul>';
			$fc.='<div class="center body-box">';
			$fc.='<input type="hidden" name="step" value="3">';
			$fc.='<input type="button" class="button" value="上一步" onclick="history.back()">';
			$fc.='<input type="submit" class="button" value="下一步" >';
			$fc.='</div>';
			$fc.='</form>';
			return $fc;	
		}
		//==========================================
		// 函数: getAdminFrom($info, $inputs, $error="tip-msg")
		// 功能: 添写管理员用户名和密码的表单
		// 参数: info是安装过程中的提示信息，inputs是用户在表单中输入的内容数组，error是错误报告的样式类
		// 返回: 管理员添加表单界面字符串
		//==========================================
		function getAdminFrom($info, $inputs, $error="tip-msg"){
			$fc.='<div class="body-box '.$error.'">'.$info.'</div>';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'" class="'.$this->class.'">';
			$fc.='<ul>';

			$fc.='<li class="light-row liimg">';
			$fc.='<span class="col_width">管理员帐号</span>';
			$fc.='<input type="text" class="text-box" name="ADMIN_USER" value="'.$inputs["ADMIN_USER"].'">';
			$fc.='</li>';
			
			$fc.='<li class="dark-row liimg">';
			$fc.='<span class="col_width">管理员密码</span>';
			$fc.='<input type="password" class="text-box" name="ADMIN_PWD" value="'.$inputs["ADMIN_PWD"].'">';
			$fc.='</li>';
			$fc.='<li class="light-row liimg">';
			$fc.='<span class="col_width">重复密码</span>';
			$fc.='<input type="password" class="text-box" name="ADMIN_REPWD" value="'.$inputs["ADMIN_REPWD"].'">';	
			$fc.='</li>';
			$fc.='<li class="dark-row liimg">';
			$fc.='<span class="col_width">管理员邮箱</span>';
			$fc.='<input type="text" class="text-box" name="ADMIN_MAIL" value="'.$inputs["ADMIN_MAIL"].'">';	
			$fc.='</li>';

			$fc.='</ul>';
			$fc.='<div class="center body-box">';
			$fc.='<input type="hidden" name="step" value="4">';
			$fc.='<input type="button" class="button" value="上一步" onclick="history.back()">';
			$fc.='<input type="submit" class="button" value="下一步" >';
			$fc.='</div>';
			$fc.='</form>';
			return $fc;	
		}
		//==========================================
		// 函数: getInstallMessage($message, $installStats)
		// 功能: 安装信息显示的表单界面
		// 参数: $message是安装的提示信息，installStats安装的成功或失败的状态信息
		// 返回: 安装信息显示界面字符串
		//==========================================
		function getInstallMessage($message, $installStats){
			$fc="";
			$fc.='<div class="body-box tip-msg">';
			$fc.='安装信息显示！！';
			$fc.='</div>';
			$fc.='<div class="body-box">';
			$fc.='<div class="license">';
			$fc.=$message;
			$fc.='</div></div>';
			$fc.='<div class="center body-box">';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'">';
			if($installStats){
				$fc.='<input type="hidden" name="step" value="5">';
				$fc.='<input type="submit" class="button" value="恭喜您安装成功，点击进入首页" >';
			
			}else{
				$fc.='<input type="button" class="button" value="安装失败，请返回" onclick="history.back()">';
			}	
			$fc.='</form>';
			$fc.='</div>';
			return $fc;	
		}

	}
?>
