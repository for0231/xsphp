<?php
	/*==================================================================*/
	/*		�ļ���:login.php                                    */
	/*		��Ҫ: �û���¼���ýű�.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-30                                */
	/*		����޸�ʱ��:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
require "../cmsinit.inc.php";
//�û��Ƿ��¼
$user	=  new User();
if(!$_SESSION["isLogin"] && $_SESSION["uid"]!=1) 
{
	if (isset($_POST['action']) && $_POST['action'] == "login") //�Ѿ��ύ��
	{
		
		
		$log	= $user->login($_POST['uname'], $_POST['pwd'], "admin"); //�������Ա��¼
		if ($log){ //��¼�ɹ�
			header("Location:index.php");				
		} else { //��¼ʧ��
			$message = "�û������������, ������.";
			$tpl->assign("className", "login-msg");
			$tpl->assign("message", $message);
		}
	}else{       //û���ύ��.��ʾ��¼����
	
		$tpl->assign("className", "not-display");
		$tpl->assign("message", "");
	}
}else{
	$user->logout();
}	

$tpl->display("admin/login.tpl");
?>
