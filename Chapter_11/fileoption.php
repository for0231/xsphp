<?php
	if(copy('./file1.txt', '../data/file2.txt')) {              //复制文件示例
		echo "文件复制成功！";
	}else{
		echo "文件复制失败！";
	}

	$filename="file1.txt";                           //删除文件示例
	if(file_exists($filename)){
		if(unlink($filename)) {
			echo "文件删除成功！";
		}else{
			echo "文件删除失败！";
		}
	}else{
		echo "目标文件不存在";
	}

	if(rename('./demo.php', './demo.html')) {           //重命名文件示例
		echo "文件重命名成功！";
	}else{
		echo "文件重命名失败";
	}

	$fp=fopen('./data.txt', "r+") or die('文件打开失败');  //截取文件示例
	if(ftruncate($fp, 1024)) {
		echo "文件截取成功！";
	}else{
		echo "文件截取失败！";
	}
?>
