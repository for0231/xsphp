<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>�ޱ����ĵ�</title>
		<meta name="Author" content="�����" />
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
						<span class="col_width width_font">�������</span>
						<span class="col_width width_font">��&nbsp;&nbsp;��</span>
						<span class="col_width width_font">��&nbsp;&nbsp;��</span>
					</li>
					<{ $list }>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
