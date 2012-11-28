<?php
	/*==================================================================*/
	/*		文件名:main.php                                     */
	/*		概要: 管理平台主界面的处理脚本.       	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-30                                */
	/*		最后修改时间:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	require "../cmsinit.inc.php";
	require "isLogin.php";	
	$tpl->caching=0;
	if(!empty($_GET['action']))
	{
		$mc=new MainControl($tpl,$_GET['action']);	
	}else{
		$mc=new MainControl($tpl);
	}
		


?>
