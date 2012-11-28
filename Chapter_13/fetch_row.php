<?php
	$mysqli = new mysqli("localhost", "root", "123456", "demo");  //连接本地demo数据库
	if (mysqli_connect_errno()) {
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	}
	$mysqli->query("set names gb2312");                     //设置字符集为国标2312码
     	/* 将部门编号为D01的联系人姓名和电子邮件全部取出存入到结果集中 */
	$result = $mysqli->query("SELECT name, email FROM contactInfo WHERE departmentId='D01'");
	echo 'D01部门的联系人姓名和电子邮件：';
	echo '<ol>';
	while(list($name, $email)=$result->fetch_row()){     //从结果集中遍历每条数据
		echo '<li>'.$name.' : '.$email.'</li>';            //以列表形式输出每条记录
	}	
	echo '</ol>';
    	$result->close();                                 //关闭结果集
	$mysqli->close();	                           //关闭与数据库的连接
?>

