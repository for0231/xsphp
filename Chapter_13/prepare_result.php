<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //连接MySQL数据库
	if (mysqli_connect_errno()) {                                //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	} 

	$query = "SELECT name, address, phone FROM contactinfo LIMIT 0,3";   //声明SELECT语句
	if ($stmt = $mysqli->prepare($query)) {                           //处理打算执行的SQL命令
		$stmt->execute();                                         //执行SQL语句
		$stmt->store_result();                                      //取回全部查询结果
          echo "记录个数：".$stmt->num_rows."行<br>";               //输出查询的记录个数
	     $stmt->bind_result($name, $address, $phone);                 //当查询结果绑定到变量中
		while ($stmt->fetch()) {                                   //逐条从MySQL服务取数据
		       	printf ("%s (%s,%s)<br>", $name, $address, $phone);  //格式化结果输出
		}
		$stmt->close();                          //释放mysqli_stmt对象占用的资源
	}
	$mysqli->close();                             //关闭与MySQL数据库的连接
?>
