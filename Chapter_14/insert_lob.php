<?php
	$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	$stmt = $dbh->prepare("insert into images(contenttype, imagedata) values (?, ?)");
	$fp = fopen($_FILES['file']['tmp_name'], 'rb');
	$stmt->bindParam(1, $_FILES['file']['type']);
	$stmt->bindParam(2, $fp, PDO_PARAM_LOB);
	$stmt->execute();
?>

