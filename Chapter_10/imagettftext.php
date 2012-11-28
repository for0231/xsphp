<?php
	$im = imagecreatetruecolor(400, 30);              //创建400x300像素大小的画布
	$white = imagecolorallocate($im, 255, 255, 255);    //创建白色
	$grey = imagecolorallocate($im, 128, 128, 128);     //创建灰色
	$black = imagecolorallocate($im, 0, 0, 0);          //创建黑色
	imagefilledrectangle($im, 0, 0, 399, 29, $white);     //输出一个使用白色填充的矩形作为背景
 
    	//如果有中文输出，需要将其转码，转换为UTF-8的字符串才可以直接传递
	$text=iconv("GB2312", "UTF-8", "LAMP兄弟连－－无兄弟，不编程！");
	$font = 'simsun.ttc';          //指定字体，将系统中与simsum.ttc对应的字体复制到当前目录下
	imagettftext($im, 20, 0, 12, 21, $grey, $font, $text);   //输出一个灰色的字符串作为阴影
	imagettftext($im, 20, 0, 10, 20, $black, $font, $text);  //在阴影之上输出一个黑色的字符串

	header("Content-type: image/png");               //通知浏览器将输出格式为PNG的图像
	imagepng($im);                               //向浏览器中输出PNG格式的图像
	imagedestroy($im);                            //销毁资源，释放内存占用的空间
?>
