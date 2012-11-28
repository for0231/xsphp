<?php
	$opt=array(PDO::ATTR_PERSISTENT => TRUE);
	try {
   		$dbh = new PDO('mysql:dbname=testdb;host=localhost', 'mysql_user', 'mysql_pwd', $opt);
	} catch (PDOException $e) {
		echo '数据库连接失败：'.$e->getMessage();
		exit;
	}
	echo "\nPDO是否关闭自动提交功能：".$dbh->getAttribute(PDO::ATTR_AUTOCOMMIT);
	echo "\n当前PDO的错误处理的模式：".$dbh->getAttribute(PDO::ATTR_ERRMODE);
	echo "\n表字段字符的大小写转换： ".$dbh->getAttribute(PDO::ATTR_CASE);
	echo "\n与连接状态相关特有信息： ".$dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	echo "\n空字符串转换为SQL的null：".$dbh->getAttribute(PDO::ATTR_ORACLE_NULLS);
	echo "\n应用程序提前获取数据大小：".$dbh->getAttribute(PDO::ATTR_PERSISTENT);
	echo "\n与数据库特有的服务器信息：".$dbh->getAttribute(PDO::ATTR_SERVER_INFO);
	echo "\n数据库服务器版本号信息：".$dbh->getAttribute(PDO::ATTR_SERVER_VERSION);
	echo "\n数据库客户端版本号信息：".$dbh->getAttribute(PDO::ATTR_CLIENT_VERSION);
?>

