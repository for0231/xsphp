<?php
	//��ȡLinuxϵͳ���ļ�����
	echo filetype('/etc/passwd');      //���file��/etc/passwdΪ��ͨ�ļ�
	echo filetype('/etc/grub.conf');    //���link��/etc/grub.confΪ�����ļ������ӵ�/boot/grub/grub.conf
	echo filetype('/etc/');            //���dir��/etc/Ϊһ��Ŀ¼�����ļ���
	echo filetype('/dev/sda1');        //���block��/dev/sda1Ϊ���豸������һ������
	echo filetype('/dev/tty01');       //���char��Ϊ�ַ��豸������һ���ַ��ն�

	//��ȡWindowsϵͳ���ļ�����
	echo filetype("C:\\WINDOWS\\php.ini");     //���file��C:\WINDOWS\php.iniΪһ����ͨ�ļ�
	echo filetype("C:\\WINDOWS");            //���dir��C:\WINDOWSΪһ���ļ��У�Ŀ¼��
?>
