<?php
	/*==================================================================*/
	/*		文件名:imgcode.php                                  */
	/*		概要: 验证码的功能处理页面.       		    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含通用的初使化脚本文件
	require "cmsinit.inc.php";
	//创建验证码对象
	$image = new ValidationCode(60,16,4);    
	//向页面中动态发送验证码图片
	$image->showImage();
	//将验证码字符添加到Session中保存，用于和用户输入匹配
	$_SESSION['validationcode'] =$image->getCheckCode(); 
?>

