<?php
	/*==================================================================*/
	/*		�ļ���:comm_pro.php                                 */
	/*		��Ҫ: �������۵Ĵ���ҳ��.       	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-20                                */
	/*		����޸�ʱ��:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//����ͨ�õĳ�ʹ���ű��ļ�
	require "cmsinit.inc.php";
	//�����������۶���
	$comm=new Comments();
	
	//�����û������µġ�֧�֡��͡����ԡ��Ĳ�����ʹ��AJAXʵ��
	if($_GET["action"]=="1"){
		echo '֧��[<span class="red">'.$comm->setSupport($_GET["cid"], 1).'</span>]';
	}else if($_GET["action"]=="2"){
		echo '����[<span class="red">'.$comm->setSupport($_GET["cid"], 2).'</span>]';
	}
	//���ù���Ա�Ƿ�ִ��ɾ�����۵Ĳ���
	if($_GET["action"]=="del"){
		$comm->del($_GET["cid"]);
		echo '<script>window.location.href="'.$_GET["file"].'?aid='.$_GET["aid"].'&page='.$_GET["page"].'"</script>';
	}
?>
