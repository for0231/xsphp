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
		    <form  method="post" action="main.php?action=<{ $action }>" enctype="multipart/form-data">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
						<span class="col_width">��ӵ����</span>
							<{ $select }>	
						</li>
					<li class="dark-row">
						<span class="col_width">ͼƬ����<span class="red_font">*</span></span>
						<input type="text" class="text-box" name="picTitle" size="20" value="<{ $post.picTitle }>">
					</li>
					<li class="light-row">
						<span class="col_width" style="margin-top:30px">ͼƬ����</span>
						<textarea class="text-box" name="description" cols="30" rows="5"><{ $post.description }></textarea>
					</li>

					<li class="dark-row">
						<span class="col_width">&nbsp; </span>
						<input type="checkbox" name="hasThumb" value="1" <{ $hasThumb }>> ��������ͼ 
						<input type="checkbox" name="hasMark" value="1" <{ $hasMark }>> ��ˮӡ 
					</li>
					<{ if $picPath }>
					<input type="hidden" name="id" value="<{ $post.id }>">
					<input type="hidden" name="picName" value="<{ $post.picName }>">
					<li class="light-row">
						<span class="col_width" style="margin-top:45px">ͼƬԤ��</span>
						<img src="<{ $picPath }>" alt="ͼƬԤ��" width=100 height="100" id="previewPic">
					</li>
					<li class="dark-row">
					<{ else }>
					<li class="light-row">
						<span class="col_width">�ϴ�ͼƬ </span>
						<input type="file" name="uploadPic"  onChange="previewPic.src=this.value">
					</li>
					<li class="dark-row">
						<span class="col_width" style="margin-top:45px">ͼƬԤ��</span>
						<img src="images/no_image.gif" alt="ͼƬԤ��" width=100 height="100" id="previewPic"/>
					</li>
					<li class="light-row">
					<{ /if }>
						<span class="col_width">&nbsp;</span>
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
