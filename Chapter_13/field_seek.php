<?php
	$mysqli = new mysqli("localhost", "root", "123456", "demo");    //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                        //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	} 
	$mysqli->query("set names gb2312");                             //���ò�ѯ�ַ���
	$result = $mysqli->query("SELECT * FROM contactInfo");           //ִ�в�ѯ����ȡ�����

	echo "������ݱ��������и���Ϊ��".$result->field_count."��<br>";   //�Ӳ�ѯ����л�ȡ����
	echo "Ĭ�ϵ�ǰ�е�ָ��λ��Ϊ�ڣ�".$result->current_field."��<br>";  //��ӡĬ���е�ָ��λ��
	echo "��ָ��ǰ�е�ָ���ƶ����ڶ���;<br>";
	$result->field_seek(1);                      //����ǰ��ָ�������ڶ��У�Ĭ��0�����һ�У�
	echo "ָ��ǰ�е�ָ��λ��Ϊ�ڣ�".$result->current_field."��<br>";   //��ӡ��ǰ�е�ָ��λ��
	echo "�ڶ��е���Ϣ������ʾ��<br>";
	$finfo = $result->fetch_field();                                //��ȡ��ǰ�еĶ���
	echo "�е����ƣ�".$finfo->name."<br>";                       //��ӡ�е�����
	echo "�������������ݱ�".$finfo->table."<br>";               //��ӡ���������ĸ����ݱ�
	echo "������ַ����ĳ���".$finfo->max_length."<br>";        //��ӡ��������ַ�������

     	$result->close();                                           //�رս�����ͷ��ڴ�
	$mysqli->close();	                                      //�ر������ݿ������������
?>
