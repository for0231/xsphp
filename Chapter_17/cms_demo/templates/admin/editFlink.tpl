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
		    <form  method="post" action="main.php?action=editFlink&page=<{ $pageInfo.current_page }>" >
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="list_width width_font">��վ����</span>
						<span class="list_width width_font" style="width:200px">��վ��ַ</span>
						<span class="list_width width_font">���ʱ��</span>
						<span class="list_width width_font">��&nbsp;&nbsp;��</span>
					</li>
				        <{ section name=doc loop=$links }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width"><input type="text" name="linkOrder[]" size="2" maxlength="3" value="<{ $links[doc].ord }>">&nbsp;<{ $links[doc].webName }></span>
							<input type="hidden" name="linkIds[]" value="<{ $links[doc].id }>">
							<span class="list_width" style="width:200px"><{ $links[doc].url }></span>
							<span class="list_width"><{ $links[doc].dtime|date_format:"%Y-%m-%d" }></span>
				
							<span class="list_width" style="width:160px;">
						
							��<a href="main.php?action=addFlink&edit=mod&id=<{ $links[doc].id }>">�޸�</a>��
							��<a onclick="return confirm('ȷ��Ҫɾ����������<{ $links[doc].webName }>��')" href="main.php?action=editFlink&page=<{ $pageInfo.current_page }>&id=<{ $links[doc].id }>&edit=del">ɾ��</a>��
							</span>
						</li>
					<{ sectionelse }>
						<li class="light-row">
							û������κ���������
						</li>
					<{ /section }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:20px;width:240px"> 
							<input class="button" name="order" type="submit" value="�ı���ʾ˳��">
						 </span> 
						<span class="right">
							�� <b><{ $pageInfo.row_total }></b> ����������,��ҳ��ʾ <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> ��&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="��һҳ" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editFlink&page=1"><img border=0 alt="��һҳ" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editFlink&&page=<{ $pageInfo.prev_page }>"><img border=0  alt="��һҳ" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editFlink&page=<{ $pageInfo.next_page }>"><img border=0  alt="��һҳ" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="���һҳ" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editFlink&page=<{ $pageInfo.page_num }>"><img border=0 alt="���һҳ" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
