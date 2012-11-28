<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
		<title><{ $appName }>--提示消息</title>
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/global.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/layout.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/print.css">
	<body>
	<div id="notice">

		<div><{ $infotitle }></div>
		<div class="info">
			<{ $error }>
		</div>
		<p>
			
			<a href="<{ $url }>">如果你的浏览器没有自动跳转，请点击这里...</a>
		

		

		</p>
		<script>
			setInterval("window.location.href='<{ $url }>'", "3000");
		</script>
	</div>
	</body>
	</html>
