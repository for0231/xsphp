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
		    <form  method="post" action="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&act=delete" onsubmit="return confirm('��ȷ��Ҫɾ��ѡ�е�ͼƬ����?')">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������ѡ����Ҫ�༭��ͼƬ&nbsp;&nbsp; <{ $select }>	
					</li>
					<{ if $showType eq "thumb" }>
					     <hr>
					     <div class="picthumb">
					     <{ section name=tu loop=$pics }>
						<div class="pic_list">	
							<{ if $pics[tu].hasThumb eq 1 || $pics[tu].hasMark eq 1 }>
								<a href="javascript:newopen(<{ $pics[tu].id }>)"><img alt="<{ $pics[tu].picTitle }>" src="<{ $path}><{ $pics[tu].picName|replace:".":"_new." }>" width="100" height="100"></a><br>
							<{ else }>
								<a href="javascript:newopen(<{ $pics[tu].id }>)"><img alt="<{ $pics[tu].picTitle }>" src="<{ $path}><{ $pics[tu].picName }>" width="100" height="100"></a><br>
							<{ /if }>
							<input type="checkbox" name="del[]" value="<{ $pics[tu].id }>">	
							<a href="javascript:newopen(<{ $pics[tu].id }>)"><{ $pics[tu].picTitle }></a><br>
						
							��<a href="main.php?action=modPicture&id=<{ $pics[tu].id }>">�޸�</a>/<a onclick="return confirm('ȷ��Ҫɾ��ͼƬ<{ $pics[tu].picTitle }>��')" href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $pics[tu].id }>&act=delete">ɾ��</a>��
					      	</div>
					    <{ sectionelse }>
						<li class="light-row">
							������û����Ҫ��ͼƬ
						</li>
					    <{ /section }>
					    </div>
					<{ elseif $showType eq "list" }>
					    	<li class="dark-row">
							<span class="list_width width_font">��&nbsp;&nbsp;��</span>
							<span class="list_width width_font">��&nbsp;&nbsp;��</span>
							<span class="list_width width_font">����/ˮӡ</span>
							<span class="list_width width_font">��&nbsp;&nbsp;��</span>
						</li>
				            <{ section name=tu loop=$pics }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width icon"><input type="checkbox" name="del[]" value="<{ $pics[tu].id }>"><a href="javascript:newopen(<{ $pics[tu].id }>)"><{ $pics[tu].picTitle }></a></span>
							<span class="list_width"><{ $pics[tu].description }></span>
							<span class="list_width"><{ if $pics[tu].hasThumb eq 1 }>��<{ else }>��<{ /if }>/<{ if $pics[tu].hasMark eq 1 }>��<{ else }>��<{ /if }></span>
				
							<span class="list_width">
							��<a href="main.php?action=modPicture&id=<{ $pics[tu].id }>">�޸�</a>��
							��<a onclick="return confirm('ȷ��Ҫɾ��ͼƬ<{ $pics[tu].picTitle }>��')" href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $pics[tu].id }>&act=delete">ɾ��</a>��
							</span>
						</li>
					    <{ sectionelse }>
						<li class="light-row">
							��ҳû����Ҫ��ͼƬ
						</li>
					    <{ /section }>
					<{ /if }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:15px"> 
							<a href="javascript:select()">ȫѡ</a>/<a href="javascript:fanselect()">��ѡ</a>/<a href="javascript:noselect()">ȫ��ѡ</a>&nbsp;&nbsp;ѡ����: 
							<input  name="delb" type="image" title="ɾ��"  src="images/delete.gif">&nbsp;&nbsp;
						 </span> 
						<span class="right">
							������й� <b><{ $pageInfo.row_total }></b> ��ͼƬ,��ҳ��ʾ <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> ��ͼƬ&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="��һҳ" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=1"><img border=0 alt="��һҳ" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="��һҳ" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="��һҳ" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="��һҳ" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="���һҳ" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="���һҳ" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
