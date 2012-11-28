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
		    <form  method="post" action="main.php?action=baseSet">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
						<span class="col_width">前台显示风格</span>
							<select class="text-box" name="appStyle">
								<{ foreach from=$varList.selectStyle key=key item=value}>
									<option <{ if $varList.appStyle eq $key }> selected <{ /if }> value="<{ $key }>"><{ $value }></option>
								<{ /foreach }>
							</select>
						</li>
					<li class="dark-row">
						<span class="col_width">文章每页显示数目</span>
						<input type="text" class="text-box" name="articlePageSize" size="15" value="<{$varList.articlePageSize}>"> 条/页			
					</li>
					<li class="light-row">
						<span class="col_width">图片每页显示数目</span>
						<input type="text" class="text-box" name="picturePageSize" size="15" value="<{$varList.picturePageSize}>"> 条/页				
					</li>
					<li class="dark-row">
						<span class="col_width">后台图片显示方式</span>
						
						<input type="radio" name="pictureShowType" value="list" <{ if $varList.pictureShowType eq "list" }> checked  <{ /if }> > 列表	
						<input type="radio" name="pictureShowType" value="thumb" <{ if $varList.pictureShowType eq "thumb" }> checked  <{ /if }> > 缩略图
					</li>
					<li class="light-row">
						<span class="col_width">水印文字</span>
						<input type="text" class="text-box" name="waterText1" size="25" value="<{$varList.waterText1}>">&nbsp;&nbsp;
						<input type="text" class="text-box" name="waterText2" size="25" value="<{$varList.waterText2}>">
					</li>
					<li class="dark-row">
						<span class="col_width">缩略图尺寸</span>
						宽 <input type="text" class="text-box" name="width" size="5" value="<{$varList.width}>"> px&nbsp;&nbsp;
						高 <input type="text" class="text-box" name="height" size="5" value="<{$varList.height}>"> px
					</li>
					<li class="light-row">
						<span class="col_width">图片上传后的最大尺寸</span>
						宽 <input type="text" class="text-box" name="maxWidth" size="5" value="<{$varList.maxWidth}>"> px&nbsp;&nbsp;
						高 <input type="text" class="text-box" name="maxHeight" size="5" value="<{$varList.maxHeight}>"> px
					</li>
					<li class="dark-row">
						<span class="col_width">&nbsp;</span>
						<input type="submit" class="button" name="mod" value="修 改">&nbsp;&nbsp;
						<input type="reset" class="button" value="重 置">
					</li>
				</ul>	
			</div>
                    </form>	
		</div>
	</body>
</html>
