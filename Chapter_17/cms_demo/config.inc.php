<?php
	/*==================================================================*/
	/*		�ļ���:config.inc.php                               */
	/*		��Ҫ: ����CMSϵͳ�������ļ�,һЩ����������.         */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-15                                */
	/*		����޸�ʱ��:2009-05-15                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//���ݿⲿ�ֲ�������
	@define("DB_HOST", "localhost");           			//���ݿ�������
	@define("DB_USER", "mysql_user");		       		//���ݿ��û���
	@define("DB_PWD", "");			       			//���ݿ�����
	@define("DB_NAME", "");	         				//���ݿ�����
	@define("TAB_PREFIX", "cms_");					//ǰ׺
	//Ӧ�ó����������
	@define("APP_NAME", "LAMP�ֵ������繤����");            	//Ӧ�ó�������

	//���·������
	@define("CMS_ROOT", "");					//ϵͳ��Ŀ¼
	@define("CMS_CLASS_PATH", CMS_ROOT."class/");			//ϵͳ����CLASS·��
	@define("CMS_UPLOAD_PATH", CMS_ROOT."uploadFiles/");	        //ϵͳ�ϴ��ļ�·��
	@define("CMS_TEMP", CMS_ROOT."temp/");			        //ϵͳ��ʱ�ļ�·��

	//��Smartyģ����ص�����
	@define("TEMPLATE_PATH", CMS_ROOT."templates/");	        //ϵͳģ��·��
	@define("TEMPLATE_COMPILE_PATH", CMS_ROOT."templates_c/");	//ϵͳģ�������·��
	@define("TEMPLATE_CACHE_START", 0);                     	//�����Ƿ���
	@define("TEMPLATE_CACHE_LIFETIME", 60*60*24);	                //ϵͳģ�屻�����ʱ��
	@define("TEMPLATE_CACHE_PATH", CMS_ROOT."cache/");	        //ϵͳģ�建���ļ���ŵ�·��

		
	@define("APP_CLASS_PATH", CMS_ROOT."/class/");                   //���ļ���ŵ�Ŀ¼
	@define("APP_PATH", "");   					 //��װ·��
	@define("GALLERY_PATH", APP_PATH."gallery/");           	 //ͼƬ�������·��
	@define("GALLERY_REAL_PATH", CMS_ROOT."gallery/");               //ͼƬ�����Ŀ¼
 

	@define("STYLE_PATH", APP_PATH."style/");                	 //ϵͳ���·��
	@define("APP_STYLE", "default");                                 //ϵͳ��ǰ���
	@define("ARTICLE_PAGE_SIZE", 20);                                //��̨����ÿҳ��ʾ����Ŀ
	@define("PICTURE_PAGE_SIZE", 10);                                //��̨ͼƬÿҳ��ʾ����Ŀ
	@define("PICTURE_SHOW_TYPE", "list");                            //��̨ͼƬ��ʾ�ķ�ʽ list �б� thumb����ͼ

	$styleList = array("default" => "Ĭ�Ϸ��", "cial"=> "ʱ������");  	//ϵͳ�������
	$waterText = array('��ϸ˵PHP��', 'www.xsphp.com');			//�����ˮӡ������
	$pictureSize = array('maxWidth' => 300, 'maxHeight' => 300); 		//�������ɺ�Ĵ�С
	$thumbSize = array('width' => 100, 'height' => 100);   			//��������ͼ�Ĵ�С
?>
