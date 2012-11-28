<?php
	function dirSize($directory) {     	//�Զ���һ������dirSize()��ͳ�ƴ��������Ŀ¼��С
		$dir_size=0;              	//���ͱ�����ֵΪ0�������ۼӸ����ļ���С�Ӷ�����Ŀ¼��С

		if($dir_handle=@opendir($directory)) {           		//��Ŀ¼�����ж��Ƿ��ܳɹ���
			while($filename=readdir($dir_handle)) {      		//ѭ������Ŀ¼�µ������ļ�
				if($filename!="." && $filename!="..") {  	//һ��Ҫ�ų����������Ŀ¼
				    $subFile=$directory."/".$filename;   	//��Ŀ¼�µ����ļ��͵�ǰĿ¼����
					if(is_dir($subFile))               	//���ΪĿ¼
						$dir_size+=dirSize($subFile);   //�ݹ�ص���������������Ŀ¼�Ĵ�С
					if(is_file($subFile))               	//������ļ�
						$dir_size+=filesize($subFile);  //����ļ��Ĵ�С���ۼ�
				}
			}
			closedir($dir_handle);                    //�ر��ļ���Դ
			return $dir_size;                         //���ؼ�����Ŀ¼��С
		}
	}

	$dir_size=dirSize("phpMyAdmin");         	//���øú�������Ŀ¼��С������Ŀ¼��С���ֽ���
	echo round($dir_size/pow(1024,1),2)."KB";   	//����ȡ��Ŀ¼�ֽ���ת��Ϊ��KB����λ�����
?>

