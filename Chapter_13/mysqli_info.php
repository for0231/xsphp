<?php
     	/* 连接MySQL数据库并，成功则返回mysqli 对象*/
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "mylib");
	/* 检查连接，如果连接出错输出错误信息并退出程序 */ 
	if (mysqli_connect_errno()) {
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	}
	/* 打印当前数据库使用字符集字符串 */
	printf ("当前数据库的字符集： %s<br>", $mysqli->character_set_name());
	/* 打印客户端版本 */
	printf("客户端库版本： %s<br>", $mysqli->get_client_info());
	/* 打印服务器主机信息 */
	printf("主机信息： %s<br>", $mysqli->host_info);
	/* 打印字符串形式MySQL服务器版本 */
	printf("服务器版本: %s<br>", $mysqli->server_info);
	/*打印整数形式MySQL服务器版本*/
	printf("服务器版本：%d<br>", $mysqli->server_version);
	/* 关闭打开的数据库连接 */
	$mysqli->close();	
?>
