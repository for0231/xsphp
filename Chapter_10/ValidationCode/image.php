<?php
	session_start();
	if(isset($_POST['submit'])){
		if(trim($_POST["test"])==$_SESSION['validationcode']){
			echo '�ύ�ɹ�<br>';
		}else{ 
			echo '<font color="red">��֤��������󣡣�</font><br>';
		}
	}
?>
<html>
	<head>
		<title>Image</title>
		<meta http-equiv="content-type" content="text/html;charset=gb2312">
		<script>
			function newgdcode(obj,url) {
				//���洫��һ�����������������IE7�ͻ���£���ˢ��ͼƬ
				obj.src = url+ '?nowtime=' + new Date().getTime();
				
			}
		</script>
	</head>
	<body>
		<img src="imgcode.php" alt="�����������һ��" style="cursor: pointer;" onclick="javascript: newgdcode(this,this.src);" />
		<form method="POST" action="image.php">
			<input type="text" name="test"><br>
			<input type="submit" name="submit" value="�ύ">
		</form>
	</body>
</html>

