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
		    <form  method="post" action="main.php?action=editUser&page=<{ $pageInfo.current_page }>" onsubmit="return confirm('��ȷ��Ҫɾ��ѡ�е�ͼƬ����?')"  >
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="list_width width_font">�û���</span>
						<span class="list_width width_font" style="width:200px">�����ʼ�</span>
						<span class="list_width width_font">ע��ʱ��</span>
						<span class="list_width width_font">��&nbsp;&nbsp;��</span>
					</li>
				        <{ section name=doc loop=$users }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width">
							<{ if $users[doc].id ne 1 }>
								<input type="checkbox" name="del[]"  value="<{ $users[doc].id }>">
							<{ /if }>
							<{ $users[doc].userName }>
							</span>
							
							<span class="list_width" style="width:200px"><{ $users[doc].email }></span>
							<span class="list_width"><{ $users[doc].regTime|date_format:"%Y-%m-%d" }></span>
				
							<span class="list_width" style="width:160px;">
						
							��<a href="main.php?action=addUser&edit=mod&id=<{ $users[doc].id }>">�޸�</a>��
							<{ if $users[doc].id ne 1 }>
							��<a onclick="return confirm('ȷ��Ҫɾ���û�<{ $users[doc].userName }>��')" href="main.php?action=editUser&page=<{ $pageInfo.current_page }>&id=<{ $users[doc].id }>&edit=del">ɾ��</a>��
							<{ /if }>
							</span>
						</li>
					<{ sectionelse }>
						<li class="light-row">
							��ҳû���û�
						</li>
					<{ /section }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:15px;width:240px"> 
							<a href="javascript:select()">ȫѡ</a>/<a href="javascript:fanselect()">��ѡ</a>/<a href="javascript:noselect()">ȫ��ѡ</a>&nbsp;&nbsp;ѡ����: 
							
							<input  name="dels" type="image" title="ɾ��" value="delete" src="images/delete.gif">&nbsp;&nbsp;
						 </span> 
						<span class="right">
							�� <b><{ $pageInfo.row_total }></b> ���û�,��ҳ��ʾ <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> ��&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="��һҳ" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editUser&page=1"><img border=0 alt="��һҳ" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editUser&&page=<{ $pageInfo.prev_page }>"><img border=0  alt="��һҳ" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editUser&page=<{ $pageInfo.next_page }>"><img border=0  alt="��һҳ" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="���һҳ" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editUser&page=<{ $pageInfo.page_num }>"><img border=0 alt="���һҳ" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
