<?php
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;
	}
	echo '<table border="1" align="center" width=90%>';
	echo '<caption><h1>��ϵ����Ϣ��</h1></caption>';
	echo '<tr bgcolor="#cccccc">';
	echo '<th>UID</th><th>����</th><th>��ϵ��ַ</th><th>��ϵ�绰</th><th>�����ʼ�</th></tr>';	$stmt=$dbh->prepare("select uid,name,address,phone,email from contactInfo");
	$stmt->execute();
	$allRows=$stmt->fetchAll(PDO::FETCH_NUM);
	foreach($allRows as $row){
		echo '<tr>';
		echo '<td>'.$row[0].'</td>';
		echo '<td>'.$row[1].'</td>';
		echo '<td>'.$row[2].'</td>';
		echo '<td>'.$row[3].'</td>';
		echo '<td>'.$row[4].'</td>';
		echo '</tr>';
	}
	echo '</table>';

	$stmt->execute();
	$row=$stmt->fetchAll(PDO::FETCH_COLUMN, 1);
	echo '������ϵ�˵�������';
	print_r($row);
?>

