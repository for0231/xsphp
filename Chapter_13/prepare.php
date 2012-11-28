<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	} 
     	//����һ��INSERT��䣬��ʹ��$mysqli->prepare()��������ִ�е����SQL������д���
	$query="INSERT INTO contactInfo(name, departmentId, address, phone, email) VALUES (?, ?, ?, ?,?)";
	$stmt = $mysqli->prepare($query);                    //�������ִ�е�SQL����
	
     	//��5��ռλ���ţ�?����Ӧ�Ĳ����󶨵�5��PHP������
	$stmt->bind_param('sssss', $name, $departmentId, $address, $phone, $email);

	$name="��ĳĳ";                                  //Ϊ��һ���󶨵Ĳ��������ַ�����ֵ
	$departmentId="D03";                              //Ϊ�ڶ����󶨵Ĳ��������ַ�����ֵ
	$address="�йش�";                                //Ϊ�������󶨵Ĳ��������ַ�����ֵ
	$phone="15801683721";                            //Ϊ���ĸ��󶨵Ĳ��������ַ�����ֵ
	$email="zm@lampbrother.net";                       //Ϊ������󶨵Ĳ��������ַ�����ֵ

	$stmt->execute();                        //ִ��Ԥ�����SQL������������������

	echo "�����������".$stmt->affected_rows."<br>";     //���ز��������
	echo "�Զ�������UID��".$mysqli->insert_id."<br>";   //����������ɵ�AUTO_INCREMENTֵ
     
     	//���¼�����������Ϊ������ֵ��������ʱ�ظ�������̼��������¼��
	$name="��ĳĳ";
	$departmentId="D01";
	$address="������";
	$phone="15801689675";
	$email="bm@lampbrother.net";
	$stmt->execute();                            //���¸�������ֵ���ٴ����������������

	echo "�����������".$stmt->affected_rows."<br>";     //���ز��������
	echo "�Զ�������UID��".$mysqli->insert_id."<br>";   //����������ɵ�AUTO_INCREMENTֵ

	$stmt->close();                         //�ͷ�mysqli_stmt����ռ�õ���Դ
	$mysqli->close();                       //�ر���MySQL���ݿ������
?>

