<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>�ޱ����ĵ�</title>
		<meta name="Author" content="�����" />
		<meta name="Keywords" content="php,lampbrother" />
		<link rel="stylesheet" type="text/css" href="style/lampcms.css">
		<script src="javascript/common.js"></script>
	</head>

	<body>
		<div id="menu">
			<div class="option">
				<div class="menutitle">������ѡ�</div>
				<div class="content">
					<ul>
						<li class="opt">
							<a href="main.php?action=system" onclick="switchmenu('optionmenu','menulist',0)" target="main">
							<img onmouseover="cimg(this, 'system_h.gif')" onmouseout="cimg(this, 'system_d.gif')" border="0" src="images/system_d.gif"><br>
							 ϵͳ����</a></a>
						</li>
						<li class="opt">
							<a href="main.php?action=article" onclick="switchmenu('optionmenu','menulist',1)" target="main">
							<img onmouseover="cimg(this, 'article_h.gif')" onmouseout="cimg(this, 'article_d.gif')" border="0" src="images/article_d.gif"><br>
							���ݹ���</a>
						</li>
						<li class="opt">	
							 <a href="main.php?action=user" onclick="switchmenu('optionmenu','menulist',2)" target="main">
							 <img onmouseover="cimg(this, 'user_h.gif')" onmouseout="cimg(this, 'user_d.gif')" border="0" src="images/user_d.gif"><br>
							 �û�����</a>
						</li>
					</ul>
				 </div>
			</div>
			<div class="nav"> </div>
			<div class="option">
				<div id="optionmenu" class="menutitle">��ϵͳ����</div>
				<div id="menulist" class="content"> 
				    	<div style="display:block">					
						<h4 onclick="domenu(this, 'list1')" class="tit">--��������--</h4>
						<ul id="list1">
							<li><a class="list" href="main.php?action=sysInfo" target="main">ϵͳ��Ϣ</a></li>
							<li><a class="list" href="main.php?action=baseSet" target="main">��������</a></li>
							<li><a class="list" href="main.php?action=updateCache" target="main">���»���</a></li>
							
						</ul>
						<h4 onclick="domenu(this, 'list2')" class="tit">--�������ӹ���--</h4>
						<ul id="list2">
							<li><a class="list" href="main.php?action=addFlink" target="main">�����������</a></li>
							<li><a class="list" href="main.php?action=editFlink" target="main">������������</a></li>
						</ul>
					</div>

					<div>
						<h4 onclick="domenu(this, 'list21')" class="tit">--ͼƬ����--</h4>
						<ul id="list21">
							<li><a class="list" href="main.php?action=addAlbum" target="main">������</a></li>
							<li><a class="list" href="main.php?action=editAlbum" target="main">�༭���</a></li>
							<li><a class="list" href="main.php?action=addPicture" target="main">���ͼƬ</a></li>
							<li><a class="list" href="main.php?action=editPicture" target="main">����ͼƬ</a></li>
						</ul>
						<h4 onclick="domenu(this, 'list22')" class="tit">--��Ŀ����--</h4>
						<ul id="list22">
							<li><a class="list" href="main.php?action=addCat" target="main">�����Ŀ</a></li>
							<li><a class="list" href="main.php?action=editCat" target="main">������Ŀ</a></li>
						</ul>
						<h4 onclick="domenu(this, 'list23')" class="tit">--���¹���--</h4>
						<ul id="list23">
							<li><a class="list"  href="main.php?action=addArticle" target="main">�������</a></li>
							<li><a class="list"  href="main.php?action=editArticle" target="main">��������</a></li>
							
						</ul>
	
				
					</div>
					<div>
						<h4 onclick="domenu(this, 'list31')" class="tit">--�˺Ź���--</h4>
						<ul id="list31">
							<li><a class="list" href="main.php?action=addUser" target="main">����û�</a></li>
							<li><a class="list" href="main.php?action=editUser" target="main">�༭�û�</a></li>
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


