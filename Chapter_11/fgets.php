<?php
	$handle = fopen("data.txt", "r")  or die("�ļ���ʧ��");    //��ֻ��ģʽ���ļ�
	while (!feof($handle)) {                   	//ѭ����ȡ��һ�У�ʹ��feof�ж϶�ȡ�ļ���β
  		$buffer = fgets($handle, 4096);         //һ�ζ�ȡ���ļ��е�һ������
   		echo $buffer."<br>";                 	//���ÿһ�У�������HTML�Ļ��б��
	}
	fclose($handle);                         	//�رմ򿪵��ļ���Դ
?>

