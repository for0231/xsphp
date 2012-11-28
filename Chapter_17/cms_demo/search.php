<?php
	/*==================================================================*/
	/*		文件名:search.php                                   */
	/*		概要: 文章搜索页面的功能处理脚本文件.       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//包含前台公用的脚本文件
	require "common.php";
	//如果对应的任何一个搜索页面模板被缓存，就直接读取缓存文件，不会执行以下的程序逻辑
	if(!$tpl->is_cached(APP_STYLE."/search.tpl", $_SERVER["REQUEST_URI"])) {
		$tpl->assign("menu", $column->getColumnList(1));
		$tpl->assign("recommends", $article->getRecommend());
		$tpl->assign("news", $article->getNew());
		$tpl->assign("hots", $article->getHot());
	}
	//以下代码为搜索到的记录设置分页显示
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	if(empty($_GET["search"])) {
		$sArticle=null;
		$total=0;
		$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);
		$pageInfo=$pageObj->getPageInfo();
	}else{
		$total=$article->getSearchTotal($_GET["serType"], $_GET["search"]);
		$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);
		$pageInfo=$pageObj->getPageInfo();		
		$sArticle=$article->getSearchResult($_GET["serType"], $_GET["search"],$pageInfo["row_offset"], $pageInfo["row_num"]);
	}
	
	$tpl->assign("pageInfo", $pageInfo);
	$tpl->assign("searchs", $sArticle);
	$tpl->assign("search", urlencode($_GET["search"]));
	$tpl->assign("searchValue",$_GET["search"]);
	$tpl->assign("serType", $_GET["serType"]);


	//加载并输出模板search.tpl，并指定页面缓存标号
	$tpl->display(APP_STYLE."/search.tpl",$_SERVER["REQUEST_URI"]);
?>
