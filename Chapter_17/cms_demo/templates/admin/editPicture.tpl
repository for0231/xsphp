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
		    <form  method="post" action="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&act=delete" onsubmit="return confirm('你确定要删除选中的图片项吗?')">
			<div class="msg-box">
				<ul class="viewmess">
					<li class="light-row">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;请从相册中选择需要编辑的图片&nbsp;&nbsp; <{ $select }>	
					</li>
					<{ if $showType eq "thumb" }>
					     <hr>
					     <div class="picthumb">
					     <{ section name=tu loop=$pics }>
						<div class="pic_list">	
							<{ if $pics[tu].hasThumb eq 1 || $pics[tu].hasMark eq 1 }>
								<a href="javascript:newopen(<{ $pics[tu].id }>)"><img alt="<{ $pics[tu].picTitle }>" src="<{ $path}><{ $pics[tu].picName|replace:".":"_new." }>" width="100" height="100"></a><br>
							<{ else }>
								<a href="javascript:newopen(<{ $pics[tu].id }>)"><img alt="<{ $pics[tu].picTitle }>" src="<{ $path}><{ $pics[tu].picName }>" width="100" height="100"></a><br>
							<{ /if }>
							<input type="checkbox" name="del[]" value="<{ $pics[tu].id }>">	
							<a href="javascript:newopen(<{ $pics[tu].id }>)"><{ $pics[tu].picTitle }></a><br>
						
							【<a href="main.php?action=modPicture&id=<{ $pics[tu].id }>">修改</a>/<a onclick="return confirm('确定要删除图片<{ $pics[tu].picTitle }>吗？')" href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $pics[tu].id }>&act=delete">删除</a>】
					      	</div>
					    <{ sectionelse }>
						<li class="light-row">
							该类中没有需要的图片
						</li>
					    <{ /section }>
					    </div>
					<{ elseif $showType eq "list" }>
					    	<li class="dark-row">
							<span class="list_width width_font">标&nbsp;&nbsp;题</span>
							<span class="list_width width_font">描&nbsp;&nbsp;述</span>
							<span class="list_width width_font">缩略/水印</span>
							<span class="list_width width_font">操&nbsp;&nbsp;作</span>
						</li>
				            <{ section name=tu loop=$pics }>
						<li class="light-row" style="padding-top:2px; padding-bottom:2px">
							<span class="list_width icon"><input type="checkbox" name="del[]" value="<{ $pics[tu].id }>"><a href="javascript:newopen(<{ $pics[tu].id }>)"><{ $pics[tu].picTitle }></a></span>
							<span class="list_width"><{ $pics[tu].description }></span>
							<span class="list_width"><{ if $pics[tu].hasThumb eq 1 }>有<{ else }>无<{ /if }>/<{ if $pics[tu].hasMark eq 1 }>有<{ else }>无<{ /if }></span>
				
							<span class="list_width">
							【<a href="main.php?action=modPicture&id=<{ $pics[tu].id }>">修改</a>】
							【<a onclick="return confirm('确定要删除图片<{ $pics[tu].picTitle }>吗？')" href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.current_page }>&id=<{ $pics[tu].id }>&act=delete">删除</a>】
							</span>
						</li>
					    <{ sectionelse }>
						<li class="light-row">
							本页没有需要的图片
						</li>
					    <{ /section }>
					<{ /if }>
				
					<li class="dark-row">
						<span class="col_width" style="margin-left:15px"> 
							<a href="javascript:select()">全选</a>/<a href="javascript:fanselect()">反选</a>/<a href="javascript:noselect()">全不选</a>&nbsp;&nbsp;选中项: 
							<input  name="delb" type="image" title="删除"  src="images/delete.gif">&nbsp;&nbsp;
						 </span> 
						<span class="right">
							该相册中共 <b><{ $pageInfo.row_total }></b> 张图片,本页显示 <{ $pageInfo.page_start }>-<{ $pageInfo.page_end }> 张图片&nbsp;&nbsp;&nbsp;&nbsp;<{ $pageInfo.current_page }>/<{ $pageInfo.page_num }>&nbsp;&nbsp;&nbsp;&nbsp;
							<{ if $pageInfo.current_page eq 1 }>
								<img border=0  alt="第一页" src="images/first.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=1"><img border=0 alt="第一页" src="images/first.gif"></a>&nbsp;&nbsp;
							<{ /if }>
							<{ if $pageInfo.prev_page }>	
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.prev_page }>"><img border=0  alt="上一页" src="images/prev.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="上一页" src="images/prev.gif">&nbsp;&nbsp;
							<{/if}>
						
						
							<{ if $pageInfo.next_page }>	
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.next_page }>"><img border=0  alt="下一页" src="images/next.gif"></a>&nbsp;&nbsp;
							<{ else }>
								<img border=0  alt="下一页" src="images/next.gif">&nbsp;&nbsp;
							<{/if}>
							<{ if $pageInfo.current_page eq $pageInfo.page_num }>
								<img border=0  alt="最后一页" src="images/last.gif">&nbsp;&nbsp;
							<{ else }>
								<a href="main.php?action=editPicture&catId=<{ $catId }>&page=<{ $pageInfo.page_num }>"><img border=0 alt="最后一页" src="images/last.gif"></a>&nbsp;&nbsp;
							<{ /if }>
						</span>
					</li>
				</ul>	
			</div>
                    </form>
		</div>
	</body>
</html>
