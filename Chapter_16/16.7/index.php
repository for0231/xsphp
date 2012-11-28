<?php
	require "libs/Smarty.class.php";              //包含Smarty类库
	$smarty = new Smarty();                       //创建Smarty类的对象

	$smarty->display('index.tpl');                 //查找模板替换并输出
?>
