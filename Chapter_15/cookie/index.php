<?php
	if($_COOKIE["isLogin"]){                               		//�ж��û��Ƿ�ͨ���������֤
		echo '���ã�'.$_COOKIE["username"].',&nbsp;&nbsp;';     //��Cookie�л�ȡ��¼�û������
		echo '<a href="login.php?action=logout">�˳�</a>';      //Ϊ�û��ṩһ���˳��Ĳ�������
	}else{                                                		//����û�û��ͨ�������֤
		header("Location:login.php");                           //ҳ����ת����¼ҳ��
		exit;                                             	//��ֹ�������ִ��
	}
?>
<html>
	<head><title>��վ��ҳ��</title></head>                 	<!--  ����ҳ����� -->
	<body>	
		<p>������ʾ��ҳ����������</p>                 	<!--  ����ҳ����� -->
	</body>
</html>
