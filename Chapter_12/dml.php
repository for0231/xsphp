<?php
    $link=mysql_connect("localhost", "mysql_user", "mysql_pass") or die("连接失败: ".mysql_error());
    //为后续的mysql扩展函数的操作选定一个默认的数据库，它相当于SQL命令use bookstore
    mysql_select_db('bookstore') or die ('不能选定数据库 bookstore : ' . mysql_error());
   
    //将插入3条的INSERT语句声明为一个字符串 
    $insert="INSERT INTO books(bookName, publisher, author, price, detail) VALUES
	    ('PHP', '电子工业', '高某某', '80.00', '与PHP相关的图书'),
	    ('JSP', '人民邮电', '洛某某', '50.00', '与JSP相关的图书'),
	    ('ASP', '电子工业', '峰某某', '30.00', '与ASP相关的图书')";

    //使用mysql_query()函数发送INSERT语句，如果成功返回TRUE，失败则返回FALSE
    $result=mysql_query($insert);          
    if($result && mysql_affected_rows()>0){
	    echo "数据记录插入成功，最后一条插入的数据记录ID为：".mysql_insert_id()."<br>";
    }else{
	    echo "插入记录失败，错误号：".mysql_errno()."，错误原因：".mysql_error()."<br>";
     }

    //执行UPDATE命令修改表books中的一条记录，将图书名为PHP的记录价格修改为79.90
    $result1=mysql_query("UPDATE books SET price='79.9' WHERE bookName='PHP'");
    if($result1 && mysql_affected_rows()>0){
	    echo "数据记录修改成功<br>";
    }else{
	    echo "修改数据失败，错误号：".mysql_errno()."，错误原因：".mysql_error()."<br>";
     }

    //执行DELETE命令删除表books中图书名为JSP的记录
    $result2=mysql_query("DELETE FROM books WHERE bookName='JSP'");
    if($result2 && mysql_affected_rows()>0){
	    echo "数据记录删除成功<br>";
    }else{
	    echo "删除数据失败，错误号：".mysql_errno()."，错误原因：".mysql_error()."<br>";
    }
    mysql_close($link);                               //关闭与MySQL服务器建立的连接
?>

