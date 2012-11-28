<?php
	try{
	　　$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');　　
	　　$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo '数据库连接失败：'.$e->getMessage();
		exit;
	}
	$query="SELECT name, phone, email FROM contactInfo WHERE departmentId='D01'";	
	try {
		$pdostatement=$dbh->query($query);
　　　　　	echo "一共从表中获取到".$pdostatement->rowCount()."条记录:\n";
		foreach ($pdostatement as $row) {
       		echo $row['name'] . "\t";
       		echo $row['phone'] . "\t";
        		echo $row['email'] . "\n";
    		}
	} catch (PDOException $e) {
		echo $e->getMessage();
 		print_r($dbh->errorInfo());
	}
?>
