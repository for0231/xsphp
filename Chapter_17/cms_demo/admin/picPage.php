<?php
	/*==================================================================*/
	/*		�ļ���:picPage.php                                  */
	/*		��Ҫ: ����ƽ̨��ͼƬѡ���Ĵ���ű�.  	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-30                                */
	/*		����޸�ʱ��:2009-05-30                             */
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
