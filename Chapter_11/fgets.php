<?php
	$handle = fopen("data.txt", "r")  or die("文件打开失败");    //以只读模式打开文件
	while (!feof($handle)) {                   	//循环读取第一行，使用feof判断读取文件结尾
  		$buffer = fgets($handle, 4096);         //一次读取打开文件中的一行内容
   		echo $buffer."<br>";                 	//输出每一行，并加上HTML的换行标记
	}
	fclose($handle);                         	//关闭打开的文件资源
?>

