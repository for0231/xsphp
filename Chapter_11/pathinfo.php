<?php
	$path = "/var/www/html/page.php";  //������ָ��һ���ļ���ȫ·�����ַ���
	$path_parts=pathinfo($path);        //���ذ���ָ��·���е�Ŀ¼��������������չ����������
	echo $path_parts["dirname"];        //���Ŀ¼��/var/www/html
	echo $path_parts["basename"];       //���������page.php
	echo $path_parts["extension"];       //�����չ��.php
?>
