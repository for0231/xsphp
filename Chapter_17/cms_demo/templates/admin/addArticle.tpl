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
		    <form name="article" method="post" action="main.php?action=<{ $action }>">
			<input type="hidden" name="id" value="<{ $id }>">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
						<span class="col_width">���·���</span>
						  <{ $colSelect }>	
					</li>
					<li class="dark-row">
						<span class="col_width">���±���&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="title" size="30" value="<{ $post.title }>" maxlength="40">
					</li>
					<li class="light-row">
						<span class="col_width">����ʱ��&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="postTime" size="30" value="<{ $post.postTime|date_format:"%Y-%m-%d %H:%M:%S" }>">&nbsp;&nbsp;���Լ�������ע���ʽ.
					</li>
					<li class="dark-row">
						<span class="col_width" style="margin-top:25px">����ժҪ</span>
						<textarea class="text-box" name="summary" cols="40" rows="4"><{ $post.summary }></textarea>&nbsp;&nbsp;С��100������.
					</li>
					<li class="light-row">
						<span class="col_width">��������&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="author" size="15" value="<{ $post.author }>" maxlength="20">
					</li>
					<li class="dark-row">
						<span class="col_width">������Դ</span>
						<input type="text" class="text-box" name="comeFrom" size="25" value="<{ $post.comeFrom }>" maxlength="25">
					</li>
					<li class="light-row">
						<span class="col_width">�ؼ���&nbsp;&nbsp;&nbsp;<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="keyword" size="25" value="<{ $post.keyword }>" maxlength="20">&nbsp;&nbsp;������������,������ö���","����.
					</li>
					<li class="dark-row">
						<span class="col_width">�Ƿ��Ƽ�</span>
						<input type="radio" name="recommend" <{ $recommend }> value="1"> �Ƽ�
						<input type="radio" name="recommend" <{ $no_recommend }> value="0"> ���Ƽ�
					</li>
					<li style="margin:0px; padding:0px">
						<{ $FCKeditor }>
					</li>
	
					<li class="dark-row">
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
