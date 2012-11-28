<?php
	/*==================================================================*/
	/*		文件名:register.php                                 */
	/*		概要: 用户注册的功能处理脚本.  		     	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//包含通用的初使化脚本文件
	require "cmsinit.inc.php";
	//关闭当前页面的缓存机制
	$tpl->caching=0;
	//分配网站名称到模板文件中
	$tpl->assign("appName", APP_NAME);
	//分配网站的应用路径到模板文件中
	$tpl->assign("appPath",APP_PATH);
	//分配前台页面的样式路径到模板文件中
	$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
	//获取当前页面的URL
	$url ="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	//分配当前页面的URL到模板中
	$tpl->assign("url", $url);
	//加载并输出模板文件register.tpl
	$tpl->display(APP_STYLE."/register.tpl");
?>
