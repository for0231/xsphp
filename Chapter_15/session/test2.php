<?php
	session_start();                             //����Session
	echo $_SESSION["username"]."<br>";           //���Session������ֵ
	echo "Session ID: ".session_id()."<br>";     //���Session ID
?> 
