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
		    <form  method="post" action="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>" >
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����ĵ�������ѡ����Ҫ�༭���ĵ�&nbsp;&nbsp; <{ $colSelect }>	
					</li>
					
					<li class="dark-row">
						<span class="list_width width_font">����(���۴���)</span>
						<span class="list_width width_font">��&nbsp;&nbsp;��</span>
						<span class="list_width width_font">���ʱ��</span>
						<span class="list_width width_font">��&nbsp;&nbsp;��</span>
					</li>
				        <{ section name=doc loop=$arts }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width"><input type="checkbox" name="del[]" value="<{ $arts[doc].id }>"><a href="<{ $appPath }>article.php?aid=<{ $arts[doc].id }>" target="_blank"><{ $arts[doc].title }></a><span class="red_font">(<{ $arts[doc].comms }>)</span></span>
							<span class="list_width"><{ $arts[doc].author }></span>
							<span class="list_width"><{ $arts[doc].postTime|date_format:"%Y-%m-%d %H:%M:%S" }></span>
				
							<span class="list_width" style="width:160px;">
							<{ if $arts[doc].audit eq 0 }>
								��<a href="main.php?action=editArticle&edit=audit&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $arts[doc].id }>">���</a>��
							<{ else }>
								��<a href="main.php?action=editArticle&edit=lock&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $arts[doc].id }>">����</a>��
							<{/if}>
							��<a href="main.php?action=addArticle&edit=mod&id=<{ $arts[doc].id }>">�޸�</a>��
							��<a onclick="return confirm('ȷ��Ҫɾ��ͼƬ<{ $arts[doc].title }>��')" href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $arts[doc].id }>&edit=del">ɾ��</a>��
							</span>
						</li>
					<{ sectionelse }>
						<li class="light-row">
							��ҳû������
						</li>
					<{ /section }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:15px;width:240px"> 
							<a href="javascript:select()">ȫѡ</a>/<a href="javascript:fanselect()">��ѡ</a>/<a href="javascript:noselect()">ȫ��ѡ</a>&nbsp;&nbsp;ѡ����: 
							<input  name="audits" type="image" title="���"  src="images/audit.gif">&nbsp;&nbsp;
							<input  name="locks" type="image" title="����"  src="images/lock.gif">&nbsp;&nbsp;
							<input  name="dels" type="image" title="ɾ��" onClick="return confirm('��ȷ��Ҫɾ��ѡ�е�ͼƬ����?')"  src="images/delete.gif">&nbsp;&nbsp;
						 </span> 
						<span class="right">
							����Ŀ�й� <b><{ $pageInfo.row_total }></b> ƪ����,��ҳ��ʾ <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> ƪ&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="��һҳ" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=1"><img border=0 alt="��һҳ" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="��һҳ" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="��һҳ" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="���һҳ" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="���һҳ" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
