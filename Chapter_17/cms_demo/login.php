<?php
	/*==================================================================*/
	/*		�ļ���:login.php                                    */
	/*		��Ҫ: �û���¼�Ĺ��ܴ���ű��ļ�.       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//����ͨ�õĳ�ʹ���ű��ļ�
	require "cmsinit.inc.php";
	//�رջ������
	$tpl->caching=0;
	//�����û�����
	$user=new User();
	//�ж��û��Ƿ�ִ�е�¼����
	if($_GET["action"]=="login") {
		if($user->login($_POST["username"], $_POST["password"])){
			$tpl->assign("infotitle", "��ϲ! �û�<b>".$_POST["username"]."</b>��¼�ɹ�");
			
		}else{
			$tpl->assign("infotitle", "�Բ���! �û�<b>".$_POST["username"]."</b>��¼ʧ��");
		}
		$tpl->assign("url", $_POST["url"]);
	//�ж��û��Ƿ�ִ���˳��Ĳ���
	}else if($_GET["action"]=="logout"){
		$user->logout();
		$tpl->assign("infotitle", "��ϲ! ���Ѿ��ɹ����˳���վϵͳ");	
		$tpl->assign("url", APP_PATH);
	}
	//��ģ���з�����ҳ��������
	$tpl->assign("appName", APP_NAME);
	//��ģ���з���ҳ�����ʽ·��
	$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
	//���ز����ģ��message.tpl
	$tpl->display(APP_STYLE."/message.tpl");
?>
