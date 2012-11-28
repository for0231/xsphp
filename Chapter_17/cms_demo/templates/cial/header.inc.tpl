<html>
	<head>
		<title><{ $appName }></title>
		<meta name="Author" content="高洛峰" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/global.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/layout.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/print.css">
		<script src="<{ $stylePath }>/javascript/common.js"></script>
	</head>
	<body>
		<div id="content">
			<div id="header">
				<div id="top">
					<div id="top_left">
						<{ cacheless }>
						<{ if $smarty.session.isLogin }>
							
          						&nbsp;<b> <{ $smarty.session.uname }> 您好!&nbsp;现在是<{$smarty.now|date_format:"%m月%d日%H点%M分"}>&nbsp;[<a href="login.php?action=logout">退出</a>]  </b>
						<{ else }>
						<form action="login.php?action=login" method="post">
							&nbsp;
							       <input type="hidden" name="url" value="<{ $url }>">
							用户名:<input class="inputheight" name="username" type="text" size="10">&nbsp;
							密码:<input class="inputheight" name="password" type="password" size="10">
							<input type="submit" class="button"  name="loginsubmit" value="登录">&nbsp;
							<a href="register.php"><span style="color:green">免费注册</span></a>
						</form>
						<{ /if }>
						<{ /cacheless }>
						
					</div>

					<div id="top_right">
						<form action="search.php" method="get">
							<input type="radio" <{ if $serType eq "title" or $serType eq null }> checked <{ /if }> name="serType" value="title">标题
							<input type="radio" <{ if $serType eq "content"}> checked <{ /if }> name="serType" value="content">内容
							<input type="radio" <{ if $serType eq "keyword"}> checked <{ /if }> name="serType" value="keyword">关键字
							<input type="text"  name="search" size="15" value="<{ $searchValue }>" maxlength="255">
							<input type="submit"  class="button"  value="搜索">&nbsp;
						</form>
					</div>
				</div>
				
				<div id="logo">
					<a href="<{ $appPath }>"><img border="0" alt="lampBrother_logo" src="<{ $stylePath }>/images/logo.gif"></a>
				</div>
				<div id="right_box">
					<div id="banner">	
   						<a href=""><img width="500" height="70" alt="banner" src="<{ $stylePath }>/images/banner.gif" border=0></a>
					</div>

					<div id="tool">
						
						<ul>
							<li><a href="">用户定义</a></li>
							<li><a href="">用户定义</a></li>
							<li><a href="">用户定义</a></li>
							<li><a href="">用户定义</a></li>
						</ul>
					</div>
				</div>
				<div class="nav"> </div>
			</div>	
			<div id="menu">
				<ul>
					<li><a href="column.php?pid=1">网站首页</a></li><li class="menudiv"> </li>
				
					<{ section name=li loop=$menu }>
						<li><a href="column.php?pid=<{ $menu[li].colId }>"><{ $menu[li].colTitle }></a></li><li class="menudiv"> </li>
					<{ /section }>
					<li><a href="http://bbs.lampbrother.net" target="_blank">论坛交流</a></li>
				</ul>			
			</div>
			<div class="nav"> </div>
			<div id="container">
			
