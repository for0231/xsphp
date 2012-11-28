<html>
<head>
<title>LAMP信息发布系统--LAMP兄弟连网络工作室 </title>
	<meta http-equiv="content-type" content="text/html;charset=GB2312" />
	<meta name="Author" content="高洛峰" />
	<meta name="Keywords" content="php,lampbrother" />
	<link rel="stylesheet" href="style/lampcms.css" type="text/css" />
</head>

<body class="center" onload="document.getElementById('login-form').uname.focus()">
<div id="login-box">
<div id="main">
	<div class="head-dark-box">
		&nbsp;<b>LAMP信息发布系统-管理员登录</b>
	</div>
	<div class="<{ $className }>">
		<span><{ $message }></span>	
	</div>
	<form method="post" action="login.php" id="login-form">
		<ul>	
			<li class="dark-row">
				<span class="list_width">用户名</span>
				<input type="text" class="text-box" size="15" name="uname">
			</li>
			<li class="light-row">
				<span class="list_width">密&nbsp;&nbsp;&nbsp;码</span>
				<input type="password" class="text-box" size="15" name="pwd">
			</li>
			<li class="dark-row">
				<input type="hidden" name="action" value="login"> 
				<span class="list_width">&nbsp;</span>
				<input type="submit" class="button" value="登录系统" />
			</li>
		</ul>
	</form>
</div>
</div>
</body>
</html>
