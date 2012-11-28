<?php
	$path = "/var/www/html/page.php";  //包含有指向一个文件的全路径的字符串

	echo dirname($path);              //返回目录名/var/www/html
	echo dirname('c:/');                //返回目录名c:/
?>
