<?php
	/*==================================================================*/
	/*		文件名:MyTpl.class.php                              */
	/*		概要: 自定义Smarty模板引擎的子类.      	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class MyTpl extends Smarty {
		function __construct(){	
			$this->template_dir = TEMPLATE_PATH;  		//设置所有模板文件存放的目录
			$this->compile_dir = TEMPLATE_COMPILE_PATH;  	//设置所有编译过的模板文件存放的目录
			$this->cache_dir = TEMPLATE_CACHE_PATH;         //设置存放Smarty缓存文件的目录
			$this->caching=TEMPLATE_CACHE_START;            //设置关闭Smarty缓存模板功能
			$this->cache_lifetime=TEMPLATE_CACHE_LIFETIME;  //设置模板缓存有效时间段的长度为1小时
			$this->left_delimiter = '<{';                   //设置模板语言中的左结束符
			$this->right_delimiter = '}>';       		//设置模板语言中的右结束符
		}
	}
?>
