<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //连接MySQL数据库
	if (mysqli_connect_errno()) {                                //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	} 
    	 /* 将三条SQL命令使用分号（;）分隔, 连接成一个字符串 */
	$query = "SET NAMES GB2312;";                          //设置查询字符集为GB2312
	$query .= "SELECT CURRENT_USER();";                   //从MySQL服务器获取当前用户
	$query .= "SELECT name,phone FROM contactinfo LIMIT 0,2";  //从contactinfo表中读取数据

	if ($mysqli->multi_query($query)) {                         //执行多条SQL命令
	    do {
  	     	 if ($result = $mysqli->store_result()) {            //获取第一个结果集
   	              while ($row = $result->fetch_row()) {         //遍历结果集中每条记录
				    foreach($row as $data){                 //从一行记录数组中获取每列数据
					    echo $data."&nbsp;&nbsp;";        //输出每列数据
				    }
				    echo "<br>";                          //输出换行符号
   	       	  }
    	        	  $result->close();                             //关闭一个打开的结果集
    		 }
          if ($mysqli->more_results()) {                       //判断是否还有更多的结果集
     	     echo "-----------------<br>";                     //输出一行分隔线
      	 }
 	   } while ($mysqli->next_result());                     //获取下一个结果集，并继续执行循环
	}
	$mysqli->close();                                    //关闭mysqli连接
?>

