<?php
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '数据库连接失败：'.$e->getMessage();
		exit;	
	}
	$query="UPDATE contactInfo SET phone='15801680168' where name='高某某'";
	$affected=$dbh->exec($query);
	if($affected){
		echo '数据表contactInfo中受影响的行数为：'.$affected;
	}else{
		print_r($dbh->errorInfo());
	}
?>

