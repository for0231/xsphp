<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                         //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	} 

	$success=TRUE;                                                  //��������ִ��״̬
	$price=8000;                                                      //ת�˵���Ŀ

	$mysqli->autocommit(0);                     //��ʱ�ر�MySQL������Ƶ��Զ��ύģʽ
     	//ִ�д�userA��¼�м���cash��ֵ������1��ʾ�ɹ�������ִ��ʧ��
	$result=$mysqli->query("UPDATE account SET cash=cash-$price WHERE name='userA'");
	//���SQL���ִ��ʧ�ܻ�û�иı��¼�е�ֵ����$sucess��ֵ����ΪFALSE
	if(!$result or $mysqli->affected_rows !=1) {
		$success=FALSE;                      //����$sucess��ֵΪFALSE
	}
    	 //ִ����userB��¼�����cash��ֵ������1��ʾ�ɹ�������ִ��ʧ��
	$result=$mysqli->query("UPDATE account SET cash=cash+$price WHERE name='userB'");
	//���SQL���ִ��ʧ�ܻ�û�иı��¼�е�ֵ����$sucess��ֵ����ΪFALSE
	if(!$result or $mysqli->affected_rows !=1) {
		$success=FALSE;                      //����$sucess��ֵΪFALSE
	}

	if($success){                               //���$success��ֵΪTRUE
		$mysqli->commit();                     //�����ύ�����ݿ�
		echo "ת�˳ɹ�!";                      //����ɹ�����ʾ��Ϣ
	}else{                                     //���$success��ֵΪFLASE���������д���
		$mysqli->rollback();                     //�ع���ǰ����������SQL���������
		echo "ת��ʧ��!";                       //������ɹ�����ʾ��Ϣ
	}
	$mysqli->autocommit(1);                      //����MySQL������Ƶ��Զ��ύģʽ

	$mysqli->close();                             //�ر���MySQL���ݿ������
?>
