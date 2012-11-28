<?php
	$fp = fopen('data.txt', 'r') or die("文件打开失败");    //以只读模式打开文件
	
	while (false !== ($char = fgetc($fp))) {      //循环文件中读取一个节符碰到 EOF 标记停止
   		 echo $char."<br>";                 //输出单个字符
	}
?>
