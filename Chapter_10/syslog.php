<?php
	define_syslog_variables();
	openlog("PHP5", LOG_PID , LOG_USER);
	syslog(LOG_WARNING, "���汨����syslog�з��͵���ʾ������ʱ�䣺".date("Y/m/d H:i:s"));
	closelog();
?>
