<?php
	include "./libs/Smarty.class.php";                 	//����Smarty������ڵ��ļ�
	define('SITE_ROOT', '.');                		//����һ������ָ����Web�������ĸ�Ŀ¼
	$tpl = new Smarty();                           		//����һ��Smarty��Ķ���$tpl
	$tpl->template_dir = SITE_ROOT . "/templates/";   	//��������ģ���ļ���ŵ�Ŀ¼
	$tpl->compile_dir = SITE_ROOT . "/templates_c/";  	//�������б������ģ���ļ���ŵ�Ŀ¼
	$tpl->config_dir = SITE_ROOT . "/configs/";       	//����ģ�������������ļ���ŵ�Ŀ¼
	$tpl->cache_dir = SITE_ROOT . "/cache/";         	//���ô��Smarty�����ļ���Ŀ¼
	$tpl->caching=0;                              		//���ÿ���Smarty����ģ�幦��
	$tpl->cache_lifetime=60*60*24;                 		//����ģ�建����Чʱ��εĳ���Ϊ1��
	$tpl->left_delimiter = '<{';                      	//����ģ�������е��������
	$tpl->right_delimiter = '}>';                     	//����ģ�������е��ҽ�����
?>

