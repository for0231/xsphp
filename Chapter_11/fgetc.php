<?php
	$fp = fopen('data.txt', 'r') or die("�ļ���ʧ��");    //��ֻ��ģʽ���ļ�
	
	while (false !== ($char = fgetc($fp))) {      //ѭ���ļ��ж�ȡһ���ڷ����� EOF ���ֹͣ
   		 echo $char."<br>";                 //��������ַ�
	}
?>
