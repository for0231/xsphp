<?php
	function copyDir($dirSrc, $dirTo) {       //�Զ��庯���ݹ�ĸ��ƴ��ж༶��Ŀ¼��Ŀ¼
		if(is_file($dirTo)) {               //���Ŀ�겻��һ��Ŀ¼����һ���Ѵ��ڵ��ļ����˳�
			echo "Ŀ�겻��Ŀ¼���ܴ���!!";
			return;                    //�˳�����
		}
		if(!file_exists($dirTo)) {          //���Ŀ��Ŀ¼�������򴴽��������򲻱�
			mkdir($dirTo);             //����Ŀ¼Ŀ¼
		}
		if($dir_handle=@opendir($dirSrc)) {           //��Ŀ¼����Ŀ¼��Դ�����ж��Ƿ�ɹ�
			while($filename=readdir($dir_handle)) {    //����Ŀ¼������Ŀ¼�е��ļ����ļ���
				if($filename!="." && $filename!="..") {     //һ��Ҫ�ų����������Ŀ¼
					$subSrcFile=$dirSrc."/".$filename;     //��ԴĿ¼�Ķ༶��Ŀ¼����
					$subToFile=$dirTo."/".$filename;      //��Ŀ��Ŀ¼�Ķ༶��Ŀ¼����
						
					if(is_dir($subSrcFile))                    //���Դ�ļ���һ��Ŀ¼
						copyDir($subSrcFile, $subToFile);     //�ݹ�����Լ�������Ŀ¼
					if(is_file($subSrcFile))                   //���Դ�ļ���һ����ͨ�ļ�
						copy($subSrcFile, $subToFile);       //ֱ�Ӹ��Ƶ�Ŀ��λ��
				}
			}
			closedir($dir_handle);       //�ر�Ŀ¼��Դ
		}
	}
	copyDir("phpMyAdmin", "D:/admin");   //���Ժ�������Ŀ¼"phpMyAdmin"���Ƶ�"D:/admin"
?>
