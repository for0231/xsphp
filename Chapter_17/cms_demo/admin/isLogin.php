<?php
	/*==================================================================*/
	/*		文件名:isLogin.php                                  */
	/*		概要: 判断用户是否登录的全局脚本.      	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-30                                */
	/*		最后修改时间:2009-05-30                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	if(!$_SESSION["isLogin"] || $_SESSION["uid"]!=1){
		header("Location:login.php");
	} 
?>
