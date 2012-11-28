<?php
	/*==================================================================*/
	/*		文件名:comm_pro.php                                 */
	/*		概要: 文章评论的处理页面.       	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-20                                */
	/*		最后修改时间:2009-05-20                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/

	//包含通用的初使化脚本文件
	require "cmsinit.inc.php";
	//创建文章评论对象
	$comm=new Comments();
	
	//设置用户对文章的“支持”和“反对”的操作，使用AJAX实现
	if($_GET["action"]=="1"){
		echo '支持[<span class="red">'.$comm->setSupport($_GET["cid"], 1).'</span>]';
	}else if($_GET["action"]=="2"){
		echo '反对[<span class="red">'.$comm->setSupport($_GET["cid"], 2).'</span>]';
	}
	//设置管理员是否执行删除评论的操作
	if($_GET["action"]=="del"){
		$comm->del($_GET["cid"]);
		echo '<script>window.location.href="'.$_GET["file"].'?aid='.$_GET["aid"].'&page='.$_GET["page"].'"</script>';
	}
?>
