<?php
	require("libs/Smarty.class.php");                 //第一步：加载 Smarty 模版引擎
	$smarty=new Smarty();                       	  //第二步：建立 Smarty 对象
                                               		  //第三步：设定Smarty的默认属性形为(本例略)
	$smarty->assign("title", "测试用的网页标题");     //第四步：用assign()方法将变量置入模板里
	$smarty->assign("content", "测试用的网页内容");   //也属于第四步，分配其他变量置入模板里
                                               		  //在第四步中可以向模板中置入任何类型的变量
	$smarty->display("test.tpl");                     //利用Smarty的display()方法将网页输出
?>
