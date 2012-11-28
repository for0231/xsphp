<{ include file="cial/header.inc.tpl" }>
	<div id="main">
		<div class="column_left">
       			<div class="dt"><strong><span>��Ŀ����</strong></div>
        		<div class="dd">
				<ul>
					<{ section name=col loop=$columnMenu }>
						<li class="par"><a href="column.php?pid=<{ $columnMenu[col].colId }>" title="<{ $columnMenu[col].description }>" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<{ $columnMenu[col].colTitle }></a></li>
						<{ if $columnMenu[col].subCol ne null }>
							<{ section name=sub loop=$columnMenu[col].subCol }>
								<li class="sub"><a href="column.php?pid=<{ $columnMenu[col].subCol[sub].colId }>" title="<{ $columnMenu[col].subCol[sub].description }>" >&nbsp;&nbsp;&nbsp;&nbsp;<{ $columnMenu[col].subCol[sub].colTitle }></a></li>
							<{ /section }>
						<{ /if }>
					<{ sectionelse }>
						<li>����Ŀ��û������Ŀ</li>
					<{ /section }>
				</ul>	
       			</div>
		</div>
	
		<div class="column_right">
       			<div class="dt">
				<div>��ǰλ�ã�
				<{ section name=loc loop=$locs }>
					<a href="column.php?pid=<{ $locs[loc].colId }>" title="<{ $locs[loc].description }>"><{ $locs[loc].colTitle }></a> >
				<{ /section }>		
					<a href="column.php?pid=<{ $column.colId }>"><{ $column.colTitle }></a> 
				</div>
			</div>
        		<div class="dd">
				<{ if $column.colId ne 1 }>
				<div class="column_top">
					<{ if $column.picId eq false }>
						<img src="<{ $stylePath }>/images/nophoto.gif" border="0" width="80" height="80">
					<{ else }>
						<img src="<{ $column.picId }>" border="0" width="80" height="80">
					<{ /if }>
					<span>
						<{ $column.description }>
					</span>
					<div class="nav"> </div>
				</div>
				<{ /if }>
				<div class="tit">
					<span class="col1">&nbsp;&nbsp;&nbsp;&nbsp;���±���</span> 
					<span class="col2">����</span>
					<span class="col2">����ʱ��</span></li>
				</div>
				<ul class="dot">

					<{ section name=col loop=$column.art }>
						<li>
							<span class="col1"><a href="article.php?aid=<{ $column.art[col].id }>" title="<{ $column.art[col].title }>"><{ $column.art[col].title|truncate:25 }></a></span>							     		     			  <span class="col2"><{ $column.art[col].author }></span>
							<span class="col2"><{ $column.art[col].postTime|date_format:"%Y-%m-%d" }></span>

						</li>
					<{ sectionelse }>
						<li>����Ŀ��û������</li>
					<{ /section }>
				
				</ul>	
				<div class="page">
					����Ŀ�й� <b><{ $pageInfo.row_total }></b> ƪ����,��ҳ��ʾ�� <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> ƪ&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
					<{ if $pageInfo.current_page eq 1 }>
						<img border=0  alt="��һҳ" src="<{ $stylePath }>/images/first.gif">&nbsp;&nbsp;
					<{ else }>
						<a href="column.php?pid=<{ $column.colId }>&page=1"><img border=0 alt="��һҳ" src="<{ $stylePath }>/images/first.gif"></a>&nbsp;&nbsp;
					<{ /if }>
					<{ if $pageInfo.prev_page }>	
						<a href="column.php?pid=<{ $column.colId }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="��һҳ" src="<{ $stylePath }>/images/prev.gif"></a>&nbsp;&nbsp;
					<{ else }>
						<img border=0  alt="��һҳ" src="<{ $stylePath }>/images/prev.gif">&nbsp;&nbsp;
					<{/if}>
					<{ if $pageInfo.next_page }>	
						<a href="column.php?pid=<{ $column.colId }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="��һҳ" src="<{ $stylePath }>/images/next.gif"></a>&nbsp;&nbsp;
					<{ else }>
						<img border=0  alt="��һҳ" src="<{ $stylePath }>/images/next.gif">&nbsp;&nbsp;
					<{/if}>
					<{ if $pageInfo.current_page eq $pageInfo.page_num }>
						<img border=0  alt="���һҳ" src="<{ $stylePath }>/images/last.gif">&nbsp;&nbsp;
					<{ else }>
						<a href="column.php?pid=<{ $column.colId }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="���һҳ" src="<{ $stylePath }>/images/last.gif"></a>&nbsp;&nbsp;
					<{ /if }>
				</div>
       			</div>
		</div>
	</div>

	<div id="sidebar">
		<div class="sidebox">
       			<div class="dt"><strong>�����Ƽ�</strong></div>
        		<div class="dd dot">
          			<ul>
					<{ section name=article loop=$recommends }>
						<li><a href="article.php?aid=<{ $recommends[article].id }>"><{ $recommends[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>Ŀǰû���κ��Ƽ�����</li>
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
						<li>Ŀǰû���κ��Ƽ�����</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
	</div>

	<div class="nav"> </div>
	<{ include file="cial/footer.inc.tpl" }>
