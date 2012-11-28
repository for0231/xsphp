<?php
	/*==================================================================*/
	/*		文件名:index.php                                    */
	/*		概要: 网站首页的功能处理脚本.    	   	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含通用的脚本文件
	require "common.php";

	//如果网站首页面模板被缓存，就直接读取缓存文件，不会执行以下的程序逻辑
	if(!$tpl->is_cached(APP_STYLE."/index.tpl")) {
		//获取文章第一级分类，作为菜单分配到模板中
		$tpl->assign("menu", $column->getColumnList(1));
		//获取推荐文件，并分配给模板文件
		$tpl->assign("recommends", $article->getRecommend());
		//获取最新文章，并分配给模板文件
		$tpl->assign("news", $article->getNew());
		//获取热门文章，并分配给模板文件
		$tpl->assign("hots", $article->getHot());
		//获取所有的一级栏目对象数组，并分配给模板文件
		$tpl->assign("cols",$column->getAllColumn(1));
		//创建友情链接对象
		$flink=new Flink();
		//获取所有友情链接对象数组，并分配给模板文件
		$tpl->assign("links", $flink->getLinks());
	}
	//加载并输出模板index.tpl
	$tpl->display(APP_STYLE."/index.tpl");
?>
