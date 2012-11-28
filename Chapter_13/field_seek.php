<?php
	$mysqli = new mysqli("localhost", "root", "123456", "demo");    //连接MySQL数据库
	if (mysqli_connect_errno()) {                                        //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	} 
	$mysqli->query("set names gb2312");                             //设置查询字符集
	$result = $mysqli->query("SELECT * FROM contactInfo");           //执行查询语句获取结果集

	echo "结果数据表里数据列个数为：".$result->field_count."列<br>";   //从查询结果中获取列数
	echo "默认当前列的指针位置为第：".$result->current_field."列<br>";  //打印默认列的指针位置
	echo "将指向当前列的指针移动到第二列;<br>";
	$result->field_seek(1);                      //将当前列指针移至第二列（默认0代表第一列）
	echo "指向当前列的指针位置为第：".$result->current_field."列<br>";   //打印当前列的指针位置
	echo "第二列的信息如下所示：<br>";
	$finfo = $result->fetch_field();                                //获取当前列的对象
	echo "列的名称：".$finfo->name."<br>";                       //打印列的名称
	echo "数据列来自数据表：".$finfo->table."<br>";               //打印本列来自哪个数据表
	echo "本列最长字符串的长度".$finfo->max_length."<br>";        //打印本列中最长字符串长度

     	$result->close();                                           //关闭结果集释放内存
	$mysqli->close();	                                      //关闭与数据库服务器的连接
?>
