<?php
	session_start();                              	   	//开启Session
	$_SESSION["username"]="admin";              		//注册一个Session变量，保存用户名
	echo "Session ID: ".session_id()."<br>";           	//在当前页面输出Session ID
?>
<a href="test2.php?<?php echo SID ?>">通过URL传递Session ID</a>   <!-- 在URL中附加SID --> 

