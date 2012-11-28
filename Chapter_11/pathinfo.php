<?php
	$path = "/var/www/html/page.php";  //包含有指向一个文件的全路径的字符串
	$path_parts=pathinfo($path);        //返回包括指定路径中的目录名、基本名和扩展名关联数组
	echo $path_parts["dirname"];        //输出目录名/var/www/html
	echo $path_parts["basename"];       //输出基本名page.php
	echo $path_parts["extension"];       //输出扩展名.php
?>
