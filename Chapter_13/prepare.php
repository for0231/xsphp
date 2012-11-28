<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //连接MySQL数据库
	if (mysqli_connect_errno()) {                                //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	} 
     	//声明一个INSERT语句，并使用$mysqli->prepare()方法对算执行的这个SQL命令进行处理
	$query="INSERT INTO contactInfo(name, departmentId, address, phone, email) VALUES (?, ?, ?, ?,?)";
	$stmt = $mysqli->prepare($query);                    //处理打算执行的SQL命令
	
     	//将5个占位符号（?）对应的参数绑定到5个PHP变量中
	$stmt->bind_param('sssss', $name, $departmentId, $address, $phone, $email);

	$name="张某某";                                  //为第一个绑定的参数赋上字符串的值
	$departmentId="D03";                              //为第二个绑定的参数赋上字符串的值
	$address="中关村";                                //为第三个绑定的参数赋上字符串的值
	$phone="15801683721";                            //为第四个绑定的参数赋上字符串的值
	$email="zm@lampbrother.net";                       //为第五个绑定的参数赋上字符串的值

	$stmt->execute();                        //执行预处理的SQL命令，向服务器发送数据

	echo "插入的行数：".$stmt->affected_rows."<br>";     //返回插入的行数
	echo "自动增长的UID：".$mysqli->insert_id."<br>";   //返回最后生成的AUTO_INCREMENT值
     
     	//以下几条代码重新为参数赋值，可以随时重复这个过程继续插入记录。
	$name="白某某";
	$departmentId="D01";
	$address="海淀区";
	$phone="15801689675";
	$email="bm@lampbrother.net";
	$stmt->execute();                            //重新给参数赋值后，再次向服务器发送数据

	echo "插入的行数：".$stmt->affected_rows."<br>";     //返回插入的行数
	echo "自动增长的UID：".$mysqli->insert_id."<br>";   //返回最后生成的AUTO_INCREMENT值

	$stmt->close();                         //释放mysqli_stmt对象占用的资源
	$mysqli->close();                       //关闭与MySQL数据库的连接
?>

