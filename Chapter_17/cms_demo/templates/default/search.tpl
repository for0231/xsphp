<{ include file="default/header.inc.tpl" }>
	<div id="main">
		<{ cacheless }>
		<div id="search">
       			<div class="dt"><strong><div>文章搜索结果</div></strong><span class="more">共搜索到<span class="redcolor"> <{ $pageInfo.row_total }> </span>篇符合条件的文章</span></div>
        		<div class="dd dot">
				<ul>
					<{ section name=article loop=$searchs }>	
						<{ if $smarty.section.article.index is div by 2 }>
							<li>
						<{ else }>
							<li  class="li_bg">
						<{ /if }>
							<a href="article.php?aid=<{ $searchs[article].id }>"><{ $searchs[article].title|truncate:30 }></a>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;作者：
							<span class="fontcolor"><{ $searchs[article].author }></span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发布时间：
							<span class="fontcolor"><{ $searchs[article].postTime|date_format:"%Y-%m-%d" }></span>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人气：
							<span class="fontcolor"><{ $searchs[article].views }></span>
						</li>
					<{ sectionelse }>
						<li>没有符合条件的文章</li>
					<{ /section }>
				</ul>
					<div class="page">
					本页显示第 <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> 篇&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
					<{ if $pageInfo.current_page eq 1 }>
						<img border=0  alt="第一页" src="<{ $stylePath }>/images/first.gif">&nbsp;&nbsp;
					<{ else }>
						<a href="search.php?serType=<{ $serType }>&search=<{ $search }>&page=1"><img border=0 alt="第一页" src="<{ $stylePath }>/images/first.gif"></a>&nbsp;&nbsp;
					<{ /if }>
					<{ if $pageInfo.prev_page }>	
						<a href="search.php?serType=<{ $serType }>&search=<{ $search }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="上一页" src="<{ $stylePath }>/images/prev.gif"></a>&nbsp;&nbsp;
					<{ else }>
						<img border=0  alt="上一页" src="<{ $stylePath }>/images/prev.gif">&nbsp;&nbsp;
					<{/if}>
					<{ if $pageInfo.next_page }>	
						<a href="search.php?serType=<{ $serType }>&search=<{ $search }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="下一页" src="<{ $stylePath }>/images/next.gif"></a>&nbsp;&nbsp;
					<{ else }>
						<img border=0  alt="下一页" src="<{ $stylePath }>/images/next.gif">&nbsp;&nbsp;
					<{/if}>
					<{ if $pageInfo.current_page eq $pageInfo.page_num }>
						<img border=0  alt="最后一页" src="<{ $stylePath }>/images/last.gif">&nbsp;&nbsp;
					<{ else }>
						<a href="search.php?serType=<{ $serType }>&search=<{ $search }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="最后一页" src="<{ $stylePath }>/images/last.gif"></a>&nbsp;&nbsp;
					<{ /if }>
				</div>
			</div>	
		</div>
		<{ /cacheless }>
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
	<{ include file="default/footer.inc.tpl" }>
