<?php
	/*==================================================================*/
	/*		�ļ���:MyTpl.class.php                              */
	/*		��Ҫ: �Զ���Smartyģ�����������.      	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class MyTpl extends Smarty {
		function __construct(){	
			$this->template_dir = TEMPLATE_PATH;  		//��������ģ���ļ���ŵ�Ŀ¼
			$this->compile_dir = TEMPLATE_COMPILE_PATH;  	//�������б������ģ���ļ���ŵ�Ŀ¼
			$this->cache_dir = TEMPLATE_CACHE_PATH;         //���ô��Smarty�����ļ���Ŀ¼
			$this->caching=TEMPLATE_CACHE_START;            //���ùر�Smarty����ģ�幦��
			$this->cache_lifetime=TEMPLATE_CACHE_LIFETIME;  //����ģ�建����Чʱ��εĳ���Ϊ1Сʱ
			$this->left_delimiter = '<{';                   //����ģ�������е��������
			$this->right_delimiter = '}>';       		//����ģ�������е��ҽ�����
		}
	}
?>
