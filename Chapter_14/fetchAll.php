<?php
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');
	}catch(PDOException $e){
		echo '数据库连接失败：'.$e->getMessage();
		exit;
	}
	echo '<table border="1" align="center" width=90%>';
	echo '<caption><h1>联系人信息表</h1></caption>';
	echo '<tr bgcolor="#cccccc">';
	echo '<th>UID</th><th>姓名</th><th>联系地址</th><th>联系电话</th><th>电子邮件</th></tr>';	$stmt=$dbh->prepare("select uid,name,address,phone,email from contactInfo");
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
	echo '所有联系人的姓名：';
	print_r($row);
?>

