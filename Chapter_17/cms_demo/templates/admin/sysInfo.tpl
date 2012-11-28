<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>无标题文档</title>
		<meta name="Author" content="高洛峰" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="style/lampcms.css">
	</head>
	<body>
		<div id="main">
			<{ include file="admin/title.tpl" }>
			<div class="msg-box">
				<ul class="viewmess">
					<{ foreach name=info key=key item=item from=$sysinfo }>
						<{ if $smarty.foreach.info.iteration is even }>
							<li class="dark-row">
						<{ else }>
							<li class="light-row">
						<{ /if }> 
							<span class="col_width"><{ $key }></span><{ $item }>
						</li>
					<{ /foreach }>
				</ul>		
			</div>
		</div>
	</body>
</html>
