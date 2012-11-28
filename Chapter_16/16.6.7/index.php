<?php
	require "libs/Smarty.class.php";               //包含Smarty类库
	$smarty = new Smarty();                    	//创建Smarty类的对象
	$contact=array(                           	//声明一个保存三个联系人信息的二维数组
		array('name'=>'高某','fax'=>'1234','email'=>'gao@lampbrother.net','phone'=>'4321'),
		array('name'=>'洛某','fax'=>'4567','email'=>'luo@lampbrother.net','phone'=>'7654'),
		array('name'=>'峰某','fax'=>'8910','email'=>'feng@lampbrother.net','phone'=>'0198')
	);
	$smarty->assign('contact', $contact);          //将关联数组$contact分配到模板中使用
	$smarty->display('index.tpl');                //查找模板替换并输出
?>
