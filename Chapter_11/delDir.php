<?php
	function delDir($directory) {         		//自定义函数递归的删除整个目录
		if(file_exists($directory)) {      	//判断目录是否存在，如果不存在rmdir()函数会出错
			if($dir_handle=@opendir($directory)) {      	//打开目录返回目录资源，并判断是否成功
				while($filename=readdir($dir_handle)) {  //遍历目录，读出目录中的文件或文件夹
					if($filename!="." && $filename!="..") {   	//一定要排除两个特殊的目录
						$subFile=$directory."/".$filename;   	//将目录下的文件和当前目录相连
						if(is_dir($subFile))                	//如果是目录条件则成立
							delDir($subFile);             	//递归调用自己删除子目录
						if(is_file($subFile))                	//如果是文件条件则成立
							unlink($subFile);             	//直接删除这个文件
					}
				}
				closedir($dir_handle);                       	//关闭目录资源
				rmdir($directory);                          	//删除空目录
			}
		}
	}
	delDir("phpMyAdmin");  //调用delDir()函数，将程序所在目录中的“phpMyAdmin”文件夹删除
?>
