<?php
	session_start();            //开启Session，并创建一个新的SessionID保存在客户端的Cookie中
	require "connect.inc.php";                        //包含连接数据库的文件connect.inc.php
	if($_GET["action"]=="login") {                   //如果用户单击提交表单的事件则进行验证
		$username=$_POST["username"];            //从表单中获取用户输入的登录名
		$userpwd=md5($_POST["password"]);        //从表单中获取用户输入的登录密码
          	//使用从表单中接收到的用户名和密码，作为在数据库用户表user中查询的条件
		$sql="select * from user where username='{$username}' and userpwd='{$userpwd}'";
		$result=$mysqli->query($sql);              //向数据库发送SQL查询语句
		if($result->num_rows > 0){                //如果能从user表中获取到数据记录则登录成功
			$row=$result->fetch_assoc();          //获取数据库表user中对应登录用户的用户ID
			$_SESSION["username"]=$username;   //将用户登录的名称变量注册到Session中
			$_SESSION["userid"]=$row["id"];     //将登录用户的ID注册到Session中
			$_SESSION["islogin"]=1;            //注册一个用来判断登录成功的Session变量
			header("Location:index.php");         //将脚本执行转向邮件系统的首页
		}else{                                 //如果用户名或密码无效则登录失败
			echo '<font color="red">用户名或密码错误！</font>';      
		}	
	}
?>
<html>
	<head><title>邮件系统登录</title></head>
	<body>
		<p>欢迎光临邮件系统</p>
		<p>Session ID:<?php echo session_id(); ?></p>     <!-- 输出Session ID -->

		<table width="300" border="0" align="center" cellspacing="0" cellpadding="5">
             		<!-- 以下声明一个用户登录表单，如果有需要可以使用JavaScript验证输入不为空 -->
			<form action="maillogin.php?action=login" method="post">
				<tr>
					<td width="30%" align="right">用户名：</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td width="30%" align="right">密码：</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<input type="submit" value="登录">
						<input type="reset" value="重置">
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>
