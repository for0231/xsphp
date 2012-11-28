<?php
	session_start();                    //使用Cookie中现有的SessionID返回已经存在的Session
	if($_SESSION["islogin"]){                         //判断Session中的登录变量是否为真 
		require "connect.inc.php";                     //包含连接数据库的文件
		echo "<p>当前用户为：<b> ".$_SESSION["username"]."</b>,&nbsp;";  //输出登录用户名
		echo "<a href='maillogout.php'>退出</a></p>";   //输出为用户提供的退出操作链接
	}else{                                          //如果用户没有登录则没有权限访问该页
		header("Location:maillogin.php");              //转向登录页面，要求用户登录
		exit;		//退出程序，不能继续向下执行
	}
?>
<html>
	<head><title>邮件系统</title></head>
	<body>
		<?php
			$userid=$_SESSION["userid"];	       //从Session变量中获取保存的用户ID
              		//通过Session中传递的user id，作为mail表的查询条件，获取这个用户的邮件列表
			$result=$mysqli->query("select * from mail where uid='{$userid}'");  //发送查询语句
			$mail_num=$result->num_rows;        //从结果集中获取邮件的个数
			$mails=array();                      //声明一个空数组，用来存放邮件列表
			while($row=$result->fetch_assoc()){    //遍历结果集获取登录用户的所有邮件
				$mails[]=$row;                 //将每次遍历的邮件都追加到$mails数组中
			}
		?>
		<p>你的信箱中有<b><?php echo $mail_num; ?></b>邮件</p>
		<table border="0" cellspacing="0" cellpadding="0" width="380">
			<tr><th>编号</th><th>邮件标题</th><th>接收时间</th></tr>
			<?php
				foreach($mails as $mail) {         //遍历邮件列表数组，登录用户的所有邮件
					echo '<tr align="center">';                            
					echo '<td>'.$mail["id"].'</td>';                       //输出邮件编号
					echo '<td>'.$mail["mailtitle"].'</td>';                  //输出邮件标题
					echo '<td>'.date("Y-m-d H:i:s",$mail["maildt"]).'</td>';   //输出邮件接收日期
					echo '</tr>';
				}
			?>
		</table>
	</body>
</html>
