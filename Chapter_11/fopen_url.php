<?php
	$file = fopen ("http://www.lampbrother.com/", "r") or die("��Զ���ļ�ʧ�ܣ���");  //��Զ���ļ�

	while (!feof ($file)) {              //ѭ�����ļ��ж�ȡ����
    		$line = fgets ($file, 1024);     //ÿ��ȡһ��
         //����ҵ�Զ���ļ��еı�������ȡ�����⣬���˳�ѭ�������ڶ�ȡ�ļ�
   		if (preg_match("/<title>(.*)<\/title>/", $line, $out)) {    //ʹ������ƥ�������
     			$title = $out[1];                        //���������еı����ַ�ȡ��
      			break;                                //�˳�ѭ��������Զ���ļ���ȡ
   		}
	}
	fclose($file);                  //�ر��ļ���Դ
	echo $title;                   //�����ȡ����Զ����ҳ�ı���
?>
