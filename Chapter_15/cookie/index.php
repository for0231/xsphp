<?php
	if($_COOKIE["isLogin"]){                               		//判断用户是否通过了身份验证
		echo '您好：'.$_COOKIE["username"].',&nbsp;&nbsp;';     //从Cookie中获取登录用户名输出
		echo '<a href="login.php?action=logout">退出</a>';      //为用户提供一个退出的操作链接
	}else{                                                		//如果用户没有通过身份验证
		header("Location:login.php");                           //页面跳转至登录页面
		exit;                                             	//终止程序继续执行
	}
?>
<html>
	<head><title>网站主页面</title></head>                 	<!--  设置页面标题 -->
	<body>	
		<p>这里显示网页的主体内容</p>                 	<!--  设置页面标题 -->
	</body>
</html>
