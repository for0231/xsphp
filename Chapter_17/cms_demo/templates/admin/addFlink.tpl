<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>�ޱ����ĵ�</title>
		<meta name="Author" content="�����" />
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
						<span class="col_width">��վ����<span class="red_font">*</span></span>
						 <input type="text" class="text-box" name="webName" maxlength="30" size="20" value="<{ $post.webName }>">
					</li>
					<li class="dark-row">
						<span class="col_width">��&nbsp;&nbsp;ַ<span class="red_font">*</span></span>
							<input type="text" class="text-box" name="url" maxlength="60" size="40" value="<{ $post.url }>"> &nbsp; ���磺http://www.lampbrother.net
					
					</li>
					<li class="light-row">
						<span class="col_width">LOGO<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="logo" maxlength="60" size="40" value="<{ $post.logo }>"> &nbsp; ��վLOGOͼƬ����ʵ��ַ
					</li>

						
					<li class="dark-row">
						<span class="col_width" style="margin-top:30px">��վ����</span>
						<textarea class="text-box" name="msg" cols="30" rows="5"><{ $post.msg }></textarea>
					</li>
					<li class="light-row">
						<span class="col_width">վ��Email<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="email" maxlength="60" size="40" value="<{ $post.email }>">
					</li>
					<li class="dark-row">
						<span class="col_width">��ʾ��ʽ</span>
						<input type="radio" name="list" <{ $webName }> value="0"> ��վ����
						<input type="radio" name="list" <{ $logoPic }> value="1"> LOGOͼƬ
					</li>

					<li class="light-row">
						<span class="col_width">&nbsp;  </span>
						<input type="hidden" name="action" value="<{ $act }>">
						<input type="submit" class="button" name="mod" value="<{ $submitButton }>">&nbsp;&nbsp;
						<input type="reset" class="button" value="�� ��">
					</li>
				</ul>	
			</div>
                    </form>	
		</div>
	</body>
</html>
