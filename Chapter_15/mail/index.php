<?php
	session_start();                    //ʹ��Cookie�����е�SessionID�����Ѿ����ڵ�Session
	if($_SESSION["islogin"]){                         //�ж�Session�еĵ�¼�����Ƿ�Ϊ�� 
		require "connect.inc.php";                     //�����������ݿ���ļ�
		echo "<p>��ǰ�û�Ϊ��<b> ".$_SESSION["username"]."</b>,&nbsp;";  //�����¼�û���
		echo "<a href='maillogout.php'>�˳�</a></p>";   //���Ϊ�û��ṩ���˳���������
	}else{                                          //����û�û�е�¼��û��Ȩ�޷��ʸ�ҳ
		header("Location:maillogin.php");              //ת���¼ҳ�棬Ҫ���û���¼
		exit;		//�˳����򣬲��ܼ�������ִ��
	}
?>
<html>
	<head><title>�ʼ�ϵͳ</title></head>
	<body>
		<?php
			$userid=$_SESSION["userid"];	       //��Session�����л�ȡ������û�ID
              		//ͨ��Session�д��ݵ�user id����Ϊmail��Ĳ�ѯ��������ȡ����û����ʼ��б�
			$result=$mysqli->query("select * from mail where uid='{$userid}'");  //���Ͳ�ѯ���
			$mail_num=$result->num_rows;        //�ӽ�����л�ȡ�ʼ��ĸ���
			$mails=array();                      //����һ�������飬��������ʼ��б�
			while($row=$result->fetch_assoc()){    //�����������ȡ��¼�û��������ʼ�
				$mails[]=$row;                 //��ÿ�α������ʼ���׷�ӵ�$mails������
			}
		?>
		<p>�����������<b><?php echo $mail_num; ?></b>�ʼ�</p>
		<table border="0" cellspacing="0" cellpadding="0" width="380">
			<tr><th>���</th><th>�ʼ�����</th><th>����ʱ��</th></tr>
			<?php
				foreach($mails as $mail) {         //�����ʼ��б����飬��¼�û��������ʼ�
					echo '<tr align="center">';                            
					echo '<td>'.$mail["id"].'</td>';                       //����ʼ����
					echo '<td>'.$mail["mailtitle"].'</td>';                  //����ʼ�����
					echo '<td>'.date("Y-m-d H:i:s",$mail["maildt"]).'</td>';   //����ʼ���������
					echo '</tr>';
				}
			?>
		</table>
	</body>
</html>
