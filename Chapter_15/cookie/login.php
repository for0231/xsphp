<?php
     	//����һ��ɾ��Cookie�ĺ���������ʱ����ڿͻ������õ�����Cookie
	function clearCookies() {                    
		setCookie('username', '', time()-3600);        //ɾ��Cookie�еı�ʶ��Ϊusername�ı���
		setCookie('isLogin', '', time()-3600);          //ɾ��Cookie�еı�ʶ��ΪisLogin�ı���
	}

	if($_GET["action"]=="login") {                	//�ж��û��Ƿ�ִ�е��ǵ�¼����
		clearCookies();                         //����ʱ����ڿͻ�����ǰ���õ�����Cookie
         	//����û��Ƿ�Ϊadmin�����������Ƿ����123456
		if($_POST["username"]=="admin" && $_POST["password"]=="123456")	{
              		//��Cookie�����ñ�ʶ��Ϊusername��ֵ�Ǳ����ύ�ģ�����Ϊһ��
			setCookie('username', $_POST["username"], time()+60*60*24*7);  
              		//��Cookie�����ñ�ʶ��ΪisLogin������������ҳ�����û��Ƿ��¼
			setCookie('isLogin', '1', time()+60*60*24*7);
			header("Location:index.php");       //���Cookie���óɹ���ת����վ��ҳ
		}else{
			die("�û������������");
		}
	}else if($_GET["action"]=="logout"){          	    //�ж��û��Ƿ�ִ�е����˳�����
		clearCookies();                        	    //����ʱ����ڿͻ������õ�����Cookie
	}
?>
<html>
	<head><title>�û���¼</title></head>
	<body>
         <!--  ��HTML��ʽ����û���¼�����ύ����ҳ�� -->
		<table border="1" width="300" align="center" cellpadding="5" cellspacing="0">
			<caption><h1>�û���¼</h1></caption>
			<form action="login.php?action=login" method="post">
				<tr>
					<th>�û���</th> 
					<td><input type="text" name="username" size=25></td>
				</tr>
				<tr>
					<th>��&nbsp;&nbsp;��</th> 
					<td><input type="password" name="password" size=25></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="��¼">
						<input type="reset" value="����">
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>
