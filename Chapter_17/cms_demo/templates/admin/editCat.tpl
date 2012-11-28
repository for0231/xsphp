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
		    <form  method="post" action="main.php?action=editCat">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="col_width width_font">栏目名称</span>
						<span class="col_width width_font">描&nbsp;&nbsp;述</span>
						<span class="col_width width_font">操&nbsp;&nbsp;作</span>
					</li>
					<li class="light-row">
						<span class="col_width"><strong><a href="main.php?action=editArticle&catId=1">首页</a></strong></span>
						<span class="col_width">栏目根目录</span>
						<span class="col_width">不可以操作</span>
					</li>
					<{ $list }>
					<li class="light-row">
						<span class="col_width">
							<input type="submit" name="order" class="button" value="提交">
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
