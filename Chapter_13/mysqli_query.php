<?php
	$mysqli = new mysqli("localhost", "root", "123456", "mylib");
	if (mysqli_connect_errno()) {
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	}
     	/* ִ��SQL��������в���һ����¼������ȡ�ı�ļ�¼������IDֵ */
	if($mysqli->query("insert into ����(��1, ��2) values ('ֵ1','ֵ2')")){
		echo "�ı�ļ�¼����".$mysqli->affected_rows."<br>";
		echo "�²����IDֵ��".$mysqli->insert_id."<br>";
	}
	$mysqli->close();	
?>

