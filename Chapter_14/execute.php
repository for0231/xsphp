<?php 
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;
	}

	$query="INSERT INTO contactInfo (name, address, phone) VALUES (:name, :address, :phone)";
	$stmt=$dbh->prepare($query);

	$stmt->execute(array(":name"=>"��ĳĳ",":address"=>"������", ":phone"=>"15801688348"));

	$stmt->execute(array(":name"=>"��ĳĳ",":address"=>"������", ":phone"=>"15801688698"));
?>

