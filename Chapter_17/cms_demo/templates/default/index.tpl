<{ include file="default/header.inc.tpl" }>
	<div id="main">
		<{ section name=col loop=$cols }>
			<{ if $smarty.section.col.index is div by 2 }>
				<div class="leftbox">
			<{ else }>
				<div class="rightbox">
			<{ /if }>
				
       				<div class="dt"><strong><a href="column.php?pid=<{ $cols[col].colId }>"><{ $cols[col].colTitle|truncate:25 }></a></strong><span class="more"><a href="column.php?pid=<{ $cols[col].colId }>">更多...</a></span></div>
        			<div class="dd">
					<div class="left">
						<a href="column.php?pid=<{ $cols[col].colId }>"><img src="<{ $cols[col].picId }>" border="0" width="80" height="80"></a>
						<{ if $cols[col].subCol ne null }>
							<ul>
								<{ section name=sub loop=$cols[col].subCol max=4 }>
									<li><a href="column.php?pid=<{ $cols[col].subCol[sub].colId }>">&nbsp;&nbsp;&nbsp;<{ $cols[col].subCol[sub].colTitle }></a></li>
								<{ /section }>
							</ul>
						<{ /if }>
					</div>
					<div class="right dot">
						<ul>
							<{ section name=article loop=$cols[col].art max=10 }>
								<li><a href="article.php?aid=<{ $cols[col].art[article].id }>"><{ $cols[col].art[article].title|truncate:25 }></a></li>
							<{ sectionelse }>
								<li>该栏目中没有任何文章</li>
							<{ /section }>
						</ul>
					</div>
					
       				</div>
       		 	</div>
			<{ if $smarty.section.col.rownum is div by 2 }>
				<{ if $smarty.section.col.last eq false }>
					<div class="nav"> </div>
				<{ /if }>
			<{/if}>
		<{ /section }>
	</div>

	<div id="sidebar">
		<div class="sidebox">
       			<div class="dt"><strong>强烈推荐</strong></div>
        		<div class="dd dot">
          			<ul>
					<{ section name=article loop=$recommends max=10 }>
						<li><a href="article.php?aid=<{ $recommends[article].id }>"><{ $recommends[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>目前没有任何推荐文章</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
		<div class="sidebox">
       			<div class="dt"><strong>最近更新</strong></div>
        		 <div class="dd dot">
            			<ul>
					<{ section name=article loop=$news max=10 }>
						<li><a href="article.php?aid=<{ $news[article].id }>"><{ $news[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>目前没有任何推荐文章</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
		<div class="sidebox">
       			<div class="dt"><strong>本月热点</strong></div>
        		 <div class="dd dot">
          			<ul>
					<{ section name=article loop=$hots max=10 }>
						<li><a href="article.php?aid=<{ $hots[article].id }>"><{ $hots[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>目前没有任何推荐文章</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
	</div>

	<div class="nav"> </div>
	<div id="link">
       		<div class="dt"><strong><span>友情链接</span></strong></div>
        	<div class="dd">
               		<ul>
				<{ section name=fri loop=$links }>
					<li><a href="<{ $links[fri].url }>" target="_blank">
						<{ if $links[fri].list }>
							<img height="40" alt="<{ $links[fri].webName }>" src="<{ $links[fri].logo }>" border="0" >
						<{else}>
							<{ $links[fri].webName }>
						<{/if}>

					</a></li>
				<{ /section }>
          		</ul>
		</div>
      	 </div>
	<div class="nav"> </div>
	<{ include file="default/footer.inc.tpl" }>
