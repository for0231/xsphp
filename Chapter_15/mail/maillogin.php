<?php
	session_start();            //����Session��������һ���µ�SessionID�����ڿͻ��˵�Cookie��
	require "connect.inc.php";                        //�����������ݿ���ļ�connect.inc.php
	if($_GET["action"]=="login") {                   //����û������ύ�����¼��������֤
		$username=$_POST["username"];            //�ӱ��л�ȡ�û�����ĵ�¼��
		$userpwd=md5($_POST["password"]);        //�ӱ��л�ȡ�û�����ĵ�¼����
          	//ʹ�ôӱ��н��յ����û��������룬��Ϊ�����ݿ��û���user�в�ѯ������
		$sql="select * from user where username='{$username}' and userpwd='{$userpwd}'";
		$result=$mysqli->query($sql);              //�����ݿⷢ��SQL��ѯ���
		if($result->num_rows > 0){                //����ܴ�user���л�ȡ�����ݼ�¼���¼�ɹ�
			$row=$result->fetch_assoc();          //��ȡ���ݿ��user�ж�Ӧ��¼�û����û�ID
			$_SESSION["username"]=$username;   //���û���¼�����Ʊ���ע�ᵽSession��
			$_SESSION["userid"]=$row["id"];     //����¼�û���IDע�ᵽSession��
			$_SESSION["islogin"]=1;            //ע��һ�������жϵ�¼�ɹ���Session����
			header("Location:index.php");         //���ű�ִ��ת���ʼ�ϵͳ����ҳ
		}else{                                 //����û�����������Ч���¼ʧ��
			echo '<font color="red">�û������������</font>';      
		}	
	}
?>
<html>
	<head><title>�ʼ�ϵͳ��¼</title></head>
	<body>
		<p>��ӭ�����ʼ�ϵͳ</p>
		<p>Session ID:<?php echo session_id(); ?></p>     <!-- ���Session ID -->

		<table width="300" border="0" align="center" cellspacing="0" cellpadding="5">
             		<!-- ��������һ���û���¼�����������Ҫ����ʹ��JavaScript��֤���벻Ϊ�� -->
			<form action="maillogin.php?action=login" method="post">
				<tr>
					<td width="30%" align="right">�û�����</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td width="30%" align="right">���룺</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td colspan=2 align="center">
						<input type="submit" value="��¼">
						<input type="reset" value="����">
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>
