<?php
	/*==================================================================*/
	/*		文件名:common.php                                   */
	/*		概要: 前台页面公用的一些功能处理.       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//判断系统是否已经安装，如果没有安装则任何一个页面都不可以访问
	if(!file_exists("install_lock.txt")){
		echo "对不起！本系统没有安装不能使用. &nbsp;&nbsp;&nbsp;&nbsp; 请点击 <a href='install/index.php'>安装</a>";

		exit();		
	}
	//加载公用的初使化文件
	require "cmsinit.inc.php";
	//将网站的标题分配给模板，在文章页面的标题栏中显示
	$tpl->assign("appName", APP_NAME);
	//将网站的应用路径分配到模板中
	$tpl->assign("appPath",APP_PATH);
	//将网站前台的样式路径分配到模板中
	$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
	//创建文章分类对象
	$column=new Columns();
	//创建文章对象
	$article=new Article();
	//获取用户访问页面的URL
	$url ="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	//将当前页面的URL分配到模板中
	$tpl->assign("url", $url);
?>
