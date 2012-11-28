<?php
	session_start();                             //开启Session
	echo $_SESSION["username"]."<br>";           //输出Session变量的值
	echo "Session ID: ".session_id()."<br>";     //输出Session ID
?> 
