<?php
	// 创建画布，返回一个资源类型的变量$image.并在内存中开辟一块临时区域
	$image = imagecreatetruecolor(100, 100);                     //创建画布的大小为100x100
	
	// 设置图像中所需的颜色，相当于在画画时准备的染料盒
	$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);        //为图像分配颜色为白色
	$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);        //为图像分配颜色为灰色
	$darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);      //为图像分配颜色为暗灰色
	$navy = imagecolorallocate($image, 0x00, 0x00, 0x80);         //为图像分配颜色为深蓝色
	$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);     //为图像分配颜色为暗深蓝色
	$red = imagecolorallocate($image, 0xFF, 0x00, 0x00);          //为图像分配颜色为红色
	$darkred = imagecolorallocate($image, 0x90, 0x00, 0x00);      //为图像分配颜色为暗红色

	imagefill($image, 0, 0, $white);                            //为画布背景添充背景颜色
	// 动态制做3D 效果
	for ($i = 60; $i > 50; $i--) {                               //循环10次画出立体效果
	  imagefilledarc($image, 50, $i, 100, 50, -160, 40, $darknavy, IMG_ARC_PIE); //画一椭圆弧且填充
	  imagefilledarc($image, 50, $i, 100, 50, 40, 75 , $darkgray, IMG_ARC_PIE);  //画一椭圆弧且填充
	  imagefilledarc($image, 50, $i, 100, 50, 75, 200 , $darkred, IMG_ARC_PIE);  //画一椭圆弧且填充
	}

	imagefilledarc($image, 50, 50, 100, 50, -160, 40, $navy, IMG_ARC_PIE);      //画一椭圆弧且填充
	imagefilledarc($image, 50, 50, 100, 50, 40, 75 , $gray, IMG_ARC_PIE);        //画一椭圆弧且填充
	imagefilledarc($image, 50, 50, 100, 50, 75, 200 , $red, IMG_ARC_PIE);        //画一椭圆弧且填充
	
	imageString($image, 1, 15, 55, '34.7%', $white);             //水平地画一行字符串
	imageString($image, 1, 45, 35, '55.5%', $white);             //水平地画一行字符串

	// 向浏览器中输出一个GIF格式的图片
	header('Content-type: image/png');	//使用头函数告诉浏览器以图像方式处理以下输出
	imagepng($image);                       //向浏览器中输出动态的
	imagedestroy($image);                   //销毁图像释放资源
?>

