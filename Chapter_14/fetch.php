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
	echo '<th>UID</th><th>姓名</th><th>联系地址</th><th>联系电话</th><th>电子邮件</th></tr>';
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

