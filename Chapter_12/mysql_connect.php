<?php
    $link=mysql_connect("localhost", "mysql_user", "mysql_password") or die("连接失败: ".mysql_error());
    echo "与MySQL服务器建立的连接成功:<br>";          //连接成功则会输出这条提示信息
    echo mysql_get_client_info();                          //客户端API函数库的版本信息
    echo mysql_get_host_info();                           //与MySQL服务器的连接类型
    echo mysql_get_proto_info();                          //通信协议的版本信息
    echo mysql_get_server_info();                         //MySQL服务器的版本信息
    echo mysql_client_encoding();                         //客户端使用的默认字符集
    echo mysql_stat();                                   //MySQL服务器的当前工作状态
    mysql_close($link);                                  //关闭与MySQL服务器建立的连接
?>

