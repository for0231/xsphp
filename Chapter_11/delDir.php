<?php
	function delDir($directory) {         		//�Զ��庯���ݹ��ɾ������Ŀ¼
		if(file_exists($directory)) {      	//�ж�Ŀ¼�Ƿ���ڣ����������rmdir()���������
			if($dir_handle=@opendir($directory)) {      	//��Ŀ¼����Ŀ¼��Դ�����ж��Ƿ�ɹ�
				while($filename=readdir($dir_handle)) {  //����Ŀ¼������Ŀ¼�е��ļ����ļ���
					if($filename!="." && $filename!="..") {   	//һ��Ҫ�ų����������Ŀ¼
						$subFile=$directory."/".$filename;   	//��Ŀ¼�µ��ļ��͵�ǰĿ¼����
						if(is_dir($subFile))                	//�����Ŀ¼���������
							delDir($subFile);             	//�ݹ�����Լ�ɾ����Ŀ¼
						if(is_file($subFile))                	//������ļ����������
							unlink($subFile);             	//ֱ��ɾ������ļ�
					}
				}
				closedir($dir_handle);                       	//�ر�Ŀ¼��Դ
				rmdir($directory);                          	//ɾ����Ŀ¼
			}
		}
	}
	delDir("phpMyAdmin");  //����delDir()����������������Ŀ¼�еġ�phpMyAdmin���ļ���ɾ��
?>
