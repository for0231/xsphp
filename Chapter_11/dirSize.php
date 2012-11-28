<?php
	function dirSize($directory) {     	//自定义一个函数dirSize()，统计传入参数的目录大小
		$dir_size=0;              	//整型变量初值为0，用来累加各个文件大小从而计算目录大小

		if($dir_handle=@opendir($directory)) {           		//打开目录，并判断是否能成功打开
			while($filename=readdir($dir_handle)) {      		//循环遍历目录下的所有文件
				if($filename!="." && $filename!="..") {  	//一定要排除两个特殊的目录
				    $subFile=$directory."/".$filename;   	//将目录下的子文件和当前目录相连
					if(is_dir($subFile))               	//如果为目录
						$dir_size+=dirSize($subFile);   //递归地调用自身函数，求子目录的大小
					if(is_file($subFile))               	//如果是文件
						$dir_size+=filesize($subFile);  //求出文件的大小并累加
				}
			}
			closedir($dir_handle);                    //关闭文件资源
			return $dir_size;                         //返回计算后的目录大小
		}
	}

	$dir_size=dirSize("phpMyAdmin");         	//调用该函数计算目录大小，返回目录大小的字节数
	echo round($dir_size/pow(1024,1),2)."KB";   	//将获取的目录字节数转换为“KB”单位并输出
?>

