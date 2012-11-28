<?php
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo '数据库连接失败：'.$e->getMessage();
		exit;
	}

	$query="SELECT uid, name, phone, email FROM contactInfo WHERE departmentId='D01'";
	try {
		$stmt=$dbh->prepare($query);
		$stmt->execute();
		$stmt->bindColumn(1, $uid);
		$stmt->bindColumn(2, $name);
		$stmt->bindColumn('phone', $phone);
		$stmt->bindColumn('email', $email);

		while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
			 echo $uid."\t".$name."\t".$phone."\t".$email."\n";
		}
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
