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
		    <form  method="post" action="main.php?action=editCat">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="col_width width_font">��Ŀ����</span>
						<span class="col_width width_font">��&nbsp;&nbsp;��</span>
						<span class="col_width width_font">��&nbsp;&nbsp;��</span>
					</li>
					<li class="light-row">
						<span class="col_width"><strong><a href="main.php?action=editArticle&catId=1">��ҳ</a></strong></span>
						<span class="col_width">��Ŀ��Ŀ¼</span>
						<span class="col_width">�����Բ���</span>
					</li>
					<{ $list }>
					<li class="light-row">
						<span class="col_width">
							<input type="submit" name="order" class="button" value="�ύ">
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
