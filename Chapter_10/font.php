<?php
	$im = imagecreate(150,150);                          	 //创建一个150*150的画布
	$bg = imagecolorallocate($im, 255, 255, 255);            //设置画布的背景颜色为白色
	$black = imagecolorallocate($im, 0, 0, 0);               //设置一个颜色变量为黑色
	$string="LAMPBrother";                             	//声明一个用于在图像中输出的字符串
	imageString($im, 3, 28, 70, $string, $black);              //水平将字符串$string输出到图像中
	imageStringUp($im, 3, 59, 115, $string, $black);          //垂直由下而上输出$string到图像中
	for($i=0,$j=strlen($string); $i<strlen($string); $i++,$j--){   //使用循环单个字符输出到图像中
		imageChar($im, 3, 10*($i+1), 10*($i+2), $string[$i], $black);    //向下倾斜输出每个字符
		imageCharUp($im, 3, 10*($i+1), 10*($j+2), $string[$i], $black);  //向上倾斜输出每个字符
	}
	header('Content-type: image/png');                     //设置输出的头部标识符
	imagepng($im);                                    //输出PNG格式的图片
?>
