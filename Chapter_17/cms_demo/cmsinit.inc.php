<?php
	/*==================================================================*/
	/*		文件名:cmsinit.inc.php                              */
	/*		概要: 公共的系统初使化信息.              	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	
	//开启Session
	session_start();
	//设置页面以GB2312的中文编号显示
	header("Content-type: text/html;charset=gb2312");
	//包含通用的全局配置文件
	require("config.inc.php");
	//包含Smarty类库所在的文件
	require CMS_ROOT."libs/Smarty.class.php"; 
	//设置中国所在的东八时区	
	date_default_timezone_set('PRC'); 
	//设置自动加载所需要的类文件
	function __autoload($className){
		//包含类路径下面的对应类名的类文件
		include(APP_CLASS_PATH.$className.".class.php");
	}
	//创建一个Smarty类的对象$tpl
	$tpl = new MyTpl();                           
?>
