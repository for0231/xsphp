<?php
	/*==================================================================*/
	/*		�ļ���:common.php                                   */
	/*		��Ҫ: ǰ̨ҳ�湫�õ�һЩ���ܴ���.       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//�ж�ϵͳ�Ƿ��Ѿ���װ�����û�а�װ���κ�һ��ҳ�涼�����Է���
	if(!file_exists("install_lock.txt")){
		echo "�Բ��𣡱�ϵͳû�а�װ����ʹ��. &nbsp;&nbsp;&nbsp;&nbsp; ���� <a href='install/index.php'>��װ</a>";

		exit();		
	}
	//���ع��õĳ�ʹ���ļ�
	require "cmsinit.inc.php";
	//����վ�ı�������ģ�壬������ҳ��ı���������ʾ
	$tpl->assign("appName", APP_NAME);
	//����վ��Ӧ��·�����䵽ģ����
	$tpl->assign("appPath",APP_PATH);
	//����վǰ̨����ʽ·�����䵽ģ����
	$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
	//�������·������
	$column=new Columns();
	//�������¶���
	$article=new Article();
	//��ȡ�û�����ҳ���URL
	$url ="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	//����ǰҳ���URL���䵽ģ����
	$tpl->assign("url", $url);
?>
