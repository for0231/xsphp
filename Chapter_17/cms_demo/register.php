<?php
	/*==================================================================*/
	/*		�ļ���:register.php                                 */
	/*		��Ҫ: �û�ע��Ĺ��ܴ���ű�.  		     	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//����ͨ�õĳ�ʹ���ű��ļ�
	require "cmsinit.inc.php";
	//�رյ�ǰҳ��Ļ������
	$tpl->caching=0;
	//������վ���Ƶ�ģ���ļ���
	$tpl->assign("appName", APP_NAME);
	//������վ��Ӧ��·����ģ���ļ���
	$tpl->assign("appPath",APP_PATH);
	//����ǰ̨ҳ�����ʽ·����ģ���ļ���
	$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
	//��ȡ��ǰҳ���URL
	$url ="http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	//���䵱ǰҳ���URL��ģ����
	$tpl->assign("url", $url);
	//���ز����ģ���ļ�register.tpl
	$tpl->display(APP_STYLE."/register.tpl");
?>
