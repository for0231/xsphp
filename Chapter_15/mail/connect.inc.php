<?php
	$host="localhost";                                     		//���ݿ���������
	$dbuser="mysql_user";                                 		//���ݿ���û���
	$dbpass="mysql_pwd";                                		//���ݿ������
	$dbname="testmail";                                   		//���ݿ�Ŀ�����
	$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname); 	//����mysqli�����������ݿ�
	if (mysqli_connect_errno()) {                           	//������ݿ��Ƿ����ӳɹ�
  		printf("����ʧ��: %s\n", mysqli_connect_error());       //�������ʧ��ԭ��
    		exit();                                          	//�˳�����
	}
?>
