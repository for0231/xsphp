<?php
	require "MyTpl_class.php";                                      //����ģ�������������ļ�          
	
	$mysqli=new mysqli("localhost", "mysql_user", "mysql_pwd", "mydb");  //����mysqli����
     	//ִ��SQL�����û���User�в�ѯ���м�¼��������$User������  
	$mysqli->query("set names gb2312"); 
	if($result=$mysqli->query("SELECT id, name, sex, age, email FROM User")){
		while($row=$result->fetch_assoc()){                //ѭ���ӽ�����б���ÿ������
			$users[]=$row;                             //ȡ�������ж�������ͬһ��������
		}
		$rowNum=$result->num_rows;                    //����ȡ���������������ڱ�����
		$result->close();                                 //�رս����
	}
	$mysqli->close();                                    //�ر������ݿ������

	$tpl=new MyTpl("./templates/", "./templates_c");          //����ģ����������󲢶����Գ�ʹ��
	$tpl->assign("title", "�Զ���ģ������ʾ��");             //������������ͷ��ģ��header.tpl
	$tpl->assign("tableName", "�û���Ϣ��");               //���������������ģ��
	$tpl->assign("author", "�����");                       //�������߱�����β��ģ��footer.tpl
	$tpl->assign("users", $users);                          //������б�User�Ķ�ά�������ģ��
	$tpl->assign("rowNum", $rowNum);                    //������ȡ������������������ģ��
	$tpl->display("main.tpl");                             //�����滻ģ���еı������ģ��ҳ��
?>
