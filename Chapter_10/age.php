<?php
 	$year = 1981;                                 //从表单中接收用户提交的出生日期中的年份
 	$month = 11;                                 //从表单中接收用户提交的出生日期中的月份
 	$day = 05;                                   //从表单中接收用户提交的出生日期中的天
	$birthday = mktime (0, 0, 0, $month, $day, $year);   //将出生日期转变为UNIX时间戳
	$nowdate = time();                            //调用time()函数获取当前时间的UNIX时间戳
	$ageunix = $nowdate - $birthday;                //两个时间戳相减获取用户年龄的UNIX时间戳
	$age = floor($ageunix / (60*60*24*365));         //将UNIX时间戳除以一年的秒数获取用户年龄
	echo "年龄：$age";                           //输出用户的年龄，根据计算得到结果27
?>
