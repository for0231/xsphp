<?php
	$mysqli = new mysqli("localhost", "root", "123456", "demo");  //���ӱ���demo���ݿ�
	if (mysqli_connect_errno()) {
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	}
	$mysqli->query("set names gb2312");                     //�����ַ���Ϊ����2312��
     	/* �����ű��ΪD01����ϵ�������͵����ʼ�ȫ��ȡ�����뵽������� */
	$result = $mysqli->query("SELECT name, email FROM contactInfo WHERE departmentId='D01'");
	echo 'D01���ŵ���ϵ�������͵����ʼ���';
	echo '<ol>';
	while(list($name, $email)=$result->fetch_row()){     //�ӽ�����б���ÿ������
		echo '<li>'.$name.' : '.$email.'</li>';            //���б���ʽ���ÿ����¼
	}	
	echo '</ol>';
    	$result->close();                                 //�رս����
	$mysqli->close();	                           //�ر������ݿ������
?>

