<?php
	require "libs/Smarty.class.php";              //包含Smarty类库
	$smarty = new Smarty();                       //创建Smarty类的对象

	$contact=array(                               //将一个人的联系信息保存在一个关联数组中
		'fax' => '555-222-9876',
		'email' => 'gao@lampbrother.net',
		'phone' => array(
			'home' => '555-444-3333',
			'cell' => '555-111-1234'
			)
		);
	$smarty->assign('contact', $contact);          //将关联数组$contact分配到模板中使用

	$contact2=array(                               //将一个人的联系信息保存在一个索引数组中
		'555-222-9876',
		'gao@lampbrother.net',
	 	 array( '555-444-3333', '555-111-1234')		
	 	);
	$smarty->assign('contact2', $contact2);       //将索引数组$contact2分配到模板中使用

	$contact3=array(                               //使用索引和关联数组保存联系信息
		'fax' => '555-222-9876',
	 	array('first'=>'gao@lampbrother.net','second'=>'feng@lampbrother.net'),
		'phone' => array('555-444-3333','555-111-1234')
		);
	$smarty->assign('contact3', $contact3);        //将混合数组$contact3分配到模板中使用
	$smarty->display('index.tpl');                 //查找模板替换并输出
?>
