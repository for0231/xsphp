<?php
     	/* ����MySQL���ݿⲢ���ɹ��򷵻�mysqli ����*/
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "mylib");
	/* ������ӣ�������ӳ������������Ϣ���˳����� */ 
	if (mysqli_connect_errno()) {
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	}
	/* ��ӡ��ǰ���ݿ�ʹ���ַ����ַ��� */
	printf ("��ǰ���ݿ���ַ����� %s<br>", $mysqli->character_set_name());
	/* ��ӡ�ͻ��˰汾 */
	printf("�ͻ��˿�汾�� %s<br>", $mysqli->get_client_info());
	/* ��ӡ������������Ϣ */
	printf("������Ϣ�� %s<br>", $mysqli->host_info);
	/* ��ӡ�ַ�����ʽMySQL�������汾 */
	printf("�������汾: %s<br>", $mysqli->server_info);
	/*��ӡ������ʽMySQL�������汾*/
	printf("�������汾��%d<br>", $mysqli->server_version);
	/* �رմ򿪵����ݿ����� */
	$mysqli->close();	
?>
