<{ include file="default/header.inc.tpl" }>
	<{ cacheless }>
	<div class="comm">
		<div class="dt"><div><b>�����б�</b>�����ۣ�<a style="color:red" href="article.php?aid=<{ $article.id }>"><{ $article.title }></a>��</div><span class="more">ȫ������ (<span class="red"><{ $pageInfo.row_total }></span>)</span></div>	

		<div class="dd">
			<{ section name=con loop=$comment }>
			<div class="commtitle">
				<div class="pleft">&nbsp;<b class="titl"><{ $comment[con].username }></b> 
					<{ if $comment[con].cmt eq 0 }>
						<img alt="����" src="<{ $stylePath }>/images/cmt-neu.gif">  
					<{ elseif $comment[con].cmt eq 1 }>
						<img alt="����" src="<{ $stylePath }>/images/cmt-good.gif">
					<{ elseif $comment[con].cmt eq -1 }>
						<img alt="����" src="<{ $stylePath }>/images/cmt-bad.gif">
					<{ /if }>
				
					�� <{ $comment[con].postTime|date_format:"%m-%d %H:%M" }> ˵��
				</div>
				<div class="pright"> 
				<a href="#" onclick="setCom(this, 1, <{ $comment[con].id }>)">֧��[<span class="red"><{ $comment[con].support }></span>]</a> &nbsp;&nbsp;&nbsp;
				<a href="#" onclick="setCom(this, 2, <{ $comment[con].id }>)">����[<span class="red"><{ $comment[con].oppose }></span>]</a> &nbsp;&nbsp;&nbsp;<a href="#comment" onclick="quote('hquote', <{ $comment[con].id }>)">����</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<{ if $smarty.session.uid eq 1 }>
					��<a href="comm_pro.php?action=del&cid=<{ $comment[con].id }>&file=comments.php&aid=<{$article.id }>&page=<{ $pageInfo.current_page }>">ɾ��</a>��
				<{ /if }>
				</div>
			</div>

			<div class="commtent">
				<{ $comment[con].content }>
			</div>
			<{ sectionelse }>
				Ŀǰ��û�ж����� <b><{ $article.title }></b> �����ۣ�
			<{ /section }>
			<div class="page">
				��ҳ��ʾ�� <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> ƪ&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
				<{ if $pageInfo.current_page eq 1 }>
					<img border=0  alt="��һҳ" src="<{ $stylePath }>/images/first.gif">&nbsp;&nbsp;
				<{ else }>
					<a href="comments.php?aid=<{ $article.id }>&page=1"><img border=0 alt="��һҳ" src="<{ $stylePath }>/images/first.gif"></a>&nbsp;&nbsp;
				<{ /if }>
				<{ if $pageInfo.prev_page }>	
					<a href="comments.php?aid=<{ $article.id }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="��һҳ" src="<{ $stylePath }>/images/prev.gif"></a>&nbsp;&nbsp;
				<{ else }>
					<img border=0  alt="��һҳ" src="<{ $stylePath }>/images/prev.gif">&nbsp;&nbsp;
				<{/if}>
				<{ if $pageInfo.next_page }>	
					<a href="comments.php?aid=<{ $article.id }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="��һҳ" src="<{ $stylePath }>/images/next.gif"></a>&nbsp;&nbsp;
				<{ else }>
					<img border=0  alt="��һҳ" src="<{ $stylePath }>/images/next.gif">&nbsp;&nbsp;
				<{/if}>
				<{ if $pageInfo.current_page eq $pageInfo.page_num }>
					<img border=0  alt="���һҳ" src="<{ $stylePath }>/images/last.gif">&nbsp;&nbsp;
				<{ else }>
					<a href="comments.php?aid=<{ $article.id }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="���һҳ" src="<{ $stylePath }>/images/last.gif"></a>&nbsp;&nbsp;
				<{ /if }>
			</div>
		</div>
	</div>
	<div class="nav"> </div>
	
	<div class="comm">
		<a name="comment"></a>
		<{if $smarty.session.isLogin }>
		<div class="nav"> </div>
		
		<form action="comments.php?action=com" method="post">
			<img src="<{ $stylePath }>/images/comm1.gif">&nbsp;���Ծ����ػ�������ص����߷��棬�Ͻ�����ɫ�顢���������������ۡ�
			<input type="hidden" name="quote" id="hquote" value="">
			<input type="hidden" name="aid" value="<{ $article.id }>">
			<input type="hidden" name="uid" value="<{ $smarty.session.uid }>">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����:
			<input type="radio" name="cmt" checked value="0"><img alt="����" src="<{ $stylePath }>/images/cmt-neu.gif">����
			<input type="radio" name="cmt"  value="1"><img alt="����" src="<{ $stylePath }>/images/cmt-good.gif">����
			<input type="radio" name="cmt"  value="-1"><img alt="����" src="<{ $stylePath }>/images/cmt-bad.gif">���� 		
			<{ $FCK }>
			<div class="subo"> 
				<input type="submit" class="button" name="sub" style="height:20px" value="��������">
				&nbsp;&nbsp;�������۽������ѱ����˿���������������վͬ����۵��֤ʵ��������		
			</div>	
		</form>
		<{ else }>
			��¼����ܷ�������......
		<{ /if }>
		
		<div class="nav"> </div>
	</div>
	<{ /cacheless }>
<{ include file="default/footer.inc.tpl" }>
