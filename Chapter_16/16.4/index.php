<?php
	require("libs/Smarty.class.php");                 //��һ�������� Smarty ģ������
	$smarty=new Smarty();                       	  //�ڶ��������� Smarty ����
                                               		  //���������趨Smarty��Ĭ��������Ϊ(������)
	$smarty->assign("title", "�����õ���ҳ����");     //���Ĳ�����assign()��������������ģ����
	$smarty->assign("content", "�����õ���ҳ����");   //Ҳ���ڵ��Ĳ�������������������ģ����
                                               		  //�ڵ��Ĳ��п�����ģ���������κ����͵ı���
	$smarty->display("test.tpl");                     //����Smarty��display()��������ҳ���
?>
