<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //����MySQL���ݿ�
	if (mysqli_connect_errno()) {                                //������Ӵ���
 		printf("����ʧ��: %s<br>", mysqli_connect_error());
		exit();
	} 
    	 /* ������SQL����ʹ�÷ֺţ�;���ָ�, ���ӳ�һ���ַ��� */
	$query = "SET NAMES GB2312;";                          //���ò�ѯ�ַ���ΪGB2312
	$query .= "SELECT CURRENT_USER();";                   //��MySQL��������ȡ��ǰ�û�
	$query .= "SELECT name,phone FROM contactinfo LIMIT 0,2";  //��contactinfo���ж�ȡ����

	if ($mysqli->multi_query($query)) {                         //ִ�ж���SQL����
	    do {
  	     	 if ($result = $mysqli->store_result()) {            //��ȡ��һ�������
   	              while ($row = $result->fetch_row()) {         //�����������ÿ����¼
				    foreach($row as $data){                 //��һ�м�¼�����л�ȡÿ������
					    echo $data."&nbsp;&nbsp;";        //���ÿ������
				    }
				    echo "<br>";                          //������з���
   	       	  }
    	        	  $result->close();                             //�ر�һ���򿪵Ľ����
    		 }
          if ($mysqli->more_results()) {                       //�ж��Ƿ��и���Ľ����
     	     echo "-----------------<br>";                     //���һ�зָ���
      	 }
 	   } while ($mysqli->next_result());                     //��ȡ��һ���������������ִ��ѭ��
	}
	$mysqli->close();                                    //�ر�mysqli����
?>

