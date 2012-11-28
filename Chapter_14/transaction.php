<?php
	try {  
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$dbh->beginTransaction();
		$dbh->exec("insert into staff (id, name, Positions) values (23, 'Tom', 'programmer')");
		$dbh->exec("insert into salarychange (id, amount, changedate) values (23, 5000, NOW())");  
		$dbh->commit();
	} catch (Exception $e) { 
		$dbh->rollBack();
		echo 'Ê§°Ü£º'.$e->getMessage();
	}
?>

