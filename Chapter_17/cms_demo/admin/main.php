<?php
	/*==================================================================*/
	/*		�ļ���:main.php                                     */
	/*		��Ҫ: ����ƽ̨������Ĵ���ű�.       	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-30                                */
	/*		����޸�ʱ��:2009-05-30                             */
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
