<?php
	/*==================================================================*/
	/*		文件名:reg_new.php                                  */
	/*		概要: 新用户注册的功能处理脚本文件.       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含公用的初使化脚本文件
	require "cmsinit.inc.php";
	//关闭缓存机制功能
	$tpl->caching=0;
	//创建用户对象
	$user=new User();
	//检查用户是否已经存在
	if($_GET["action"]=="che") {
		if($user->getUserName($_GET["uname"])){
			echo  '<font color="red">该用户名已存在</font>';
		}else{
			echo  '<font color="green">该用户名可以使用</font>';
		}
	//检查用户是否执行注册的操作
	}else if($_GET["action"]=="reg"){
		//对用户注册的信息进行验证
		if($user->validateForm()){
			//执行用户添加，并判断用户是否添加成功
			if($user->userAdd($_POST)){
				$tpl->assign("infotitle", "恭喜!用户注册成功");
				$tpl->assign("url", APP_PATH);
			}else{
				$tpl->assign("infotitle", "对不起!用户注册失败");
				$tpl->assign("url", $url);
			}
		}else{
				$tpl->assign("infotitle", "对不起!用户注册失败，原因如下 ");
				$tpl->assign("error", $user->getMessList());
				$tpl->assign("url", $url);
		}
		//将页面标题分配到模板中
		$tpl->assign("appName", APP_NAME);
		//分配页面的样式路径到模板中
		$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
		//加载并输出模板message.tpl
		$tpl->display(APP_STYLE."/message.tpl");
	}
?>
