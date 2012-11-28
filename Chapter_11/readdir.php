<?php
	$num=0;                          	//用来统计子目录和文件的个数
	$dirname='phpMyAdmin';            	//定义一个变量，保存当前目录下用来遍历的一个目录名
	$dir_handle=opendir($dirname);       	//用opendir打开目录

     	//将遍历的目录和文件名使用表格格式输出
	echo '<table border="0" align="center" width="600" cellspacing="0" cellpadding="0">';
	echo '<caption><h2>目录'.$dirname.'下面的内容</h2></caption>';     //输出表格标题
	echo '<tr align="left" bgcolor="#cccccc">';                        //输出表格的字段名
	echo '<th>文件名</th><th>文件大小</th><th>文件类型</th><th>修改时间</th></tr>';
	while($file=readdir($dir_handle)) {    		//使用readdir循环读取目录里的内容
		$dirFile=$dirname."/".$file;      	//将目录下的文件和当前目录连接起来，才能在程序中使用
		if($num++%2==0)             		//隔行一种颜色，同时也将计数器num累加
			$bgcolor='#ffffff';         	//单行为白色背景
		else
			$bgcolor='#cccccc';        	//双行为灰色背景
		echo '<tr bgcolor='.$bgcolor.'>';            	//输出行开始标记，并使用背景色
		echo '<td>'.$file.'</td>';                   	//显示文件名
         	echo '<td>'.filesize($dirFile).'</td>';         //显示文件大小
         	echo '<td>'.filetype($dirFile).'</td>';         //显示文件类型
         	echo '<td>'.date("Y/n/t",filemtime($dirFile)).'</td>';       //格式化显示文件修改时间
         	echo '</tr>';
	}
	echo '</table>';                                     //关闭表格标记
	closedir($dir_handle);                               //关闭文件操作句柄

	echo '在<b>'.$dirname.'</b>目录下的子目录和文件共有<b>'.$num.'</b>个';
?>
