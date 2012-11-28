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
		    <form  method="post" action="main.php?action=<{ $action }>">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
						<span class="col_width">上级相册</span>
							<{ $select }>	
						</li>
					<li class="dark-row">
						<span class="col_width">相册标题<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="catTitle" size="20" value="<{ $post.catTitle }>">
					</li>
					<li class="light-row">
						<span class="col_width" style="margin-top:30px">相册描述</span>
						<textarea class="text-box" name="description" cols="30" rows="5"><{ $post.description }></textarea>
					</li>
				
					<li class="dark-row">
						<span class="col_width"> &nbsp; </span>
						<input type="hidden" name="action" value="<{ $act }>">
						<input type="submit" class="button" name="mod" value="<{ $submitButton }>">&nbsp;&nbsp;
						<input type="reset" class="button" value="重 置">
					</li>
				</ul>	
			</div>
                    </form>	
		</div>
	</body>
</html>
