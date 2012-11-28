<{ include file="cial/header.inc.tpl" }>
	<div id="main">
		<div class="article">
		<div class="dt"><div>
				当前位置:	
				<{ section name=loc loop=$locs }>
					<a href="column.php?pid=<{ $locs[loc].colId }>" title="<{ $locs[loc].description }>"><{ $locs[loc].colTitle }></a> >
				<{ /section }>
					<{ $article.title|truncate:25 }>
				</div>	
				<span class="more">【字体：<A href="javascript:fontZoomA();" title="把正文字体缩小">小</A> <A href="javascript:fontZoomB();"title="把正文字体扩大">大</A>】</span></div>
        	<div class="dd">
			<div id="title">
				<div class="nav"> </div>
				<h1><{ $article.title }></h1>
				<div class="nav"> </div>
				<div>【 作者：<span class="fontcolor"><{ $article.author }></span>  &nbsp;&nbsp;&nbsp;&nbsp;来源： <span class="fontcolor"><{ $article.comeFrom }></span>&nbsp;&nbsp;&nbsp;&nbsp;点击数: <span class="fontcolor"><{ $article.views }></span>      &nbsp;&nbsp;&nbsp;&nbsp;更新时间： <span class="fontcolor"><{ $article.postTime|date_format:"%Y-%m-%d" }></span>   】</div>
				<div class="nav"> </div>
			</div>
			<div class="nav"> </div>
			<div id="summary"><b>&nbsp;&nbsp;摘要:</b>&nbsp;&nbsp;<{ $article.summary }></div>
			<div class="nav"> </div>
			<div id="ccont">
				<{ $article.content }>
			</div>
			<div class="nav"> </div>
			<div class="dbar">
				<ul>
					<li>
						<span class="prve">上一篇：</span> 
						<{ if $prevArticle eq false }>
							这是第一篇，上一篇没有文章
						<{ else }>
							<a href="article.php?aid=<{ $prevArticle.id }>"><{ $prevArticle.title }></a>
						<{ /if }>

					</li> 
					<li>
						<span class="next">下一篇：</span>
						<{ if $nextArticle eq false }>
							这是最后一篇，下一篇没有文章
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
			<div class="dt"><strong><a href="comments.php?aid=<{ $aid }>">发表评论</a></strong><span class="more"><a href="comments.php?aid=<{ $aid }>">查看全部评论(<{ cacheless }><span class="red"><{ $commTotal }></span><{ /cacheless }>)篇>></a></span></div>	
			<{ cacheless }>	
			<div class="dd">
		
			<{if $smarty.session.isLogin }>
			<form action="comments.php?action=art" method="post">
			&nbsp;请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。
			<input type="hidden" name="aid" value="<{ $article.id }>">
			<input type="hidden" name="uid" value="<{ $smarty.session.uid }>">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评价:
			<input type="radio" name="cmt" checked value="0"><img src="<{ $stylePath }>/images/cmt-neu.gif" border=0>中
			<input type="radio" name="cmt"  value="1"><img src="<{ $stylePath }>/images/cmt-good.gif" border=0>好评			
			<input type="radio" name="cmt"  value="-1"><img src="<{ $stylePath }>/images/cmt-bad.gif" border=0>差评
			<{ $FCK }>
			<div class="subo"> 
				<input type="submit" class="button" name="sub" style="height:20px" value="发表评论">
				&nbsp;&nbsp;网友评论仅供网友表达个人看法，并不表明本站同意其观点或证实其描述。		
			</div>	
			</form>
			<{ else }>
				登录后才能发表评论......
			<{/if}>
			</div>	
			<{ /cacheless }>
		</div>
		
		<div class="nav"></div>
	</div>

	<div id="sidebar">
		<div class="sidebox">
       			<div class="dt"><strong>相关文章</strong></div>
        		<div class="dd dot">
          			<ul>
					<{ section name=article loop=$conns }>
						<li><a href="article.php?aid=<{ $conns[article].id }>"><{ $conns[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>目前没有任何推荐文章</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
		<div class="sidebox">
       			<div class="dt"><strong>推荐文章</strong></div>
        		 <div class="dd dot">
           			<ul>
					<{ section name=article loop=$recommends }>
						<li><a href="article.php?aid=<{ $recommends[article].id }>"><{ $recommends[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>没有任何推荐文章</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
		<div class="sidebox">
       			<div class="dt"><strong>热门文章</strong></div>
        		 <div class="dd dot">
          			<ul>
					<{ section name=article loop=$hots }>
						<li><a href="article.php?aid=<{ $hots[article].id }>"><{ $hots[article].title|truncate:25 }></a></li>
					<{ sectionelse }>
						<li>前没有任何推荐文章</li>
					<{ /section }>
          			</ul>
			</div>
       		 </div>
		<div class="nav"> </div>
	</div>

	<{ include file="cial/footer.inc.tpl" }>
