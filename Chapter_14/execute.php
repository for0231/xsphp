<?php 
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo 'Êý¾Ý¿âÁ¬½ÓÊ§°Ü£º'.$e->getMessage();
		exit;
	}

	$query="INSERT INTO contactInfo (name, address, phone) VALUES (:name, :address, :phone)";
	$stmt=$dbh->prepare($query);

	$stmt->execute(array(":name"=>"ÕÔÄ³Ä³",":address"=>"º£µíÇø", ":phone"=>"15801688348"));

	$stmt->execute(array(":name"=>"ËïÄ³Ä³",":address"=>"ÐûÎäÇø", ":phone"=>"15801688698"));
?>

