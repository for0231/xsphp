<?php
	session_start();                     			//ʹ��Cookie�����е�SessionID�����Ѿ����ڵ�Session
	$username=$_SESSION["username"];              		//��Session�л�ȡ��¼�û���
	$_SESSION = array();                            	//ɾ������Session�ı��� 
	if (isset($_COOKIE[session_name()])) {            	//�ж��Ƿ���ʹ�û���Cookie��Session
   		setcookie(session_name(), '', time()-42000, '/');   //ɾ������Session Id��Cookie
	}
	session_destroy();                              //��󳹵�����Session
?>
<html>
	<head><title>�˳�ϵͳ</title></head>
	<body>	
		<p><?php echo $username ?>�ټ���</p>
		<p><a href="maillogin.php">���µ�¼�ʼ�ϵͳ</a></p>
	</body>
</html>
