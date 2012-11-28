<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>无标题文档</title>
		<meta name="Author" content="高洛峰" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="style/lampcms.css">
	</head>
	<body>
		<div id="main">
		    <{ include file="admin/title.tpl" }>
		    <form  method="post" action="main.php?action=editFlink&page=<{ $pageInfo.current_page }>" >
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="list_width width_font">网站名称</span>
						<span class="list_width width_font" style="width:200px">网站地址</span>
						<span class="list_width width_font">添加时间</span>
						<span class="list_width width_font">操&nbsp;&nbsp;作</span>
					</li>
				        <{ section name=doc loop=$links }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width"><input type="text" name="linkOrder[]" size="2" maxlength="3" value="<{ $links[doc].ord }>">&nbsp;<{ $links[doc].webName }></span>
							<input type="hidden" name="linkIds[]" value="<{ $links[doc].id }>">
							<span class="list_width" style="width:200px"><{ $links[doc].url }></span>
							<span class="list_width"><{ $links[doc].dtime|date_format:"%Y-%m-%d" }></span>
				
							<span class="list_width" style="width:160px;">
						
							【<a href="main.php?action=addFlink&edit=mod&id=<{ $links[doc].id }>">修改</a>】
							【<a onclick="return confirm('确定要删除友情链接<{ $links[doc].webName }>吗？')" href="main.php?action=editFlink&page=<{ $pageInfo.current_page }>&id=<{ $links[doc].id }>&edit=del">删除</a>】
							</span>
						</li>
					<{ sectionelse }>
						<li class="light-row">
							没有添加任何友情链接
						</li>
					<{ /section }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:20px;width:240px"> 
							<input class="button" name="order" type="submit" value="改变显示顺序">
						 </span> 
						<span class="right">
							共 <b><{ $pageInfo.row_total }></b> 个友情链接,本页显示 <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> 个&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="第一页" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editFlink&page=1"><img border=0 alt="第一页" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editFlink&&page=<{ $pageInfo.prev_page }>"><img border=0  alt="上一页" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="上一页" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editFlink&page=<{ $pageInfo.next_page }>"><img border=0  alt="下一页" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="下一页" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="最后一页" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editFlink&page=<{ $pageInfo.page_num }>"><img border=0 alt="最后一页" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
