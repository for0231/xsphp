<?php
	$fileName="data.txt";             //����һ���������������ļ���
	$data="��10������\n";           //����һ�������������汻д���ļ��е�����

	for($row=0; $row<10; $row++)     //ʹ��ѭ���γ�10������
		$data.=$row.": www.lampbrother.net\n";    //��10���ݶ���ŵ�һ���ַ���������
		
	file_put_contents($fileName, $data);		    //һ�ν���������д�뵽ָ�����ļ���
?>
