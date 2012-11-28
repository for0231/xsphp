<?php 
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '数据库连接失败：'.$e->getMessage();
		exit;
	}

	$query="INSERT INTO contactInfo (name, address, phone) VALUES (?, ?, ?)";
	$stmt=$dbh->prepare($query);

	$name="赵某某";
	$address="海淀区中关村";
	$phone="15801688348";
	$stmt->bindParam(1, $name);
	$stmt->bindParam(2, $address);
	$stmt->bindParam(3, $phone);
	$stmt->execute();

	$name="孙某某";
	$address="宣武区";
	$phone="15801688698";
	$stmt->bindParam(1, $name);
	$stmt->bindParam(2, $address);
	$stmt->bindParam(3, $phone);
	$stmt->execute();
?>

