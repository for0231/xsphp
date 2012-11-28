<?php
	/*==================================================================*/
	/*		文件名:login.php                                    */
	/*		概要: 用户登录设置脚本.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-30                                */
	/*		最后修改时间:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
require "../cmsinit.inc.php";
//用户是否登录
$user	=  new User();
if(!$_SESSION["isLogin"] && $_SESSION["uid"]!=1) 
{
	if (isset($_POST['action']) && $_POST['action'] == "login") //已经提交表单
	{
		
		
		$log	= $user->login($_POST['uname'], $_POST['pwd'], "admin"); //检验管理员登录
		if ($log){ //登录成功
			header("Location:index.php");				
		} else { //登录失败
			$message = "用户名或密码错误, 请重试.";
			$tpl->assign("className", "login-msg");
			$tpl->assign("message", $message);
		}
	}else{       //没有提交表单.显示登录界面
	
		$tpl->assign("className", "not-display");
		$tpl->assign("message", "");
	}
}else{
	$user->logout();
}	

$tpl->display("admin/login.tpl");
?>
