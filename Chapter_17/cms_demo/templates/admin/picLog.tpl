<html>
	<head>
		<title>网页对话框（查看图片属性）</title>
		<meta name="Author" content="高洛峰" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="style/lampcms.css">
		<script src="javascript/common.js"></script>
	</head>

	<body oncontextmenu="return false">
		<table border="0" sytle="font-size:11px">
			<tr>
				<td rowspan=8><img src="<{ $picPath }><{ $pic.picName }>" ></td>
			</tr>
			<tr>
				<td>	<{ if $pic.hasThumb }>		
						<img  height="100" src="<{ $picPath }><{ $pic.newName }>" >
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					图片名称：<{ $pic.picTitle }>
				</td>
			</tr><tr>
				<td>
					图片尺寸：<{ $pic.width }> × <{ $pic.height }> px
					<{ if $pic.hasThumb }>	
						<br>缩略尺寸：<{ $pic.width_h }> × <{ $pic.height_h }> px
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					图片大小：<{ $pic.size }>
					<{ if $pic.hasThumb }>	
						<br>缩略大小：<{ $pic.size_h }>
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					缩略图&nbsp;&nbsp;：
					<{ if $pic.hasThumb }>	
						有
					<{ else }>
						无
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					水印图&nbsp;&nbsp;：
					<{ if $pic.hasMark }>	
						有
					<{ else }>
						无
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					图片描述：<br><{ $pic.description }>
				</td>
			</tr>	
		</table>
	</body>	
</html>
