<?php
	if(copy('./file1.txt', '../data/file2.txt')) {              //�����ļ�ʾ��
		echo "�ļ����Ƴɹ���";
	}else{
		echo "�ļ�����ʧ�ܣ�";
	}

	$filename="file1.txt";                           //ɾ���ļ�ʾ��
	if(file_exists($filename)){
		if(unlink($filename)) {
			echo "�ļ�ɾ���ɹ���";
		}else{
			echo "�ļ�ɾ��ʧ�ܣ�";
		}
	}else{
		echo "Ŀ���ļ�������";
	}

	if(rename('./demo.php', './demo.html')) {           //�������ļ�ʾ��
		echo "�ļ��������ɹ���";
	}else{
		echo "�ļ�������ʧ��";
	}

	$fp=fopen('./data.txt', "r+") or die('�ļ���ʧ��');  //��ȡ�ļ�ʾ��
	if(ftruncate($fp, 1024)) {
		echo "�ļ���ȡ�ɹ���";
	}else{
		echo "�ļ���ȡʧ�ܣ�";
	}
?>
