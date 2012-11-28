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
		    <form  method="post" action="main.php?action=album">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="col_width width_font">相册名称</span>
						<span class="col_width width_font">描&nbsp;&nbsp;述</span>
						<span class="col_width width_font">操&nbsp;&nbsp;作</span>
					</li>
					<{ $list }>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
