<?php
    $link=mysql_connect("localhost", "mysql_user", "mysql_password") or die("����ʧ��: ".mysql_error());
    echo "��MySQL���������������ӳɹ�:<br>";          //���ӳɹ�������������ʾ��Ϣ
    echo mysql_get_client_info();                          //�ͻ���API������İ汾��Ϣ
    echo mysql_get_host_info();                           //��MySQL����������������
    echo mysql_get_proto_info();                          //ͨ��Э��İ汾��Ϣ
    echo mysql_get_server_info();                         //MySQL�������İ汾��Ϣ
    echo mysql_client_encoding();                         //�ͻ���ʹ�õ�Ĭ���ַ���
    echo mysql_stat();                                   //MySQL�������ĵ�ǰ����״̬
    mysql_close($link);                                  //�ر���MySQL����������������
?>

