<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");  //连接MySQL数据库
	if (mysqli_connect_errno()) {                                   //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	}
	$mysqli->query("set names gb2312");                            //设置查询字符集
	$result = $mysqli->query("SELECT * FROM contactInfo");          //执行查询语句获取结果集

	echo '<table width="90%" border="1" align="center">';               //打印HTML表格
	echo '<caption><h1>联系人信息表</h1></caption>';                //输出表名
	echo '<th>用户ID</th><th>姓名</th><th>部门编号</th>';          //输出字段名
	echo '<th>联系地址</th><th>联系电话</th><th>电子邮件</th>';    
	while($row=$result->fetch_assoc()){                            //循环从结果集中遍历记录
		echo '<tr align="center">';                                //输出行标记
		echo '<td>'.$row["uid"].'</td>';                            //输出用户ID
		echo '<td>'.$row["name"].'</td>';                          //输出用户姓名
		echo '<td>'.$row["departmentId"].'</td>';                    //输出部门编号
		echo '<td>'.$row["address"].'</td>';                        //输出联系地址
		echo '<td>'.$row["phone"].'</td>';                         //输出联系电话
		echo '<td>'.$row["email"].'</td>';                          //输出电子邮件
		echo '</tr>';
	}	
	echo '</table>';
     	$result->close();                                           //关闭结果集释放内存
	$mysqli->close();	                                      //关闭与数据库服务器的连接
?>
