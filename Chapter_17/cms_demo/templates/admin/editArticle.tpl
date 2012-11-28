<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>无标题文档</title>
		<meta name="Author" content="高洛峰" />
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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请从文档分类中选择需要编辑的文档&nbsp;&nbsp; <{ $colSelect }>	
					</li>
					
					<li class="dark-row">
						<span class="list_width width_font">标题(评论次数)</span>
						<span class="list_width width_font">作&nbsp;&nbsp;者</span>
						<span class="list_width width_font">添加时间</span>
						<span class="list_width width_font">操&nbsp;&nbsp;作</span>
					</li>
				        <{ section name=doc loop=$arts }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width"><input type="checkbox" name="del[]" value="<{ $arts[doc].id }>"><a href="<{ $appPath }>article.php?aid=<{ $arts[doc].id }>" target="_blank"><{ $arts[doc].title }></a><span class="red_font">(<{ $arts[doc].comms }>)</span></span>
							<span class="list_width"><{ $arts[doc].author }></span>
							<span class="list_width"><{ $arts[doc].postTime|date_format:"%Y-%m-%d %H:%M:%S" }></span>
				
							<span class="list_width" style="width:160px;">
							<{ if $arts[doc].audit eq 0 }>
								【<a href="main.php?action=editArticle&edit=audit&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $arts[doc].id }>">审核</a>】
							<{ else }>
								【<a href="main.php?action=editArticle&edit=lock&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $arts[doc].id }>">锁定</a>】
							<{/if}>
							【<a href="main.php?action=addArticle&edit=mod&id=<{ $arts[doc].id }>">修改</a>】
							【<a onclick="return confirm('确定要删除图片<{ $arts[doc].title }>吗？')" href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $arts[doc].id }>&edit=del">删除</a>】
							</span>
						</li>
					<{ sectionelse }>
						<li class="light-row">
							本页没有文章
						</li>
					<{ /section }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:15px;width:240px"> 
							<a href="javascript:select()">全选</a>/<a href="javascript:fanselect()">反选</a>/<a href="javascript:noselect()">全不选</a>&nbsp;&nbsp;选中项: 
							<input  name="audits" type="image" title="审核"  src="images/audit.gif">&nbsp;&nbsp;
							<input  name="locks" type="image" title="锁定"  src="images/lock.gif">&nbsp;&nbsp;
							<input  name="dels" type="image" title="删除" onClick="return confirm('你确定要删除选中的图片项吗?')"  src="images/delete.gif">&nbsp;&nbsp;
						 </span> 
						<span class="right">
							该栏目中共 <b><{ $pageInfo.row_total }></b> 篇文章,本页显示 <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> 篇&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="第一页" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=1"><img border=0 alt="第一页" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="上一页" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="上一页" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="下一页" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="下一页" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="最后一页" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editArticle&catId=<{ $catId }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="最后一页" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
