<?php
	session_start();                              	   	//����Session
	$_SESSION["username"]="admin";              		//ע��һ��Session�����������û���
	echo "Session ID: ".session_id()."<br>";           	//�ڵ�ǰҳ�����Session ID
?>
<a href="test2.php?<?php echo SID ?>">ͨ��URL����Session ID</a>   <!-- ��URL�и���SID --> 

