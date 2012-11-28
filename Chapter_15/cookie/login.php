<?php
     	//声明一个删除Cookie的函数，调用时清除在客户端设置的所有Cookie
	function clearCookies() {                    
		setCookie('username', '', time()-3600);        //删除Cookie中的标识符为username的变量
		setCookie('isLogin', '', time()-3600);          //删除Cookie中的标识符为isLogin的变量
	}

	if($_GET["action"]=="login") {                	//判断用户是否执行的是登录操作
		clearCookies();                         //调用时清除在客户端先前设置的所有Cookie
         	//检查用户是否为admin，并且密码是否等于123456
		if($_POST["username"]=="admin" && $_POST["password"]=="123456")	{
              		//向Cookie中设置标识符为username，值是表单中提交的，期限为一周
			setCookie('username', $_POST["username"], time()+60*60*24*7);  
              		//向Cookie中设置标识符为isLogin，用来在其他页面检查用户是否登录
			setCookie('isLogin', '1', time()+60*60*24*7);
			header("Location:index.php");       //如果Cookie设置成功则转向网站首页
		}else{
			die("用户名或密码错误！");
		}
	}else if($_GET["action"]=="logout"){          	    //判断用户是否执行的是退出操作
		clearCookies();                        	    //调用时清除在客户端设置的所有Cookie
	}
?>
<html>
	<head><title>用户登录</title></head>
	<body>
         <!--  以HTML形式输出用户登录表单，提交给本页面 -->
		<table border="1" width="300" align="center" cellpadding="5" cellspacing="0">
			<caption><h1>用户登录</h1></caption>
			<form action="login.php?action=login" method="post">
				<tr>
					<th>用户名</th> 
					<td><input type="text" name="username" size=25></td>
				</tr>
				<tr>
					<th>密&nbsp;&nbsp;码</th> 
					<td><input type="password" name="password" size=25></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="登录">
						<input type="reset" value="重置">
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>
