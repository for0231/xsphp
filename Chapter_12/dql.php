<?php
    $link=mysql_connect("localhost", "mysql_user", "mysql_pass") or die("连接失败: ".mysql_error());
    mysql_select_db('bookstore') or die ('不能选定数据库 bookstore : ' . mysql_error());
   
    //执行DQL命令返回结果集$result
    $result=mysql_query("select bookId, bookName, author, publisher,price,detail from books");           
    echo '<table align="center" width="80%" border="1">';   //以HTML表格输出结果
    echo '<caption><h1>图书信息表</h1></caption>';      //输出表格标题
    echo '<th>编号</th><th>图书名</th><th>作者</th><th>出版社</th><th>价格</th><th>介绍</th>';
    while($row=mysql_fetch_row($result)){               //循环从结果集中遍历每条记录到数组中
	    echo '<tr>';                                  //每遍历一条记录输出一个行标记
	    foreach($row as $data){                        //循环遍历一条数据记录中的每个字段
	    	      echo '<td>'.$data.'</td>';                 //以表格形式输出每个字段
	    }
	    echo '</tr>';                                  //输出每行的结束标记
    }
    echo '</table>';
    mysql_free_result($result);                          //释放查询的结果集资源
    mysql_close($link);                                //关闭与MySQL服务器建立的连接
?>
