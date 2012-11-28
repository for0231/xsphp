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
		<div id="menu">
			<div class="option">
				<div class="menutitle">【管理选项】</div>
				<div class="content">
					<ul>
						<li class="opt">
							<a href="main.php?action=system" onclick="switchmenu('optionmenu','menulist',0)" target="main">
							<img onmouseover="cimg(this, 'system_h.gif')" onmouseout="cimg(this, 'system_d.gif')" border="0" src="images/system_d.gif"><br>
							 系统管理</a></a>
						</li>
						<li class="opt">
							<a href="main.php?action=article" onclick="switchmenu('optionmenu','menulist',1)" target="main">
							<img onmouseover="cimg(this, 'article_h.gif')" onmouseout="cimg(this, 'article_d.gif')" border="0" src="images/article_d.gif"><br>
							内容管理</a>
						</li>
						<li class="opt">	
							 <a href="main.php?action=user" onclick="switchmenu('optionmenu','menulist',2)" target="main">
							 <img onmouseover="cimg(this, 'user_h.gif')" onmouseout="cimg(this, 'user_d.gif')" border="0" src="images/user_d.gif"><br>
							 用户管理</a>
						</li>
					</ul>
				 </div>
			</div>
			<div class="nav"> </div>
			<div class="option">
				<div id="optionmenu" class="menutitle">【系统管理】</div>
				<div id="menulist" class="content"> 
				    	<div style="display:block">					
						<h4 onclick="domenu(this, 'list1')" class="tit">--常规设置--</h4>
						<ul id="list1">
							<li><a class="list" href="main.php?action=sysInfo" target="main">系统信息</a></li>
							<li><a class="list" href="main.php?action=baseSet" target="main">基本设置</a></li>
							<li><a class="list" href="main.php?action=updateCache" target="main">更新缓存</a></li>
							
						</ul>
						<h4 onclick="domenu(this, 'list2')" class="tit">--友情链接管理--</h4>
						<ul id="list2">
							<li><a class="list" href="main.php?action=addFlink" target="main">添加友情链接</a></li>
							<li><a class="list" href="main.php?action=editFlink" target="main">管理友情链接</a></li>
						</ul>
					</div>

					<div>
						<h4 onclick="domenu(this, 'list21')" class="tit">--图片管理--</h4>
						<ul id="list21">
							<li><a class="list" href="main.php?action=addAlbum" target="main">添加相册</a></li>
							<li><a class="list" href="main.php?action=editAlbum" target="main">编辑相册</a></li>
							<li><a class="list" href="main.php?action=addPicture" target="main">添加图片</a></li>
							<li><a class="list" href="main.php?action=editPicture" target="main">管理图片</a></li>
						</ul>
						<h4 onclick="domenu(this, 'list22')" class="tit">--栏目设置--</h4>
						<ul id="list22">
							<li><a class="list" href="main.php?action=addCat" target="main">添加栏目</a></li>
							<li><a class="list" href="main.php?action=editCat" target="main">管理栏目</a></li>
						</ul>
						<h4 onclick="domenu(this, 'list23')" class="tit">--文章管理--</h4>
						<ul id="list23">
							<li><a class="list"  href="main.php?action=addArticle" target="main">添加文章</a></li>
							<li><a class="list"  href="main.php?action=editArticle" target="main">管理文章</a></li>
							
						</ul>
	
				
					</div>
					<div>
						<h4 onclick="domenu(this, 'list31')" class="tit">--账号管理--</h4>
						<ul id="list31">
							<li><a class="list" href="main.php?action=addUser" target="main">添加用户</a></li>
							<li><a class="list" href="main.php?action=editUser" target="main">编辑用户</a></li>
						</ul>
					</div>

					<script>
						switchmenu('optionmenu','menulist',0);
					</script>
				</div>
			</div>
		</div>
	</body>
</html>


