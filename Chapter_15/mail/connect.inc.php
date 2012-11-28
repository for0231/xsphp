<?php
	$host="localhost";                                     		//数据库所在主机
	$dbuser="mysql_user";                                 		//数据库的用户名
	$dbpass="mysql_pwd";                                		//数据库的密码
	$dbname="testmail";                                   		//数据库的库名称
	$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname); 	//创建mysqli对象，连接数据库
	if (mysqli_connect_errno()) {                           	//检查数据库是否连接成功
  		printf("连接失败: %s\n", mysqli_connect_error());       //输出连接失败原因
    		exit();                                          	//退出程序
	}
?>
