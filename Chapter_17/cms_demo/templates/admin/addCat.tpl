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
					<li class="light-row">
						<span class="col_width">上级栏目</span>
						  <{ $colSelect }>	
					</li>
					<li class="dark-row">
						<span class="col_width">栏目名称<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="colTitle" maxlength="30" size="20" value="<{ $post.colTitle }>">
					</li>
					<li class="light-row">
						<span class="col_width" style="margin-top:30px">栏目描述</span>
						<textarea class="text-box" name="description" cols="30" rows="5"><{ $post.description }></textarea>
					</li>
					<li class="dark-row">
						<span class="col_width" style="margin-top:45px">栏目图片<span class="red_font">*</span></span>
						<{ if $tuPath ne null }>
							<img src="<{ $tuPath }>" alt="图片预览" width=100 height="100" id="previewPic">			
						<{ else }>
							<img src="images/no_image.gif" alt="图片预览" width=100 height="100" id="previewPic">			
						<{ /if }>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="button"  onclick="showWin('picPage.php','pop_win')" value="浏览...">	
					
						<div id="pop_win">正在加载中...... </div>
						<input type="hidden" id="picId" name="picId" value="<{ $post.picId }>">
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
