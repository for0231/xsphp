<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");  //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                   //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	}
	$mysqli->query("set names gb2312");                            //���ò�ѯ�ַ���
	$result = $mysqli->query("SELECT * FROM contactInfo");          //ִ�в�ѯ����ȡ�����

	echo '<table width="90%" border="1" align="center">';               //��ӡHTML���
	echo '<caption><h1>��ϵ����Ϣ��</h1></caption>';                //�������
	echo '<th>�û�ID</th><th>����</th><th>���ű��</th>';          //����ֶ���
	echo '<th>��ϵ��ַ</th><th>��ϵ�绰</th><th>�����ʼ�</th>';    
	while($rowObj=$result->fetch_object()){                        //ѭ���ӽ�����б�����¼
		echo '<tr align="center">';                                //����б��
		echo '<td>'.$rowObj->uid.'</td>';                          //����û�ID
		echo '<td>'.$rowObj->name.'</td>';                        //����û�����
		echo '<td>'.$rowObj->departmentId.'</td>';                  //������ű��
		echo '<td>'.$rowObj->address.'</td>';                       //�����ϵ��ַ
		echo '<td>'.$rowObj->phone.'</td>';                        //�����ϵ�绰
		echo '<td>'.$rowObj->email.'</td>';                         //��������ʼ�
		echo '</tr>';
	}	
	echo '</table>';
    	$result->close();                                           //�رս�����ͷ��ڴ�
	$mysqli->close();	                                      //�ر������ݿ������������
?>
