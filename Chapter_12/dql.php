<?php
    $link=mysql_connect("localhost", "mysql_user", "mysql_pass") or die("����ʧ��: ".mysql_error());
    mysql_select_db('bookstore') or die ('����ѡ�����ݿ� bookstore : ' . mysql_error());
   
    //ִ��DQL����ؽ����$result
    $result=mysql_query("select bookId, bookName, author, publisher,price,detail from books");           
    echo '<table align="center" width="80%" border="1">';   //��HTML���������
    echo '<caption><h1>ͼ����Ϣ��</h1></caption>';      //���������
    echo '<th>���</th><th>ͼ����</th><th>����</th><th>������</th><th>�۸�</th><th>����</th>';
    while($row=mysql_fetch_row($result)){               //ѭ���ӽ�����б���ÿ����¼��������
	    echo '<tr>';                                  //ÿ����һ����¼���һ���б��
	    foreach($row as $data){                        //ѭ������һ�����ݼ�¼�е�ÿ���ֶ�
	    	      echo '<td>'.$data.'</td>';                 //�Ա����ʽ���ÿ���ֶ�
	    }
	    echo '</tr>';                                  //���ÿ�еĽ������
    }
    echo '</table>';
    mysql_free_result($result);                          //�ͷŲ�ѯ�Ľ������Դ
    mysql_close($link);                                //�ر���MySQL����������������
?>
