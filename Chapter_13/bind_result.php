<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	} 
     	//����SELECT��䣬�����ű�Ų��ң�ʹ��ռλ���ţ�?����ʾ��Ҫ���ҵĲ���
	$query = "SELECT name, address, phone FROM contactinfo WHERE departmentId=? LIMIT 0,3";  
	if ($stmt = $mysqli->prepare($query)) {                           //�������ִ�е�SQL����
		$stmt->bind_param('s',$departmentId);                       //�󶨲������ű�� 
		$departmentId="D01";                                    //���󶨵ı�������ֵ
		$stmt->execute();                                        //ִ��SQL���
		$stmt->store_result();                                     //ȡ��ȫ����ѯ���
		$stmt->bind_result($name, $address, $phone);                 //����ѯ����󶨵�������
		echo "D01���ŵ���ϵ����Ϣ�б����£�<br>";              //��ӡ��ʾ��Ϣ
		while ($stmt->fetch()) {                                   //������MySQL����ȡ����
		       	printf ("%s (%s,%s)<br>", $name, $address, $phone);  //��ʽ��������
		}

		echo "D02���ŵ���ϵ����Ϣ�б����£�<br>";               //��ӡ��ʾ��Ϣ
		$departmentId="D02";                                     //���󶨵ı���������ֵ
		$stmt->execute();                                         //ִ��SQL���
		$stmt->store_result();                                      //ȡ��ȫ����ѯ���
		while ($stmt->fetch()) {                                   //������MySQL����ȡ����
		       	printf ("%s (%s,%s)<br>", $name, $address, $phone);  //��ʽ��������
		}
		$stmt->close();                          //�ͷ�mysqli_stmt����ռ�õ���Դ
	}
	$mysqli->close();                             //�ر���MySQL���ݿ������
?>
