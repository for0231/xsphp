<?php
	$fileName="data.txt";     //����һ���������������ļ���		
     	//ʹ��fopen()������ֻд��ģʽ���ļ�������������򴴽�������ʧ����ͨ������
	$handle = fopen($fileName, 'w') or die('��<b>'.$fileName.'</b>�ļ�ʧ��!!');
	
	for($row=0; $row<10; $row++)                      //ѭ��10��д��10�����ݵ��ļ���
		fwrite($handle, $row.": www.lampbrother.net\n");	 //д���ļ� 
		
	fclose($handle);	         //�ر���fopen()�򿪵��ļ�ָ����Դ
?>

