<?php
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;	
	}
	$query="UPDATE contactInfo SET phone='15801680168' where name='��ĳĳ'";
	$affected=$dbh->exec($query);
	if($affected){
		echo '���ݱ�contactInfo����Ӱ�������Ϊ��'.$affected;
	}else{
		print_r($dbh->errorInfo());
	}
?>

