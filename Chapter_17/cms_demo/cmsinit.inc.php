<?php
	/*==================================================================*/
	/*		�ļ���:cmsinit.inc.php                              */
	/*		��Ҫ: ������ϵͳ��ʹ����Ϣ.              	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//����Session
	session_start();
	//����ҳ����GB2312�����ı����ʾ
	header("Content-type: text/html;charset=gb2312");
	//����ͨ�õ�ȫ�������ļ�
	require("config.inc.php");
	//����Smarty������ڵ��ļ�
	require CMS_ROOT."libs/Smarty.class.php"; 
	//�����й����ڵĶ���ʱ��	
	date_default_timezone_set('PRC'); 
	//�����Զ���������Ҫ�����ļ�
	function __autoload($className){
		//������·������Ķ�Ӧ���������ļ�
		include(APP_CLASS_PATH.$className.".class.php");
	}
	//����һ��Smarty��Ķ���$tpl
	$tpl = new MyTpl();                           
?>
