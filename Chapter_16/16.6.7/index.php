<?php
	require "libs/Smarty.class.php";               //����Smarty���
	$smarty = new Smarty();                    	//����Smarty��Ķ���
	$contact=array(                           	//����һ������������ϵ����Ϣ�Ķ�ά����
		array('name'=>'��ĳ','fax'=>'1234','email'=>'gao@lampbrother.net','phone'=>'4321'),
		array('name'=>'��ĳ','fax'=>'4567','email'=>'luo@lampbrother.net','phone'=>'7654'),
		array('name'=>'��ĳ','fax'=>'8910','email'=>'feng@lampbrother.net','phone'=>'0198')
	);
	$smarty->assign('contact', $contact);          //����������$contact���䵽ģ����ʹ��
	$smarty->display('index.tpl');                //����ģ���滻�����
?>
