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
	echo '<th>UID</th><th>����</th><th>��ϵ��ַ</th><th>��ϵ�绰</th><th>�����ʼ�</th></tr>';
	$stmt=$dbh->query("select uid,name,address,phone,email from contactInfo");
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		echo '<tr>';
		echo '<td>'.$row["uid"].'</td>';
		echo '<td>'.$row["name"].'</td>';
		echo '<td>'.$row["address"].'</td>';
		echo '<td>'.$row["phone"].'</td>';
		echo '<td>'.$row["email"].'</td>';
		echo '</tr>';
	}
	echo '</table>';
?>

