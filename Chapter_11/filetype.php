<?php
	//获取Linux系统下文件类型
	echo filetype('/etc/passwd');      //输出file，/etc/passwd为普通文件
	echo filetype('/etc/grub.conf');    //输出link，/etc/grub.conf为链接文件，链接到/boot/grub/grub.conf
	echo filetype('/etc/');            //输出dir，/etc/为一个目录，即文件夹
	echo filetype('/dev/sda1');        //输出block，/dev/sda1为块设备，它是一个分区
	echo filetype('/dev/tty01');       //输出char，为字符设备，它是一个字符终端

	//获取Windows系统下文件类型
	echo filetype("C:\\WINDOWS\\php.ini");     //输出file，C:\WINDOWS\php.ini为一个普通文件
	echo filetype("C:\\WINDOWS");            //输出dir，C:\WINDOWS为一个文件夹（目录）
?>
