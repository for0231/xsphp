<?php
    	 //��һ��������Session����ʹ��
	session_start();       
     	//�ڶ�����ɾ������Session�ı�����Ҳ����unset($_SESSION[xxx])���ɾ��
	$_SESSION = array();   
	//�����������ʹ�û���Cookie��Session��ʹ��setCooike()ɾ������Session Id��Cookie
	if (isset($_COOKIE[session_name()])) {
   		setcookie(session_name(), '', time()-42000, '/');
	}
	//���Ĳ�����󳹵�����Session
	session_destroy();
?>
