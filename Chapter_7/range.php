<?php
	$number = range(0,5);  	   //使用range()函数声明元素值为0-5的数组
	print_r ($number);         //获得的数组输出Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 ) 

	$number = range(0,50,10);  //使用range()函数声明元素值为0-50的数组，每个元素之间的步长为10
	print_r ($number);         //输出Array ( [0] => 0 [1] => 10 [2] => 20 [3] => 30 [4] => 40 [5] => 50 ) 

	$letter = range("a","d");  //还可以使用range()函数声明元素连续的字母数组，声明字母a-d的数组
	print_r ($letter);         //获得的数组输出Array ( [0] => a [1] => b [2] => c [3] => d ) 
?>

