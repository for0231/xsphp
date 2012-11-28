<?php
	function getFilePro($fileName) {     //����һ��������ͨ������һ���ļ����ƻ�ȡ�ļ��󲿷�����
		if(!file_exists($fileName)) {     //����ṩ���ļ���Ŀ¼�����ڣ���ֱ���˳�����
			echo "Ŀ���ļ������ڣ���<br>";
			return;
		}
		
		if(is_file($fileName))          //�ж��Ƿ���һ����ͨ�ļ������������������
			echo $fileName."��һ���ļ�<br>";
		if(is_dir($fileName))          //�ж��Ƿ���һ��Ŀ¼�����������������������������
			echo $fileName."��һ��Ŀ¼<br>";

		echo "�ļ���̬��".getFileType($fileName)."<br>";       //�ö���ĺ�������ļ���̬
		echo "�ļ���С��".getFileSize(filesize($fileName))."<br>"; //��ȡ�ļ���С�����Զ���ת����λ
		
		if(is_readable($fileName))     //�ж��ṩ���ļ��Ƿ���Զ�ȡ����
			echo "�ļ��ɶ�<br>";
	  	if(is_writable($fileName))     //�ж��ṩ���ļ��Ƿ���Ը�д
			echo "�ļ���д<br>";
		if(is_executable($fileName))   //�ж��ṩ���ļ��Ƿ���ִ�е�Ȩ��
			echo "�ļ���ִ��<br>";

	  	echo "�ļ�����ʱ��: ".date("Y �� m �� j ��",filectime($fileName))."<br>";
		echo "�ļ�������ʱ��: ".date("Y �� m �� j ��",filemtime($fileName))."<br>";
		echo "�ļ�����ʱ��: ".date("Y �� m �� j ��",fileatime($fileName))."<br>";		
	}

	function getFileType($fileName) {    //����һ���������������ļ�������
		switch(filetype($fileName)){    //ͨ��filetype()�������ص��ļ�������Ϊѡ�������
			case 'file':
				$type.="��ͨ�ļ�";		
				break;			
			case 'dir':
				$type.="Ŀ¼�ļ�";		
				break;			
			case 'block':
				$type.="���豸�ļ�";		
				break;			
			case 'char':
				$type.="�ַ��豸�ļ�";		
				break;			
			case 'fifo':
				$type.="�����ܵ��ļ�";		
				break;			
			case 'link':
				$type.="��������";		
				break;			
			case 'unknown':
				$type.="ĩ֪����";		
				break;	
			default:
				$type.="û�м�⵽����";		
		}
		return $type;        //����ת���������
	}

	function getFileSize($bytes) {        //�Զ���һ���ļ���С��λת������
		if ($bytes >= pow(2,40)) {      //����ṩ���ֽ������ڵ���2��40�η�������������
			$return = round($bytes / pow(1024,4), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�T��С
			$suffix = "TB";                         //��λΪTB
		} elseif ($bytes >= pow(2,30)) {  //����ṩ���ֽ������ڵ���2��30�η�������������
			$return = round($bytes / pow(1024,3), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�G��С
			$suffix = "GB";                         //��λΪGB
		} elseif ($bytes >= pow(2,20)) {  //����ṩ���ֽ������ڵ���2��20�η�������������
			$return = round($bytes / pow(1024,2), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�M��С
			$suffix = "MB";                         //��λΪMB
		} elseif ($bytes >= pow(2,10)) {  //����ṩ���ֽ������ڵ���2��10�η�������������
			$return = round($bytes / pow(1024,1), 2);    //���ֽڴ�Сת��Ϊͬ�ȵ�K��С
			$suffix = "KB";                         //��λΪKB
		} else {                     //�����ṩ���ֽ���С��2��10�η�������������
			$return = $bytes;                       //�ֽڴ�С��λ����
			$suffix = "Byte";                       //��λΪByte
		}
		return $return ." " . $suffix;                    //���غ��ʵ��ļ���С�͵�λ
	}
	
	getFilePro("file.php");  //�����Զ��庯��������ǰĿ¼�µ�file.php�ļ����룬��ȡ����
?>
