<?php
	/*==================================================================*/
	/*		�ļ���:index.php                                    */
	/*		��Ҫ: ��վ��ҳ�Ĺ��ܴ���ű�.    	   	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//����ͨ�õĽű��ļ�
	require "common.php";

	//�����վ��ҳ��ģ�屻���棬��ֱ�Ӷ�ȡ�����ļ�������ִ�����µĳ����߼�
	if(!$tpl->is_cached(APP_STYLE."/index.tpl")) {
		//��ȡ���µ�һ�����࣬��Ϊ�˵����䵽ģ����
		$tpl->assign("menu", $column->getColumnList(1));
		//��ȡ�Ƽ��ļ����������ģ���ļ�
		$tpl->assign("recommends", $article->getRecommend());
		//��ȡ�������£��������ģ���ļ�
		$tpl->assign("news", $article->getNew());
		//��ȡ�������£��������ģ���ļ�
		$tpl->assign("hots", $article->getHot());
		//��ȡ���е�һ����Ŀ�������飬�������ģ���ļ�
		$tpl->assign("cols",$column->getAllColumn(1));
		//�����������Ӷ���
		$flink=new Flink();
		//��ȡ�����������Ӷ������飬�������ģ���ļ�
		$tpl->assign("links", $flink->getLinks());
	}
	//���ز����ģ��index.tpl
	$tpl->display(APP_STYLE."/index.tpl");
?>
