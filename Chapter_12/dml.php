<?php
    $link=mysql_connect("localhost", "mysql_user", "mysql_pass") or die("����ʧ��: ".mysql_error());
    //Ϊ������mysql��չ�����Ĳ���ѡ��һ��Ĭ�ϵ����ݿ⣬���൱��SQL����use bookstore
    mysql_select_db('bookstore') or die ('����ѡ�����ݿ� bookstore : ' . mysql_error());
   
    //������3����INSERT�������Ϊһ���ַ��� 
    $insert="INSERT INTO books(bookName, publisher, author, price, detail) VALUES
	    ('PHP', '���ӹ�ҵ', '��ĳĳ', '80.00', '��PHP��ص�ͼ��'),
	    ('JSP', '�����ʵ�', '��ĳĳ', '50.00', '��JSP��ص�ͼ��'),
	    ('ASP', '���ӹ�ҵ', '��ĳĳ', '30.00', '��ASP��ص�ͼ��')";

    //ʹ��mysql_query()��������INSERT��䣬����ɹ�����TRUE��ʧ���򷵻�FALSE
    $result=mysql_query($insert);          
    if($result && mysql_affected_rows()>0){
	    echo "���ݼ�¼����ɹ������һ����������ݼ�¼IDΪ��".mysql_insert_id()."<br>";
    }else{
	    echo "�����¼ʧ�ܣ�����ţ�".mysql_errno()."������ԭ��".mysql_error()."<br>";
     }

    //ִ��UPDATE�����޸ı�books�е�һ����¼����ͼ����ΪPHP�ļ�¼�۸��޸�Ϊ79.90
    $result1=mysql_query("UPDATE books SET price='79.9' WHERE bookName='PHP'");
    if($result1 && mysql_affected_rows()>0){
	    echo "���ݼ�¼�޸ĳɹ�<br>";
    }else{
	    echo "�޸�����ʧ�ܣ�����ţ�".mysql_errno()."������ԭ��".mysql_error()."<br>";
     }

    //ִ��DELETE����ɾ����books��ͼ����ΪJSP�ļ�¼
    $result2=mysql_query("DELETE FROM books WHERE bookName='JSP'");
    if($result2 && mysql_affected_rows()>0){
	    echo "���ݼ�¼ɾ���ɹ�<br>";
    }else{
	    echo "ɾ������ʧ�ܣ�����ţ�".mysql_errno()."������ԭ��".mysql_error()."<br>";
    }
    mysql_close($link);                               //�ر���MySQL����������������
?>

