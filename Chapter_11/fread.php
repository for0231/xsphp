<?php
     	//���ļ��ж�ȡָ���ֽ��������ݴ��뵽һ��������
	$filename = "data.txt";                               //�������ļ��������ڱ�����
	$handle = fopen($filename, "r") or die("�ļ���ʧ��");   //��ֻ���ķ�ʽ���ļ��������ļ���Դ
	$contents = fread($handle, 100);                       //���ļ��ж�ȡǰ100���ֽ�
	fclose($handle);                                    //�ر��ļ���Դ
	echo $contents;                                    //�����ļ��ж�ȡ���������
	
     	//���ļ��ж�ȡȫ�����ݴ��뵽һ�������У�ÿ�ζ�ȡһ���֣�ѭ����ȡ
	$filename="c:\\files\\somepic.gif";                      //���������ļ����ļ��������ڱ�����
	$handle = fopen ($filename, "rb") or die("�ļ���ʧ��");  //��ֻ���ķ�ʽ���ļ���ģʽ���ˡ�b��
	$contents = "";                             //����һ�����ڱ���ȫ���ļ����ݵ��ַ���
	while (!feof($handle)) {                      //ѭ����ȡ�ļ������ݣ�ʹ��feof()�ж��ļ���β
 		 $contents .= fread($handle, 1024);        //ÿ�ζ�ȡ1024���ֽ�
	}
	fclose($handle);                            //�ر��ļ���Դ
	echo $contents;                            //�����ļ��ж�ȡ��ȫ���������

     	//��һ�ִ��ļ��ж�ȡȫ�����ݵķ���
	$filename = "data.txt";                              //�������ļ��������ڱ�����
	$handle = fopen($filename, "r") or die("�ļ���ʧ��");  //��ֻ���ķ�ʽ���ļ��������ļ���Դ
	$contents = fread($handle, filesize ($filename));     //ʹ��filesize()������ȡ�ļ����ȣ�һ�����
	fclose($handle);                               //�ر��ļ���Դ
	echo $contents;                               //�����ļ��ж�ȡ��ȫ���������
?>
