<{ include file="default/header.inc.tpl" }>
	<{ cacheless }>
	<div class="comm">
		<div class="dt"><div><b>评论列表</b>（评论：<a style="color:red" href="article.php?aid=<{ $article.id }>"><{ $article.title }></a>）</div><span class="more">全部评论 (<span class="red"><{ $pageInfo.row_total }></span>)</span></div>	

		<div class="dd">
			<{ section name=con loop=$comment }>
			<div class="commtitle">
				<div class="pleft">&nbsp;<b class="titl"><{ $comment[con].username }></b> 
					<{ if $comment[con].cmt eq 0 }>
						<img alt="中立" src="<{ $stylePath }>/images/cmt-neu.gif">  
					<{ elseif $comment[con].cmt eq 1 }>
						<img alt="好评" src="<{ $stylePath }>/images/cmt-good.gif">
					<{ elseif $comment[con].cmt eq -1 }>
						<img alt="差评" src="<{ $stylePath }>/images/cmt-bad.gif">
					<{ /if }>
				
					于 <{ $comment[con].postTime|date_format:"%m-%d %H:%M" }> 说到
				</div>
				<div class="pright"> 
				<a href="#" onclick="setCom(this, 1, <{ $comment[con].id }>)">支持[<span class="red"><{ $comment[con].support }></span>]</a> &nbsp;&nbsp;&nbsp;
				<a href="#" onclick="setCom(this, 2, <{ $comment[con].id }>)">反对[<span class="red"><{ $comment[con].oppose }></span>]</a> &nbsp;&nbsp;&nbsp;<a href="#comment" onclick="quote('hquote', <{ $comment[con].id }>)">引用</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<{ if $smarty.session.uid eq 1 }>
					【<a href="comm_pro.php?action=del&cid=<{ $comment[con].id }>&file=comments.php&aid=<{$article.id }>&page=<{ $pageInfo.current_page }>">删除</a>】
				<{ /if }>
				</div>
			</div>

			<div class="commtent">
				<{ $comment[con].content }>
			</div>
			<{ sectionelse }>
				目前还没有对文章 <b><{ $article.title }></b> 的评论！
			<{ /section }>
			<div class="page">
				本页显示第 <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> 篇&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
				<{ if $pageInfo.current_page eq 1 }>
					<img border=0  alt="第一页" src="<{ $stylePath }>/images/first.gif">&nbsp;&nbsp;
				<{ else }>
					<a href="comments.php?aid=<{ $article.id }>&page=1"><img border=0 alt="第一页" src="<{ $stylePath }>/images/first.gif"></a>&nbsp;&nbsp;
				<{ /if }>
				<{ if $pageInfo.prev_page }>	
					<a href="comments.php?aid=<{ $article.id }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="上一页" src="<{ $stylePath }>/images/prev.gif"></a>&nbsp;&nbsp;
				<{ else }>
					<img border=0  alt="上一页" src="<{ $stylePath }>/images/prev.gif">&nbsp;&nbsp;
				<{/if}>
				<{ if $pageInfo.next_page }>	
					<a href="comments.php?aid=<{ $article.id }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="下一页" src="<{ $stylePath }>/images/next.gif"></a>&nbsp;&nbsp;
				<{ else }>
					<img border=0  alt="下一页" src="<{ $stylePath }>/images/next.gif">&nbsp;&nbsp;
				<{/if}>
				<{ if $pageInfo.current_page eq $pageInfo.page_num }>
					<img border=0  alt="最后一页" src="<{ $stylePath }>/images/last.gif">&nbsp;&nbsp;
				<{ else }>
					<a href="comments.php?aid=<{ $article.id }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="最后一页" src="<{ $stylePath }>/images/last.gif"></a>&nbsp;&nbsp;
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
			<img src="<{ $stylePath }>/images/comm1.gif">&nbsp;请自觉遵守互联网相关的政策法规，严禁发布色情、暴力、反动的言论。
			<input type="hidden" name="quote" id="hquote" value="">
			<input type="hidden" name="aid" value="<{ $article.id }>">
			<input type="hidden" name="uid" value="<{ $smarty.session.uid }>">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评价:
			<input type="radio" name="cmt" checked value="0"><img alt="中立" src="<{ $stylePath }>/images/cmt-neu.gif">中立
			<input type="radio" name="cmt"  value="1"><img alt="好评" src="<{ $stylePath }>/images/cmt-good.gif">好评
			<input type="radio" name="cmt"  value="-1"><img alt="差评" src="<{ $stylePath }>/images/cmt-bad.gif">差评 		
			<{ $FCK }>
			<div class="subo"> 
				<input type="submit" class="button" name="sub" style="height:20px" value="发表评论">
				&nbsp;&nbsp;网友评论仅供网友表达个人看法，并不表明本站同意其观点或证实其描述。		
			</div>	
		</form>
		<{ else }>
			登录后才能发表评论......
		<{ /if }>
		
		<div class="nav"> </div>
	</div>
	<{ /cacheless }>
<{ include file="default/footer.inc.tpl" }>
