<?php
	session_start();                     			//使用Cookie中现有的SessionID返回已经存在的Session
	$username=$_SESSION["username"];              		//从Session中获取登录用户名
	$_SESSION = array();                            	//删除所有Session的变量 
	if (isset($_COOKIE[session_name()])) {            	//判断是否是使用基于Cookie的Session
   		setcookie(session_name(), '', time()-42000, '/');   //删除包含Session Id的Cookie
	}
	session_destroy();                              //最后彻底销毁Session
?>
<html>
	<head><title>退出系统</title></head>
	<body>	
		<p><?php echo $username ?>再见！</p>
		<p><a href="maillogin.php">重新登录邮件系统</a></p>
	</body>
</html>
