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
						<span class="col_width">�û���&nbsp;&nbsp;&nbsp;<span class="red_font">*</span></span>
						<input name="userName" type="text"  value="<{ $post.userName }>" class="text-box">
						����ʹ�����ģ�����ֹ��[@][.]������������
					</li>
					<li class="dark-row">
						<span class="col_width">��¼����<span class="red_font">*</span></span>
						<input name="userPwd" type="password"   class="text-box">
					</li>
					<li class="light-row">
						<span class="col_width">ȷ������<span class="red_font">*</span></span>
						<input name="userpwdok" type="password"  size="20" class="text-box">
					</li>
					<li class="dark-row">
						<span class="col_width">�����ʼ�<span class="red_font">*</span></span>
						<input name="email" type="text"  value="<{ $post.email }>" class="text-box">
						����ȷ��д��ĵ����ʼ���ַ
					</li>	

					<li class="light-row">
						<span class="col_width">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��</span>
						<input type="radio" name="sex" value="��"> �� &nbsp;
        					<input type="radio" name="sex" value="Ů"> Ů &nbsp;
         					<input name="sex" type="radio" value="" checked="checked"> ���� 
					</li>
				
					<li class="dark-row">
						<span class="col_width"> &nbsp; </span>
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
