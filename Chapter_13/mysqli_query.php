<?php
	$mysqli = new mysqli("localhost", "root", "123456", "mylib");
	if (mysqli_connect_errno()) {
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	}
     	/* 执行SQL命令向表中插入一条记录，并获取改变的记录数和新ID值 */
	if($mysqli->query("insert into 表名(列1, 列2) values ('值1','值2')")){
		echo "改变的记录数：".$mysqli->affected_rows."<br>";
		echo "新插入的ID值：".$mysqli->insert_id."<br>";
	}
	$mysqli->close();	
?>

