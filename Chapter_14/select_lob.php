<?php
	$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	$stmt = $dbh->prepare("select contenttype, imagedata from images where id=?");
	$stmt->execute(array($_GET['id']));
	list($type, $lob) = $stmt->fetch();
	header("Content-Type: $type");
	fpassthru($lob);
?>

