<?php
	$path = "/var/www/html/page.php";    //包含有指向一个文件的全路径的字符串

	echo basename($path);             //显示带有文件扩展名的文件名，输出page.php
	echo basename($path,".php");       //显示不带有文件扩展名的文件名，输出page
?>
