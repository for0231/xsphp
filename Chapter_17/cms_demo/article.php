<?php
	/*==================================================================*/
	/*		�ļ���:article.php                                  */
	/*		��Ҫ: �������ݵĹ��ܴ���ű��ļ�.       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//����ͨ�õĽű��ļ�
	require "common.php";     
	//�����ļ�����$article�еķ������÷�������
	$article->setViews($_GET["aid"]);                       
	//�����Ӧ���κ�һƪ����ģ�屻���棬��ֱ�Ӷ�ȡ�����ļ�������ִ�����µĳ����߼�
	if(!$tpl->is_cached(APP_STYLE."/article.tpl", $_SERVER["REQUEST_URI"])) {
		//��ȡ���µ�һ�����࣬��Ϊ�˵����䵽ģ����
		$tpl->assign("menu", $column->getColumnList(1));     
		//��ȡ�û���ʾ�����£���$_GET["aid"]��Ӧ������	
		$sinArticle=$article->get($_GET["aid"]);
		//�����µı�������ģ�壬������ҳ��ı���������ʾ
		$tpl->assign("appName", $sinArticle["title"]);
		//��ȡ������Ӽ�·��
		$colPath=$column->getCatPath($sinArticle["catId"]);
		//�����ϼ�λ�õ�ģ��ҳ����
		$tpl->assign("locs", $column->getLocation($colPath));
		//��������������ģ����н���
		$tpl->assign("article", $sinArticle);
		//������һƪ���µ�ģ����
		$tpl->assign("prevArticle", $article->getPrevArticle($sinArticle["catId"],$_GET["aid"]));
		//������һƪ���µ�ģ����
		$tpl->assign("nextArticle", $article->getNextArticle($sinArticle["catId"],$_GET["aid"]));
		//����������µ�ģ����,��ͬһ����е����£�ȡ15ƪ
		$tpl->assign("conns", $article->getAuditArts($sinArticle["catId"], 0, 15));
		//��ȡ�Ƽ����·��͸�ǰ̨ģ��
		$tpl->assign("recommends", $article->getRecommend($sinArticle["catId"], 0, 10));
		//��ȡ�������·��͸�ǰ̨ģ��
		$tpl->assign("hots", $article->getHot($sinArticle["catId"], 0, 10));

	}
	//����ǰ����ID�����ģ��
	$tpl->assign("aid", $_GET["aid"]);
	//�����������۶���
	$comment=new Comments();
	//��ȡ���µ��������������������ģ��
	$tpl->assign("commTotal", $comment->getTotal($_GET["aid"]));
	//ֻ�е�¼�û����ܶ����½������ۣ����´����ж��û��Ƿ�Ϊ��¼״̬
	if($_SESSION["isLogin"]){
		//�����ı��༭��FCK�����ڵ�λ��
		require "FCKeditor/fckeditor.php";
		//����FCKeditor���󣬿ɴ������ʵ��
		$oFCKeditor = new FCKeditor("content") ;    
	  	//����FCKeditorĿ�ĵ�ַ	
		$oFCKeditor->BasePath = 'FCKeditor/';    
	        //����FCK��ʾ�ĸ߶�	
		$oFCKeditor->Height= '150';
	        //����FCK����������ʾģʽ	
		$oFCKeditor->ToolbarSet	= 'Small' ;
		//����FCK������ģ���У��û���FCK�б�д��������
		$tpl->assign("FCK",$oFCKeditor->Create());
	}
	//���ز����ģ��article.tpl����ָ��ҳ�滺����
	$tpl->display(APP_STYLE."/article.tpl", $_SERVER["REQUEST_URI"]);
?>
