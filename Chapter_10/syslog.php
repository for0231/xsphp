<?php
	define_syslog_variables();
	openlog("PHP5", LOG_PID , LOG_USER);
	syslog(LOG_WARNING, "警告报告向syslog中发送的演示，警告时间：".date("Y/m/d H:i:s"));
	closelog();
?>
