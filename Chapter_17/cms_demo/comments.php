<?php
	/*==================================================================*/
	/*		�ļ���:comments.php                                 */
	/*		��Ҫ: �������۵Ĺ��ܴ���ű�.       	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//����ͨ�õĽű��ļ�
	require "common.php";
	//�����Ӧ���κ�һƪ���µ�����ģ��ҳ�汻���棬��ֱ�Ӷ�ȡ�����ļ�������ִ�����µĳ����߼�
	if(!$tpl->is_cached(APP_STYLE."/comments.tpl", $_SERVER["REQUEST_URI"])) {
		//��ȡ���µ�һ�����࣬��Ϊ�˵����䵽ģ����
		$tpl->assign("menu", $column->getColumnList(1));
	}
	//�����������۶���
	$comment=new Comments();
	//�ж��û��Ƿ����������۰�ť
	if(isset($_POST["sub"])){
		//�ж��û�����������Ƿ�Ϊ��
		if(empty($_POST["content"])){
				$tpl->assign("infotitle", "������������ݲ���Ϊ��");
				if($_GET["action"]=="art")
					$tpl->assign("url", "article.php?aid=".$_POST["aid"]);
				else if($_GET["action"]=="com")
					$tpl->assign("url", "comments.php?aid=".$_POST["aid"]);
				$tpl->display(APP_STYLE."/message.tpl");
				exit;	
		}else{
			//����û����������
			if(!$comment->commAdd($_POST)){
				$tpl->assign("infotitle", "���������ʧ�ܣ�");
				if($_GET["action"]=="art")
					$tpl->assign("url", "article.php?aid=".$_POST["aid"]);
				else if($_GET["action"]=="com")
					$tpl->assign("url", "comments.php?aid=".$_POST["aid"]);
				$tpl->display(APP_STYLE."/message.tpl");					
				exit;
			}
		}		
	}
	//��ȡ��ǰ�û����۽��з�ҳ��ʾ
	$current_page=isset($_GET["page"])?$_GET["page"]:1;
	$articleObj=new Article();
	$comment=new Comments();
	$article=$articleObj->getArticleTitle($_REQUEST["aid"]);
	$tpl->assign("article", $article);
	$tpl->assign("appName", "�û����� - ".$article["title"]);

	$total=$comment->getTotal($_REQUEST["aid"]);
	$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);
	$pageInfo=$pageObj->getPageInfo();	

	$tpl->assign("comment", $comment->getComm($_REQUEST["aid"],$pageInfo["row_offset"], $pageInfo["row_num"]));
	$tpl->assign("pageInfo", $pageInfo);

	//����û���¼���Ϳ�����ҳ���з�������
	if($_SESSION["isLogin"]){
		require "FCKeditor/fckeditor.php";
		$oFCKeditor = new FCKeditor("content") ;          // ����FCKeditorʵ�����ɴ������ʵ��
		$oFCKeditor->BasePath = 'FCKeditor/';      // ����FCKeditorĿ¼��ַ
		$oFCKeditor->Height= '150';	
		$oFCKeditor->ToolbarSet	= 'Small' ;
		$tpl->assign("FCK",$oFCKeditor->Create());
	}
	
	//���ز����ģ��comments.tpl����ָ��ҳ�滺����
	$tpl->display(APP_STYLE."/comments.tpl",$_SERVER["REQUEST_URI"]);
?>
