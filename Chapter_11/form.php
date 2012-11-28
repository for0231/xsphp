<html>
	<head><title>文件上传</title></head>
	<body>
		<form action="upload.php"  method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			选择文件：<input type="file" name="myfile">
			<input type="submit" value="上传文件">
		</form>
	</body>
</html>
