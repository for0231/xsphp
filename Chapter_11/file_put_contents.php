<?php
	$fileName="data.txt";             //声明一个变量用来保存文件名
	$data="共10行数据\n";           //声明一个变量用来保存被写入文件中的数据

	for($row=0; $row<10; $row++)     //使用循环形成10行数据
		$data.=$row.": www.lampbrother.net\n";    //将10数据都存放到一个字符串变量中
		
	file_put_contents($fileName, $data);		    //一次将所有数据写入到指定的文件中
?>
