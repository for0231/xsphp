<?php
	/*==================================================================*/
	/*		�ļ���:search.php                                   */
	/*		��Ҫ: ��������ҳ��Ĺ��ܴ���ű��ļ�.       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//����ǰ̨���õĽű��ļ�
	require "common.php";
	//�����Ӧ���κ�һ������ҳ��ģ�屻���棬��ֱ�Ӷ�ȡ�����ļ�������ִ�����µĳ����߼�
	if(!$tpl->is_cached(APP_STYLE."/search.tpl", $_SERVER["REQUEST_URI"])) {
		$tpl->assign("menu", $column->getColumnList(1));
		$tpl->assign("recommends", $article->getRecommend());
		$tpl->assign("news", $article->getNew());
		$tpl->assign("hots", $article->getHot());
	}
	//���´���Ϊ�������ļ�¼���÷�ҳ��ʾ
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


	//���ز����ģ��search.tpl����ָ��ҳ�滺����
	$tpl->display(APP_STYLE."/search.tpl",$_SERVER["REQUEST_URI"]);
?>
