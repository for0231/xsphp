<html>
	<head>
		<title>��ҳ�Ի��򣨲鿴ͼƬ���ԣ�</title>
		<meta name="Author" content="�����" />
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
					ͼƬ���ƣ�<{ $pic.picTitle }>
				</td>
			</tr><tr>
				<td>
					ͼƬ�ߴ磺<{ $pic.width }> �� <{ $pic.height }> px
					<{ if $pic.hasThumb }>	
						<br>���Գߴ磺<{ $pic.width_h }> �� <{ $pic.height_h }> px
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					ͼƬ��С��<{ $pic.size }>
					<{ if $pic.hasThumb }>	
						<br>���Դ�С��<{ $pic.size_h }>
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					����ͼ&nbsp;&nbsp;��
					<{ if $pic.hasThumb }>	
						��
					<{ else }>
						��
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					ˮӡͼ&nbsp;&nbsp;��
					<{ if $pic.hasMark }>	
						��
					<{ else }>
						��
					<{ /if }>
				</td>
			</tr><tr>
				<td>
					ͼƬ������<br><{ $pic.description }>
				</td>
			</tr>	
		</table>
	</body>	
</html>
