<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>无标题文档</title>
		<meta name="Author" content="高洛峰" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="style/lampcms.css">
	</head>

	<body>
		<div id="top">
			<div class="left">
				<a herf="index.php"><img  border="0" src="images/logo.gif"></a>
			</div>

		
			<div class="right_tool">
					<ul>
						<li><a href="<{ $appPath }>" target="_top"><img border=0 src="images/exit4.gif"></a></li>
						<li><a href="login.php" target="_top"><img border=0 src="images/exit3.gif"></a></li>
					</ul>
			</div>
			<div class="right_user">
				<b>欢迎您-</b><{ $smarty.session.uname }> &nbsp;&nbsp;
			</div>
		</div>
	</body>
</html>

