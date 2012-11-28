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
		    <form name="article" method="post" action="main.php?action=<{ $action }>">
			<input type="hidden" name="id" value="<{ $id }>">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
						<span class="col_width">文章分类</span>
						  <{ $colSelect }>	
					</li>
					<li class="dark-row">
						<span class="col_width">文章标题&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="title" size="30" value="<{ $post.title }>" maxlength="40">
					</li>
					<li class="light-row">
						<span class="col_width">发布时间&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="postTime" size="30" value="<{ $post.postTime|date_format:"%Y-%m-%d %H:%M:%S" }>">&nbsp;&nbsp;如自己更改请注意格式.
					</li>
					<li class="dark-row">
						<span class="col_width" style="margin-top:25px">文章摘要</span>
						<textarea class="text-box" name="summary" cols="40" rows="4"><{ $post.summary }></textarea>&nbsp;&nbsp;小于100个汉字.
					</li>
					<li class="light-row">
						<span class="col_width">文章作者&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="author" size="15" value="<{ $post.author }>" maxlength="20">
					</li>
					<li class="dark-row">
						<span class="col_width">文章来源</span>
						<input type="text" class="text-box" name="comeFrom" size="25" value="<{ $post.comeFrom }>" maxlength="25">
					</li>
					<li class="light-row">
						<span class="col_width">关键字&nbsp;&nbsp;&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="keyword" size="25" value="<{ $post.keyword }>" maxlength="20">&nbsp;&nbsp;用于文章搜索,多个请用逗号","隔开.
					</li>
					<li class="dark-row">
						<span class="col_width">是否推荐</span>
						<input type="radio" name="recommend" <{ $recommend }> value="1"> 推荐
						<input type="radio" name="recommend" <{ $no_recommend }> value="0"> 不推荐
					</li>
					<li style="margin:0px; padding:0px">
						<{ $FCKeditor }>
					</li>
	
					<li class="dark-row">
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
