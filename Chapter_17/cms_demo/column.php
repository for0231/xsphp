<?php
	/*==================================================================*/
	/*		文件名:column.php                                   */
	/*		概要: 文章列表页面的功能脚本.              	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含通用的脚本文件
	require "common.php";
	//如果对应的任何一篇文章列表页面模板被缓存，就直接读取缓存文件，不会执行以下的程序逻辑
	if(!$tpl->is_cached(APP_STYLE."/column.tpl", $_SERVER["REQUEST_URI"])) {
		//获取文章第一级分类，作为菜单分配到模板中
		$tpl->assign("menu", $column->getColumnList(1));
		//获取本页面类对应的子类栏目菜单，分配给模板文件	
		$tpl->assign("columnMenu", $column->getSubColumn($_GET["pid"]));
		//获取本类的推荐文件，分配给模板文件
		$tpl->assign("recommends", $article->getRecommend($_GET["pid"], 0, 13));
		//获取本类的热门文章，分配给模板文件
		$tpl->assign("hots", $article->getHot($_GET["pid"], 0, 13));
		//获取用户访问的当前页面
		$current_page=isset($_GET["page"])?$_GET["page"]:1;
		//获取本类中对应文章的总数，用于计算分页
		$total=$article->getRowTotal($_GET["pid"]);
		//创建分页对象，并指定每页显示记录个数	
		$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);
		//获取和分页有关的所有信息	
		$pageInfo=$pageObj->getPageInfo();
		//获取当前页面的所有文章对象数据
		$sinColumn=$column->getColumn($_GET["pid"],$pageInfo["row_offset"], $pageInfo["row_num"]);
		//将文章的栏目标题分配给模板，在文章页面的标题栏中显示
		$tpl->assign("appName", $sinColumn["colTitle"]);
		//分配上级位置到模板页面中
		$tpl->assign("locs", $column->getLocation($sinColumn["colPath"]));
		//将文章列表数组分配置到模板中
		$tpl->assign("column", $sinColumn);
		//将分页信息分配到模板中
		$tpl->assign("pageInfo", $pageInfo);
	}
	//加载并输出模板column.tpl，并指定页面缓存标号
	$tpl->display(APP_STYLE."/column.tpl", $_SERVER["REQUEST_URI"]);
?>
