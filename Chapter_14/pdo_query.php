<?php
	try{
	����$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');����
	����$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;
	}
	$query="SELECT name, phone, email FROM contactInfo WHERE departmentId='D01'";	
	try {
		$pdostatement=$dbh->query($query);
����������	echo "һ���ӱ��л�ȡ��".$pdostatement->rowCount()."����¼:\n";
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
