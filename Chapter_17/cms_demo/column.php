<?php
	/*==================================================================*/
	/*		�ļ���:column.php                                   */
	/*		��Ҫ: �����б�ҳ��Ĺ��ܽű�.              	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//����ͨ�õĽű��ļ�
	require "common.php";
	//�����Ӧ���κ�һƪ�����б�ҳ��ģ�屻���棬��ֱ�Ӷ�ȡ�����ļ�������ִ�����µĳ����߼�
	if(!$tpl->is_cached(APP_STYLE."/column.tpl", $_SERVER["REQUEST_URI"])) {
		//��ȡ���µ�һ�����࣬��Ϊ�˵����䵽ģ����
		$tpl->assign("menu", $column->getColumnList(1));
		//��ȡ��ҳ�����Ӧ��������Ŀ�˵��������ģ���ļ�	
		$tpl->assign("columnMenu", $column->getSubColumn($_GET["pid"]));
		//��ȡ������Ƽ��ļ��������ģ���ļ�
		$tpl->assign("recommends", $article->getRecommend($_GET["pid"], 0, 13));
		//��ȡ������������£������ģ���ļ�
		$tpl->assign("hots", $article->getHot($_GET["pid"], 0, 13));
		//��ȡ�û����ʵĵ�ǰҳ��
		$current_page=isset($_GET["page"])?$_GET["page"]:1;
		//��ȡ�����ж�Ӧ���µ����������ڼ����ҳ
		$total=$article->getRowTotal($_GET["pid"]);
		//������ҳ���󣬲�ָ��ÿҳ��ʾ��¼����	
		$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);
		//��ȡ�ͷ�ҳ�йص�������Ϣ	
		$pageInfo=$pageObj->getPageInfo();
		//��ȡ��ǰҳ����������¶�������
		$sinColumn=$column->getColumn($_GET["pid"],$pageInfo["row_offset"], $pageInfo["row_num"]);
		//�����µ���Ŀ��������ģ�壬������ҳ��ı���������ʾ
		$tpl->assign("appName", $sinColumn["colTitle"]);
		//�����ϼ�λ�õ�ģ��ҳ����
		$tpl->assign("locs", $column->getLocation($sinColumn["colPath"]));
		//�������б���������õ�ģ����
		$tpl->assign("column", $sinColumn);
		//����ҳ��Ϣ���䵽ģ����
		$tpl->assign("pageInfo", $pageInfo);
	}
	//���ز����ģ��column.tpl����ָ��ҳ�滺����
	$tpl->display(APP_STYLE."/column.tpl", $_SERVER["REQUEST_URI"]);
?>
