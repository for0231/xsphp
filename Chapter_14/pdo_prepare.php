<?php 
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;
	}

	$query="INSERT INTO contactInfo (name, address, phone) VALUES (?, ?, ?)";
	$stmt=$dbh->prepare($query);

	$name="��ĳĳ";
	$address="�������йش�";
	$phone="15801688348";
	$stmt->bindParam(1, $name);
	$stmt->bindParam(2, $address);
	$stmt->bindParam(3, $phone);
	$stmt->execute();

	$name="��ĳĳ";
	$address="������";
	$phone="15801688698";
	$stmt->bindParam(1, $name);
	$stmt->bindParam(2, $address);
	$stmt->bindParam(3, $phone);
	$stmt->execute();
?>

