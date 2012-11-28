<{ include file="cial/header.inc.tpl" }>
	<div id="main">
		<div class="article">
		<div class="dt"><div>
				��ǰλ��:	
				<{ section name=loc loop=$locs }>
					<a href="column.php?pid=<{ $locs[loc].colId }>" title="<{ $locs[loc].description }>"><{ $locs[loc].colTitle }></a> >
				<{ /section }>
					<{ $article.title|truncate:25 }>
				</div>	
				<span class="more">�����壺<A href="javascript:fontZoomA();" title="������������С">С</A> <A href="javascript:fontZoomB();"title="��������������">��</A>��</span></div>
        	<div class="dd">
			<div id="title">
				<div class="nav"> </div>
				<h1><{ $article.title }></h1>
				<div class="nav"> </div>
				<div>�� ���ߣ�<span class="fontcolor"><{ $article.author }></span>  &nbsp;&nbsp;&nbsp;&nbsp;��Դ�� <span class="fontcolor"><{ $article.comeFrom }></span>&nbsp;&nbsp;&nbsp;&nbsp;�����: <span class="fontcolor"><{ $article.views }></span>      &nbsp;&nbsp;&nbsp;&nbsp;����ʱ�䣺 <span class="fontcolor"><{ $article.postTime|date_format:"%Y-%m-%d" }></span>   ��</div>
				<div class="nav"> </div>
			</div>
			<div class="nav"> </div>
			<div id="summary"><b>&nbsp;&nbsp;ժҪ:</b>&nbsp;&nbsp;<{ $article.summary }></div>
			<div class="nav"> </div>
			<div id="ccont">
				<{ $article.content }>
			</div>
			<div class="nav"> </div>
			<div class="dbar">
				<ul>
					<li>
						<span class="prve">��һƪ��</span> 
						<{ if $prevArticle eq false }>
							���ǵ�һƪ����һƪû������
						<{ else }>
							<a href="article.php?aid=<{ $prevArticle.id }>"><{ $prevArticle.title }></a>
						<{ /if }>

					</li> 
					<li>
						<span class="next">��һƪ��</span>
						<{ if $nextArticle eq false }>
							�������һƪ����һƪû������
						<{ else }>
							<a href="article.php?aid=<{ $nextArticle.id }>"><{ $nextArticle.title }></a>
						<{ /if }>							
					</li>
				</ul>
			</div>
		</div>
		</div>
		<div class="nav"></div>
		
		<div class="article">
			<div class="dt"><strong><a href="comments.php?aid=<{ $aid }>">��������</a></strong><span class="more"><a href="comments.php?aid=<{ $aid }>">�鿴ȫ������(<{ cacheless }><span class="red"><{ $commTotal }></span><{ /cacheless }>)ƪ>></a></span></div>	
			<{ cacheless }>	
			<div class="dd">
		
			<{if $smarty.session.isLogin }>
			<form action="comments.php?action=art" method="post">
			&nbsp;���Ծ����ػ�������ص����߷��棬�Ͻ�����ɫ�顢���������������ۡ�
			<input type="hidden" name="aid" value="<{ $article.id }>">
			<input type="hidden" name="uid" value="<{ $smarty.session.uid }>">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����:
			<input type="radio" name="cmt" checked value="0"><img src="<{ $stylePath }>/images/cmt-neu.gif" border=0>��
			<input type="radio" name="cmt"  value="1"><img src="<{ $stylePath }>/images/cmt-good.gif" border=0>����			
			<input type="radio" name="cmt"  value="-1"><img src="<{ $stylePath }>/images/cmt-bad.gif" border=0>����
			<{ $FCK }>
			<div class="subo"> 
				<input type="submit" class="button" name="sub" style="height:20px" value="��������">
				&nbsp;&nbsp;�������۽������ѱ����˿���������������վͬ����۵��֤ʵ��������		
			</div>	
			</form>
			<{ else }>
				��¼����ܷ�������......
			<{/if}>
			</div>	
			<{ /cacheless }>
		</div>
		
		<div class="nav"></div>
	</div>

	<div id="sidebar">
		<div class="sidebox">
       			<div class="dt"><strong>�������</strong></div>
        		<div class="dd dot">
          			<ul>
					<{ section name=article loop=$conns }>
						<li><a href="article.php?aid=<{ $conns[article].id }>"><{ $conns[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>Ŀǰû���κ��Ƽ�����</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
		<div class="sidebox">
       			<div class="dt"><strong>�Ƽ�����</strong></div>
        		 <div class="dd dot">
           			<ul>
					<{ section name=article loop=$recommends }>
						<li><a href="article.php?aid=<{ $recommends[article].id }>"><{ $recommends[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>û���κ��Ƽ�����</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
		<div class="sidebox">
       			<div class="dt"><strong>��������</strong></div>
        		 <div class="dd dot">
          			<ul>
					<{ section name=article loop=$hots }>
						<li><a href="article.php?aid=<{ $hots[article].id }>"><{ $hots[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>ǰû���κ��Ƽ�����</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
	</div>

	<{ include file="cial/footer.inc.tpl" }>
