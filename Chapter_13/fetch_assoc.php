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
	while($row=$result->fetch_assoc()){                            //ѭ���ӽ�����б�����¼
		echo '<tr align="center">';                                //����б��
		echo '<td>'.$row["uid"].'</td>';                            //����û�ID
		echo '<td>'.$row["name"].'</td>';                          //����û�����
		echo '<td>'.$row["departmentId"].'</td>';                    //������ű��
		echo '<td>'.$row["address"].'</td>';                        //�����ϵ��ַ
		echo '<td>'.$row["phone"].'</td>';                         //�����ϵ�绰
		echo '<td>'.$row["email"].'</td>';                          //��������ʼ�
		echo '</tr>';
	}	
	echo '</table>';
     	$result->close();                                           //�رս�����ͷ��ڴ�
	$mysqli->close();	                                      //�ر������ݿ������������
?>
