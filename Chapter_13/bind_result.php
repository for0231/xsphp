<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //连接MySQL数据库
	if (mysqli_connect_errno()) {                                //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	} 
     	//声明SELECT语句，按部门编号查找，使用占位符号（?）表示将要查找的部门
	$query = "SELECT name, address, phone FROM contactinfo WHERE departmentId=? LIMIT 0,3";  
	if ($stmt = $mysqli->prepare($query)) {                           //处理打算执行的SQL命令
		$stmt->bind_param('s',$departmentId);                       //绑定参数部门编号 
		$departmentId="D01";                                    //给绑定的变量赋上值
		$stmt->execute();                                        //执行SQL语句
		$stmt->store_result();                                     //取回全部查询结果
		$stmt->bind_result($name, $address, $phone);                 //当查询结果绑定到变量中
		echo "D01部门的联系人信息列表如下：<br>";              //打印提示信息
		while ($stmt->fetch()) {                                   //逐条从MySQL服务取数据
		       	printf ("%s (%s,%s)<br>", $name, $address, $phone);  //格式化结果输出
		}

		echo "D02部门的联系人信息列表如下：<br>";               //打印提示信息
		$departmentId="D02";                                     //给绑定的变量赋上新值
		$stmt->execute();                                         //执行SQL语句
		$stmt->store_result();                                      //取回全部查询结果
		while ($stmt->fetch()) {                                   //逐条从MySQL服务取数据
		       	printf ("%s (%s,%s)<br>", $name, $address, $phone);  //格式化结果输出
		}
		$stmt->close();                          //释放mysqli_stmt对象占用的资源
	}
	$mysqli->close();                             //关闭与MySQL数据库的连接
?>
