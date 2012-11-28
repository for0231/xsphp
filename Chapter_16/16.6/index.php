<?php
	require "libs/Smarty.class.php";              //����Smarty���
	$smarty = new Smarty();                       //����Smarty��Ķ���

	$contact=array(                               //��һ���˵���ϵ��Ϣ������һ������������
		'fax' => '555-222-9876',
		'email' => 'gao@lampbrother.net',
		'phone' => array(
			'home' => '555-444-3333',
			'cell' => '555-111-1234'
			)
		);
	$smarty->assign('contact', $contact);          //����������$contact���䵽ģ����ʹ��

	$contact2=array(                               //��һ���˵���ϵ��Ϣ������һ������������
		'555-222-9876',
		'gao@lampbrother.net',
	 	 array( '555-444-3333', '555-111-1234')		
	 	);
	$smarty->assign('contact2', $contact2);       //����������$contact2���䵽ģ����ʹ��

	$contact3=array(                               //ʹ�������͹������鱣����ϵ��Ϣ
		'fax' => '555-222-9876',
	 	array('first'=>'gao@lampbrother.net','second'=>'feng@lampbrother.net'),
		'phone' => array('555-444-3333','555-111-1234')
		);
	$smarty->assign('contact3', $contact3);        //���������$contact3���䵽ģ����ʹ��
	$smarty->display('index.tpl');                 //����ģ���滻�����
?>
