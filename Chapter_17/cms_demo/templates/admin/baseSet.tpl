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
		    <form  method="post" action="main.php?action=baseSet">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
						<span class="col_width">ǰ̨��ʾ���</span>
							<select class="text-box" name="appStyle">
								<{ foreach from=$varList.selectStyle key=key item=value}>
									<option <{ if $varList.appStyle eq $key }> selected <{ /if }> value="<{ $key }>"><{ $value }></option>
								<{ /foreach }>
							</select>
						</li>
					<li class="dark-row">
						<span class="col_width">����ÿҳ��ʾ��Ŀ</span>
						<input type="text" class="text-box" name="articlePageSize" size="15" value="<{$varList.articlePageSize}>"> ��/ҳ			
					</li>
					<li class="light-row">
						<span class="col_width">ͼƬÿҳ��ʾ��Ŀ</span>
						<input type="text" class="text-box" name="picturePageSize" size="15" value="<{$varList.picturePageSize}>"> ��/ҳ				
					</li>
					<li class="dark-row">
						<span class="col_width">��̨ͼƬ��ʾ��ʽ</span>
						
						<input type="radio" name="pictureShowType" value="list" <{ if $varList.pictureShowType eq "list" }> checked  <{ /if }> > �б�	
						<input type="radio" name="pictureShowType" value="thumb" <{ if $varList.pictureShowType eq "thumb" }> checked  <{ /if }> > ����ͼ
					</li>
					<li class="light-row">
						<span class="col_width">ˮӡ����</span>
						<input type="text" class="text-box" name="waterText1" size="25" value="<{$varList.waterText1}>">&nbsp;&nbsp;
						<input type="text" class="text-box" name="waterText2" size="25" value="<{$varList.waterText2}>">
					</li>
					<li class="dark-row">
						<span class="col_width">����ͼ�ߴ�</span>
						�� <input type="text" class="text-box" name="width" size="5" value="<{$varList.width}>"> px&nbsp;&nbsp;
						�� <input type="text" class="text-box" name="height" size="5" value="<{$varList.height}>"> px
					</li>
					<li class="light-row">
						<span class="col_width">ͼƬ�ϴ�������ߴ�</span>
						�� <input type="text" class="text-box" name="maxWidth" size="5" value="<{$varList.maxWidth}>"> px&nbsp;&nbsp;
						�� <input type="text" class="text-box" name="maxHeight" size="5" value="<{$varList.maxHeight}>"> px
					</li>
					<li class="dark-row">
						<span class="col_width">&nbsp;</span>
						<input type="submit" class="button" name="mod" value="�� ��">&nbsp;&nbsp;
						<input type="reset" class="button" value="�� ��">
					</li>
				</ul>	
			</div>
                    </form>	
		</div>
	</body>
</html>
