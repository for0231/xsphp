<?php
	/*==================================================================*/
	/*		�ļ���:picLog.php                                   */
	/*		��Ҫ: ͼƬ������Ϣ���崦��ű�.        	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-30                                */
	/*		����޸�ʱ��:2009-05-30                             */
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

