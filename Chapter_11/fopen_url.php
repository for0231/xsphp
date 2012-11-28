<?php
	$file = fopen ("http://www.lampbrother.com/", "r") or die("打开远程文件失败！！");  //打开远程文件

	while (!feof ($file)) {              //循环从文件中读取内容
    		$line = fgets ($file, 1024);     //每读取一行
         //如果找到远程文件中的标题标记则取出标题，并退出循环，不在读取文件
   		if (preg_match("/<title>(.*)<\/title>/", $line, $out)) {    //使用正则匹配标题标记
     			$title = $out[1];                        //将标题标记中的标题字符取出
      			break;                                //退出循环，结束远程文件读取
   		}
	}
	fclose($file);                  //关闭文件资源
	echo $title;                   //输出获取到的远程网页的标题
?>
