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
					<li class="light-row">
						<span class="col_width">�ϼ���Ŀ</span>
						  <{ $colSelect }>	
					</li>
					<li class="dark-row">
						<span class="col_width">��Ŀ����<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="colTitle" maxlength="30" size="20" value="<{ $post.colTitle }>">
					</li>
					<li class="light-row">
						<span class="col_width" style="margin-top:30px">��Ŀ����</span>
						<textarea class="text-box" name="description" cols="30" rows="5"><{ $post.description }></textarea>
					</li>
					<li class="dark-row">
						<span class="col_width" style="margin-top:45px">��ĿͼƬ<span class="red_font">*</span></span>
						<{ if $tuPath ne null }>
							<img src="<{ $tuPath }>" alt="ͼƬԤ��" width=100 height="100" id="previewPic">			
						<{ else }>
							<img src="images/no_image.gif" alt="ͼƬԤ��" width=100 height="100" id="previewPic">			
						<{ /if }>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="button"  onclick="showWin('picPage.php','pop_win')" value="���...">	
					
						<div id="pop_win">���ڼ�����...... </div>
						<input type="hidden" id="picId" name="picId" value="<{ $post.picId }>">
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
