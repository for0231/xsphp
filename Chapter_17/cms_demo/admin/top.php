<?php
	/*==================================================================*/
	/*		文件名:top.php                                      */
	/*		概要: 管理平台顶部的处理脚本.          	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-30                                */
	/*		最后修改时间:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->assign("appPath",APP_PATH);
	$tpl->display("admin/top.tpl");
?>
