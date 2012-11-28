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
		    <form  method="post" action="main.php?action=editUser&page=<{ $pageInfo.current_page }>" onsubmit="return confirm('你确定要删除选中的图片项吗?')"  >
			<div class="msg-box">
				<ul class="viewmess">
					<li class="dark-row">
						<span class="list_width width_font">用户名</span>
						<span class="list_width width_font" style="width:200px">电子邮件</span>
						<span class="list_width width_font">注册时间</span>
						<span class="list_width width_font">操&nbsp;&nbsp;作</span>
					</li>
				        <{ section name=doc loop=$users }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width">
							<{ if $users[doc].id ne 1 }>
								<input type="checkbox" name="del[]"  value="<{ $users[doc].id }>">
							<{ /if }>
							<{ $users[doc].userName }>
							</span>
							
							<span class="list_width" style="width:200px"><{ $users[doc].email }></span>
							<span class="list_width"><{ $users[doc].regTime|date_format:"%Y-%m-%d" }></span>
				
							<span class="list_width" style="width:160px;">
						
							【<a href="main.php?action=addUser&edit=mod&id=<{ $users[doc].id }>">修改</a>】
							<{ if $users[doc].id ne 1 }>
							【<a onclick="return confirm('确定要删除用户<{ $users[doc].userName }>吗？')" href="main.php?action=editUser&page=<{ $pageInfo.current_page }>&id=<{ $users[doc].id }>&edit=del">删除</a>】
							<{ /if }>
							</span>
						</li>
					<{ sectionelse }>
						<li class="light-row">
							该页没有用户
						</li>
					<{ /section }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:15px;width:240px"> 
							<a href="javascript:select()">全选</a>/<a href="javascript:fanselect()">反选</a>/<a href="javascript:noselect()">全不选</a>&nbsp;&nbsp;选中项: 
							
							<input  name="dels" type="image" title="删除" value="delete" src="images/delete.gif">&nbsp;&nbsp;
						 </span> 
						<span class="right">
							共 <b><{ $pageInfo.row_total }></b> 个用户,本页显示 <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> 个&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="第一页" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editUser&page=1"><img border=0 alt="第一页" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editUser&&page=<{ $pageInfo.prev_page }>"><img border=0  alt="上一页" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="上一页" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editUser&page=<{ $pageInfo.next_page }>"><img border=0  alt="下一页" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="下一页" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="最后一页" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editUser&page=<{ $pageInfo.page_num }>"><img border=0 alt="最后一页" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
