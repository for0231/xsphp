<?php
    	 //第一步：开启Session并初使化
	session_start();       
     	//第二步：删除所有Session的变量，也可用unset($_SESSION[xxx])逐个删除
	$_SESSION = array();   
	//第三步：如果使用基于Cookie的Session，使用setCooike()删除包含Session Id的Cookie
	if (isset($_COOKIE[session_name()])) {
   		setcookie(session_name(), '', time()-42000, '/');
	}
	//第四步：最后彻底销毁Session
	session_destroy();
?>
