<?php
	include "./libs/Smarty.class.php";             	//����Smarty������ڵ��ļ�
	require("Page_class.php");                  	//������ҳ��Page���ڵ��ļ�
	require("MyDB_class.php");                	//�������ݿ��ȡ�����ڵ��ļ�

	$tpl = new Smarty();                      	//����һ��Smarty��Ķ���$tpl
	$tpl->template_dir = "./templates/";          	//��������ģ���ļ���ŵ�Ŀ¼
	$tpl->compile_dir = "./templates_c/";         	//�������б������ģ���ļ���ŵ�Ŀ¼
	$tpl->cache_dir = "./cache/";                	//���ô��Smarty�����ļ���Ŀ¼
	$tpl->caching=1;                         	//���ÿ���Smarty����ģ�幦�����ԣ�����Ϊ����
	$tpl->cache_lifetime=60*60;                	//����ģ�建����Чʱ��εĳ��ȣ�����Ϊ1Сʱ
	$tpl->left_delimiter = '<{';                  	//����ģ�������е��������
	$tpl->right_delimiter = '}>';       	      	//����ģ�������е��ҽ�����

     	/*��GET�����л�ȡ�û��ύ��ҳ���������֡�Ĭ�ϵ�һҳ��ҳ������$current_pageֵΪ1*/
	$current_page=isset($_GET['page'])?intval($_GET['page']):1;

     	/* ͨ��is_cached()�����ж�ָ����ҳ���Ƿ��Ѿ������棬���������ִ�����ݿ���� */
	if(!$tpl->is_cached("index.tpl", $current_page)) {
		$mydb=new MyDB();                     		//�������ݿ������MyDB�Ķ���
		$total=$mydb->getRowTotal();              	//����MyDB��ķ����������ݱ��¼����
		$fpage=new Page($total,$current_page, 5);    	//ͨ����ȡ��ֵ������ҳ��Page�Ķ���
		$pageInfo=$fpage->getPageInfo();           	//��ȡ�͵�ǰҳ���йص�������Ϣ����
         	/* ͨ������MyDB�еķ�������ȡ��ǰҳ������Ҫ�����м�¼���������� */
		$products=$mydb->getPageRows($pageInfo["row_offset"], $pageInfo["row_num"]);
		if($products) {                           	//��������ݿ��л�ȡ����Ʒ��¼
			$tpl->assign("tableName", "��Ʒ�б�");  //����ҳ����ʾ�ı��浽ģ����
			$tpl->assign("url", "index.php");       //�����ҳ�����ļ���URL��ģ����
			$tpl->assign("products", $products);    //���ڱ�ҳ��ʾ������������������ģ��
			$tpl->assign("pageInfo", $pageInfo);    //���͵�ǰҳ�йص�������Ϣ��������ģ��
		}else {                                 	//���û�л�ȡ���κ���Ʒ��¼
			echo "���ݶ�ȡʧ��!";               	//���һ����ʾ��Ϣ
			exit;                              	//���˳�����
		}
	}
	$tpl->display("index.tpl", $current_page);         	//�������ģ��index.tpl����ָ��ҳ�滺����
?>
