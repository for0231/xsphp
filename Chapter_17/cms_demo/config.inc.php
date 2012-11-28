<?php
	/*==================================================================*/
	/*		文件名:config.inc.php                               */
	/*		概要: 整个CMS系统的配置文件,一些参数的设置.         */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-15                                */
	/*		最后修改时间:2009-05-15                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//数据库部分参数设置
	@define("DB_HOST", "localhost");           			//数据库主机名
	@define("DB_USER", "mysql_user");		       		//数据库用户名
	@define("DB_PWD", "");			       			//数据库密码
	@define("DB_NAME", "");	         				//数据库名称
	@define("TAB_PREFIX", "cms_");					//前缀
	//应用程序相关设置
	@define("APP_NAME", "LAMP兄弟连网络工作室");            	//应用程序名称

	//框架路径设置
	@define("CMS_ROOT", "");					//系统根目录
	@define("CMS_CLASS_PATH", CMS_ROOT."class/");			//系统核心CLASS路径
	@define("CMS_UPLOAD_PATH", CMS_ROOT."uploadFiles/");	        //系统上传文件路径
	@define("CMS_TEMP", CMS_ROOT."temp/");			        //系统临时文件路径

	//和Smarty模板相关的设置
	@define("TEMPLATE_PATH", CMS_ROOT."templates/");	        //系统模板路径
	@define("TEMPLATE_COMPILE_PATH", CMS_ROOT."templates_c/");	//系统模板编译后的路径
	@define("TEMPLATE_CACHE_START", 0);                     	//缓存是否开启
	@define("TEMPLATE_CACHE_LIFETIME", 60*60*24);	                //系统模板被缓存的时间
	@define("TEMPLATE_CACHE_PATH", CMS_ROOT."cache/");	        //系统模板缓存文件存放的路径

		
	@define("APP_CLASS_PATH", CMS_ROOT."/class/");                   //类文件存放的目录
	@define("APP_PATH", "");   					 //安装路径
	@define("GALLERY_PATH", APP_PATH."gallery/");           	 //图片相册物理路径
	@define("GALLERY_REAL_PATH", CMS_ROOT."gallery/");               //图片相册存放目录
 

	@define("STYLE_PATH", APP_PATH."style/");                	 //系统风格路径
	@define("APP_STYLE", "default");                                 //系统当前风格
	@define("ARTICLE_PAGE_SIZE", 20);                                //后台文章每页显示的数目
	@define("PICTURE_PAGE_SIZE", 10);                                //后台图片每页显示的数目
	@define("PICTURE_SHOW_TYPE", "list");                            //后台图片显示的方式 list 列表 thumb缩略图

	$styleList = array("default" => "默认风格", "cial"=> "时代经典");  	//系统风格数组
	$waterText = array('《细说PHP》', 'www.xsphp.com');			//定义加水印的文字
	$pictureSize = array('maxWidth' => 300, 'maxHeight' => 300); 		//定义生成后的大小
	$thumbSize = array('width' => 100, 'height' => 100);   			//定义缩略图的大小
?>
