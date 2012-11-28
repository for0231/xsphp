<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>无标题文档</title>
		<meta name="Author" content="高洛峰" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="style/lampcms.css">
		<script src="javascript/common.js"></script>
	</head>
	<body>
		<div id="main">
		    <{ include file="admin/title.tpl" }>
		    <form  method="post" action="main.php?action=<{ $action }>">
			<div class="msg-box">
				<ul class="viewmess">
					<input type="hidden" name="id" value="<{ $post.id }>">
					<li class="light-row">
						<span class="col_width">网站名称<span class="red_font">*</span></span>
						 <input type="text" class="text-box" name="webName" maxlength="30" size="20" value="<{ $post.webName }>">
					</li>
					<li class="dark-row">
						<span class="col_width">地&nbsp;&nbsp;址<span class="red_font">*</span></span>
							<input type="text" class="text-box" name="url" maxlength="60" size="40" value="<{ $post.url }>"> &nbsp; 例如：http://www.lampbrother.net
					
					</li>
					<li class="light-row">
						<span class="col_width">LOGO<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="logo" maxlength="60" size="40" value="<{ $post.logo }>"> &nbsp; 网站LOGO图片的真实地址
					</li>

						
					<li class="dark-row">
						<span class="col_width" style="margin-top:30px">网站描述</span>
						<textarea class="text-box" name="msg" cols="30" rows="5"><{ $post.msg }></textarea>
					</li>
					<li class="light-row">
						<span class="col_width">站长Email<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="email" maxlength="60" size="40" value="<{ $post.email }>">
					</li>
					<li class="dark-row">
						<span class="col_width">显示方式</span>
						<input type="radio" name="list" <{ $webName }> value="0"> 网站名称
						<input type="radio" name="list" <{ $logoPic }> value="1"> LOGO图片
					</li>

					<li class="light-row">
						<span class="col_width">&nbsp;  </span>
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
