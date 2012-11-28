<?php
	/*==================================================================*/
	/*		文件名:login.php                                    */
	/*		概要: 用户登录的功能处理脚本文件.       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//包含通用的初使化脚本文件
	require "cmsinit.inc.php";
	//关闭缓存机制
	$tpl->caching=0;
	//创建用户对象
	$user=new User();
	//判断用户是否执行登录操作
	if($_GET["action"]=="login") {
		if($user->login($_POST["username"], $_POST["password"])){
			$tpl->assign("infotitle", "恭喜! 用户<b>".$_POST["username"]."</b>登录成功");
			
		}else{
			$tpl->assign("infotitle", "对不起! 用户<b>".$_POST["username"]."</b>登录失败");
		}
		$tpl->assign("url", $_POST["url"]);
	//判断用户是否执行退出的操作
	}else if($_GET["action"]=="logout"){
		$user->logout();
		$tpl->assign("infotitle", "恭喜! 您已经成功的退出本站系统");	
		$tpl->assign("url", APP_PATH);
	}
	//向模板中分配网页标题名称
	$tpl->assign("appName", APP_NAME);
	//向模板中分配页面的样式路径
	$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
	//加载并输出模板message.tpl
	$tpl->display(APP_STYLE."/message.tpl");
?>
