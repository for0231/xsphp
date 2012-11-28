<?php
	/*==================================================================*/
	/*		文件名:picLog.php                                   */
	/*		概要: 图片属性信息窗体处理脚本.        	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-30                                */
	/*		最后修改时间:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	require "../cmsinit.inc.php";	
	require "isLogin.php";
	$tpl->caching=0;
	$tpl->assign("picPath",GALLERY_PATH);
	$pic=new Picture();
	$tpl->assign("pic", $pic->getPicPro($_GET["pid"]));
	$tpl->display("admin/picLog.tpl");
	
	
?>

