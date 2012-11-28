<html>
	<head><title>文件上传</title></head>
	<body>
		<form action="mul_upload.php"  method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			选择文件1：<input type="file" name="myfile[]"><br>
			选择文件2：<input type="file" name="myfile[]"><br>
			选择文件3：<input type="file" name="myfile[]"><br>
			<input type="submit" value="上传文件">
		</form>
	</body>
</html>
