<?php
	/*==================================================================*/
	/*		文件名:comments.php                                 */
	/*		概要: 文章评论的功能处理脚本.       	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含通用的脚本文件
	require "common.php";
	//如果对应的任何一篇文章的评论模板页面被缓存，就直接读取缓存文件，不会执行以下的程序逻辑
	if(!$tpl->is_cached(APP_STYLE."/comments.tpl", $_SERVER["REQUEST_URI"])) {
		//获取文章第一级分类，作为菜单分配到模板中
		$tpl->assign("menu", $column->getColumnList(1));
	}
	//创建文章评论对象
	$comment=new Comments();
	//判断用户是否点击发表评论按钮
	if(isset($_POST["sub"])){
		//判断用户发表的评论是否为空
		if(empty($_POST["content"])){
				$tpl->assign("infotitle", "发表的评论内容不能为空");
				if($_GET["action"]=="art")
					$tpl->assign("url", "article.php?aid=".$_POST["aid"]);
				else if($_GET["action"]=="com")
					$tpl->assign("url", "comments.php?aid=".$_POST["aid"]);
				$tpl->display(APP_STYLE."/message.tpl");
				exit;	
		}else{
			//添加用户发表的评论
			if(!$comment->commAdd($_POST)){
				$tpl->assign("infotitle", "发表的评论失败！");
				if($_GET["action"]=="art")
					$tpl->assign("url", "article.php?aid=".$_POST["aid"]);
				else if($_GET["action"]=="com")
					$tpl->assign("url", "comments.php?aid=".$_POST["aid"]);
				$tpl->display(APP_STYLE."/message.tpl");					
				exit;
			}
		}		
	}
	//获取当前用户评论进行分页显示
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	$articleObj=new Article();
	$comment=new Comments();
	$article=$articleObj->getArticleTitle($_REQUEST["aid"]);
	$tpl->assign("article", $article);
	$tpl->assign("appName", "用户评论 - ".$article["title"]);

	$total=$comment->getTotal($_REQUEST["aid"]);
	$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);
	$pageInfo=$pageObj->getPageInfo();	

	$tpl->assign("comment", $comment->getComm($_REQUEST["aid"],$pageInfo["row_offset"], $pageInfo["row_num"]));
	$tpl->assign("pageInfo", $pageInfo);

	//如果用户登录，就可以在页面中发表评论
	if($_SESSION["isLogin"]){
		require "FCKeditor/fckeditor.php";
		$oFCKeditor = new FCKeditor("content") ;          // 创建FCKeditor实例，可创建多个实例
		$oFCKeditor->BasePath = 'FCKeditor/';      // 设置FCKeditor目录地址
		$oFCKeditor->Height= '150';	
		$oFCKeditor->ToolbarSet	= 'Small' ;
		$tpl->assign("FCK",$oFCKeditor->Create());
	}
	
	//加载并输出模板comments.tpl，并指定页面缓存标号
	$tpl->display(APP_STYLE."/comments.tpl",$_SERVER["REQUEST_URI"]);
?>
