<?php
	$path = "/var/www/html/page.php";    //������ָ��һ���ļ���ȫ·�����ַ���

	echo basename($path);             //��ʾ�����ļ���չ�����ļ��������page.php
	echo basename($path,".php");       //��ʾ�������ļ���չ�����ļ��������page
?>
