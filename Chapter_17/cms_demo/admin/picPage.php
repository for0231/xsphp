<?php
	/*==================================================================*/
	/*		文件名:picPage.php                                  */
	/*		概要: 管理平台中图片选择框的处理脚本.  	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-30                                */
	/*		最后修改时间:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	require "../cmsinit.inc.php";
	require "isLogin.php";
	$tpl->caching=0;
	$catId=isset($_GET["catId"])?$_GET["catId"]:1;
	$currentPage=isset($_GET["page"])?$_GET["page"]:1;
	$picpage=new PicPage($catId, $currentPage);
	$picpage->output();
?>
