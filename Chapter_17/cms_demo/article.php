<?php
	/*==================================================================*/
	/*		文件名:article.php                                  */
	/*		概要: 文章内容的功能处理脚本文件.       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含通用的脚本文件
	require "common.php";     
	//调用文件对象$article中的方法设置访问数量
	$article->setViews($_GET["aid"]);                       
	//如果对应的任何一篇文章模板被缓存，就直接读取缓存文件，不会执行以下的程序逻辑
	if(!$tpl->is_cached(APP_STYLE."/article.tpl", $_SERVER["REQUEST_URI"])) {
		//获取文章第一级分类，作为菜单分配到模板中
		$tpl->assign("menu", $column->getColumnList(1));     
		//获取用户请示的文章，即$_GET["aid"]对应的文章	
		$sinArticle=$article->get($_GET["aid"]);
		//将文章的标题分配给模板，在文章页面的标题栏中显示
		$tpl->assign("appName", $sinArticle["title"]);
		//获取分类的子级路径
		$colPath=$column->getCatPath($sinArticle["catId"]);
		//分配上级位置到模板页面中
		$tpl->assign("locs", $column->getLocation($colPath));
		//将文章数组分配给模板进行解析
		$tpl->assign("article", $sinArticle);
		//分配上一篇文章到模板中
		$tpl->assign("prevArticle", $article->getPrevArticle($sinArticle["catId"],$_GET["aid"]));
		//分配下一篇文章到模板中
		$tpl->assign("nextArticle", $article->getNextArticle($sinArticle["catId"],$_GET["aid"]));
		//分配相关文章到模板中,即同一类别中的文章，取15篇
		$tpl->assign("conns", $article->getAuditArts($sinArticle["catId"], 0, 15));
		//获取推荐文章发送给前台模板
		$tpl->assign("recommends", $article->getRecommend($sinArticle["catId"], 0, 10));
		//获取热门文章发送给前台模板
		$tpl->assign("hots", $article->getHot($sinArticle["catId"], 0, 10));

	}
	//将当前文章ID分配给模板
	$tpl->assign("aid", $_GET["aid"]);
	//创建文章评论对象
	$comment=new Comments();
	//获取文章的评论总数，并发分配给模板
	$tpl->assign("commTotal", $comment->getTotal($_GET["aid"]));
	//只有登录用户才能对文章进行评论，以下代码判断用户是否为登录状态
	if($_SESSION["isLogin"]){
		//包括文本编辑器FCK类所在的位置
		require "FCKeditor/fckeditor.php";
		//创建FCKeditor对象，可创建多个实例
		$oFCKeditor = new FCKeditor("content") ;    
	  	//设置FCKeditor目的地址	
		$oFCKeditor->BasePath = 'FCKeditor/';    
	        //设置FCK显示的高度	
		$oFCKeditor->Height= '150';
	        //设置FCK工具条的显示模式	
		$oFCKeditor->ToolbarSet	= 'Small' ;
		//创建FCK分析到模板中，用户在FCK中编写评论文字
		$tpl->assign("FCK",$oFCKeditor->Create());
	}
	//加载并输出模板article.tpl，并指定页面缓存标号
	$tpl->display(APP_STYLE."/article.tpl", $_SERVER["REQUEST_URI"]);
?>
