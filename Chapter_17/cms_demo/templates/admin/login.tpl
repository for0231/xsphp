<html>
<head>
<title>LAMP��Ϣ����ϵͳ--LAMP�ֵ������繤���� </title>
	<meta http-equiv="content-type" content="text/html;charset=GB2312" />
	<meta name="Author" content="�����" />
	<meta name="Keywords" content="php,lampbrother" />
	<link rel="stylesheet" href="style/lampcms.css" type="text/css" />
</head>

<body class="center" onload="document.getElementById('login-form').uname.focus()">
<div id="login-box">
<div id="main">
	<div class="head-dark-box">
		&nbsp;<b>LAMP��Ϣ����ϵͳ-����Ա��¼</b>
	</div>
	<div class="<{ $className }>">
		<span><{ $message }></span>	
	</div>
	<form method="post" action="login.php" id="login-form">
		<ul>	
			<li class="dark-row">
				<span class="list_width">�û���</span>
				<input type="text" class="text-box" size="15" name="uname">
			</li>
			<li class="light-row">
				<span class="list_width">��&nbsp;&nbsp;&nbsp;��</span>
				<input type="password" class="text-box" size="15" name="pwd">
			</li>
			<li class="dark-row">
				<input type="hidden" name="action" value="login"> 
				<span class="list_width">&nbsp;</span>
				<input type="submit" class="button" value="��¼ϵͳ" />
			</li>
		</ul>
	</form>
</div>
</div>
</body>
</html>
