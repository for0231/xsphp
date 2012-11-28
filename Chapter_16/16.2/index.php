<?php
	require "MyTpl_class.php";                                      //包含模板引擎类所在文件          
	
	$mysqli=new mysqli("localhost", "mysql_user", "mysql_pwd", "mydb");  //建立mysqli对象
     	//执行SQL语句从用户表User中查询所有记录，保存在$User数组中  
	$mysqli->query("set names gb2312"); 
	if($result=$mysqli->query("SELECT id, name, sex, age, email FROM User")){
		while($row=$result->fetch_assoc()){                //循环从结果集中遍历每行数据
			$users[]=$row;                             //取出所有行都保存在同一个数组中
		}
		$rowNum=$result->num_rows;                    //将获取的数据行数保存在变量中
		$result->close();                                 //关闭结果集
	}
	$mysqli->close();                                    //关闭与数据库的连接

	$tpl=new MyTpl("./templates/", "./templates_c");          //创建模板引擎类对象并对属性初使化
	$tpl->assign("title", "自定义模板引擎示例");             //分配标题变量给头部模板header.tpl
	$tpl->assign("tableName", "用户信息表");               //分配表名变量给主模板
	$tpl->assign("author", "高洛峰");                       //分配作者变量给尾部模板footer.tpl
	$tpl->assign("users", $users);                          //分配存有表User的二维数组给主模板
	$tpl->assign("rowNum", $rowNum);                    //分配所取的数据行数变量给主模板
	$tpl->display("main.tpl");                             //包括替换模板中的变量输出模板页面
?>
