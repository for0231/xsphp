<?php
	/*==================================================================*/
	/*		�ļ���:bottom.php                                   */
	/*		��Ҫ: ����ƽ̨�ײ�����ű�.            	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-30                                */
	/*		����޸�ʱ��:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	require "../cmsinit.inc.php";
	require "isLogin.php";
	$dateDay=new DateDay();
	$tpl->assign("date", $dateDay->getDateDay());
	$tpl->display("admin/bottom.tpl");
?>
