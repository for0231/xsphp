<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	} 

	$query = "SELECT name, address, phone FROM contactinfo LIMIT 0,3";   //����SELECT���
	if ($stmt = $mysqli->prepare($query)) {                           //�������ִ�е�SQL����
		$stmt->execute();                                         //ִ��SQL���
		$stmt->store_result();                                      //ȡ��ȫ����ѯ���
          echo "��¼������".$stmt->num_rows."��<br>";               //�����ѯ�ļ�¼����
	     $stmt->bind_result($name, $address, $phone);                 //����ѯ����󶨵�������
		while ($stmt->fetch()) {                                   //������MySQL����ȡ����
		       	printf ("%s (%s,%s)<br>", $name, $address, $phone);  //��ʽ��������
		}
		$stmt->close();                          //�ͷ�mysqli_stmt����ռ�õ���Դ
	}
	$mysqli->close();                             //�ر���MySQL���ݿ������
?>
