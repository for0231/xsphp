<?php
	/*==================================================================*/
	/*		�ļ���:reg_new.php                                  */
	/*		��Ҫ: ���û�ע��Ĺ��ܴ���ű��ļ�.       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//�������õĳ�ʹ���ű��ļ�
	require "cmsinit.inc.php";
	//�رջ�����ƹ���
	$tpl->caching=0;
	//�����û�����
	$user=new User();
	//����û��Ƿ��Ѿ�����
	if($_GET["action"]=="che") {
		if($user->getUserName($_GET["uname"])){
			echo  '<font color="red">���û����Ѵ���</font>';
		}else{
			echo  '<font color="green">���û�������ʹ��</font>';
		}
	//����û��Ƿ�ִ��ע��Ĳ���
	}else if($_GET["action"]=="reg"){
		//���û�ע�����Ϣ������֤
		if($user->validateForm()){
			//ִ���û���ӣ����ж��û��Ƿ���ӳɹ�
			if($user->userAdd($_POST)){
				$tpl->assign("infotitle", "��ϲ!�û�ע��ɹ�");
				$tpl->assign("url", APP_PATH);
			}else{
				$tpl->assign("infotitle", "�Բ���!�û�ע��ʧ��");
				$tpl->assign("url", $url);
			}
		}else{
				$tpl->assign("infotitle", "�Բ���!�û�ע��ʧ�ܣ�ԭ������ ");
				$tpl->assign("error", $user->getMessList());
				$tpl->assign("url", $url);
		}
		//��ҳ�������䵽ģ����
		$tpl->assign("appName", APP_NAME);
		//����ҳ�����ʽ·����ģ����
		$tpl->assign("stylePath", STYLE_PATH.APP_STYLE);
		//���ز����ģ��message.tpl
		$tpl->display(APP_STYLE."/message.tpl");
	}
?>
