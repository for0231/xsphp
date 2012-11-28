<?php
	$mysqli = new mysqli("localhost", "mysql_user", "mysql_pwd", "demo");     //连接MySQL数据库
	if (mysqli_connect_errno()) {                                         //检查连接错误
 		printf("连接失败: %s<br>", mysqli_connect_error());
		exit();
	} 

	$success=TRUE;                                                  //设置事务执行状态
	$price=8000;                                                      //转账的数目

	$mysqli->autocommit(0);                     //暂时关闭MySQL事务机制的自动提交模式
     	//执行从userA记录中减少cash的值，返回1表示成功，否则执行失败
	$result=$mysqli->query("UPDATE account SET cash=cash-$price WHERE name='userA'");
	//如果SQL语句执行失败或没有改变记录中的值，将$sucess的值设置为FALSE
	if(!$result or $mysqli->affected_rows !=1) {
		$success=FALSE;                      //设置$sucess的值为FALSE
	}
    	 //执行向userB记录中添加cash的值，返回1表示成功，否则执行失败
	$result=$mysqli->query("UPDATE account SET cash=cash+$price WHERE name='userB'");
	//如果SQL语句执行失败或没有改变记录中的值，将$sucess的值设置为FALSE
	if(!$result or $mysqli->affected_rows !=1) {
		$success=FALSE;                      //设置$sucess的值为FALSE
	}

	if($success){                               //如果$success的值为TRUE
		$mysqli->commit();                     //事务提交给数据库
		echo "转账成功!";                      //输出成功的提示信息
	}else{                                     //如果$success的值为FLASE，事务中有错误
		$mysqli->rollback();                     //回滚当前的事务，所有SQL命令都被撤销
		echo "转账失败!";                       //输出不成功的提示信息
	}
	$mysqli->autocommit(1);                      //开启MySQL事务机制的自动提交模式

	$mysqli->close();                             //关闭与MySQL数据库的连接
?>
