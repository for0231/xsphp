<?php
	if($_FILES['myfile']['error'] > 0) {      //�ж��ļ��Ƿ���Գɹ��ϴ�����������0��ʾ�ϴ��ɹ�
		echo '�ϴ�����: ';
    		switch ($_FILES['myfile']['error']) {
     			case 1:  
				echo '�ϴ��ļ���С������PHP�����ļ��е�Լ��ֵ��upload_max_filesize';  
				break;
			case 2:  
				echo '�ϴ��ļ���С�����˱��е�Լ��ֵ��MAX_FILE_SIZE';  
				break;
			case 3:  
				echo '�ļ�ֻ����������'; 
			       	break;
			case 4:  
				echo 'û���ϴ��κ��ļ�'; 
			       	break;
   		}
		exit;       //���$_FILES['myfile']['error']����0�����д������������Ϣ���˳�����
	}
     	//��ȡ�ϴ��ļ���MIME�����е������ͺ�������
	list($maintype,$subtype)=explode("/",$_FILES['myfile']['type']);	
  	if ($maintype=="text") {    //ͨ�����������Ʋ����ϴ��ı��ļ�������.txt .html .php���ļ��ļ�
		echo '����: �����ϴ��ı��ļ���';
		exit;                //����û��ϴ��ı��ļ����˳�����
	}

	$upfile = './uploads/'.time().$_FILES['myfile']['name'];     //�����ϴ����λ�ú����ļ���
	if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {     //�ж��Ƿ�Ϊ�ϴ��ļ�
 	    	if (!move_uploaded_file($_FILES['myfile']['tmp_name'], $upfile)) {   //���ƶ��ļ�
        		echo '����: ���ܽ��ļ��ƶ���ָ��Ŀ¼��';
       		exit;
		}
 	}else{
		echo '����: �ϴ��ļ�����һ���Ϸ��ļ�: ';
		echo $_FILES['myfile']['name'];
		exit;
	}

	echo '�ļ�'.$upfile.'�ϴ��ɹ�,��СΪ'.$_FILES['myfile']['size'].'��<br>';   //����ļ��ϴ��ɹ������
?>
