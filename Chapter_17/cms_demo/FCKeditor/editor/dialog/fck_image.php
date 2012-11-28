<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
	<meta name="robots" content="noindex, nofollow" />
	<style type="text/css">
		.Hand
		{
			cursor: pointer;
			cursor: hand;
		}
	</style>
	<script type="text/javascript">
		var dialog	= window.parent ;
		var oEditor = dialog.InnerDialogLoaded() ;

		window.onload = function (){
			oEditor.FCKLanguageManager.TranslatePage(document) ;
			dialog.SetAutoSize( true ) ;
		}
		function ImageOK2(str) {
			var oEditor = window.parent.InnerDialogLoaded() ;
			var oDOM = oEditor.FCK.EditorDocument ;
			var FCK = oEditor.FCK;
	
			var newCode = FCK.CreateElement('DIV');
			newCode.innerHTML = str;
  			window.parent.Cancel();
		}
	</script>
	<link href="base.css" rel="stylesheet" type="text/css" />
	<base target="_self" />
</HEAD>
<body bgcolor="#EBF6CD" leftmargin="4" topmargin="2">
<?php
if(isset($_POST["picSubmit"])){
	require("../../../config.inc.php");
	function __autoload($className){
		include(APP_CLASS_PATH.$className.".class.php");
	}
	$fileUpload=new FileUpload(array("filePath"=>GALLERY_REAL_PATH));
	if($fileUpload->uploadFile($_FILES["imgfile"]) < 0){
		echo $fileUpload->getErrorMsg();
	}else{
		$picName=$fileUpload->getNewFileName();	
		$gdImage=new GDImage(GALLERY_REAL_PATH,$picName);
		$gdImage->makeThumb($_POST["w"], $_POST["h"],false); 
		global $waterText;
		$gdImage->waterMark($waterText);
		unlink(GALLERY_REAL_PATH.$picName);
		$imgHtml='<img border=0; alt="" width="'.$_POST["w"].'" height="'.$_POST["h"].'" src="'.GALLERY_PATH.str_replace(".", "_new.", $picName).'" />';	
		
	}	
}
?>
<form enctype="multipart/form-data" name="form1" id="form1" method="post">
<?
if($imgHtml != '')
{
?>
<table width="100%" border="0">
	<tr>
		<td nowrap='1'>
		<fieldset>
			<legend>上传后得到的图片HTML信息</legend>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td nowrap='1'>
					 <?php echo $imgHtml; ?> 
					</td>
				</tr>
				<tr height="28">
					<td align='left'>
            <input type="button" name="imgok" id="imgok" onclick="ImageOK2('<?php echo htmlentities($imgHtml); ?>')" value=" 插入到编辑器  " style="height:24px" class="binput" />
         			 </td>
				</tr>
			</table>
			</fieldset>
		</td>
	</tr>
</table>			
<?php
} else {
?>
<table width="100%" border="0">
	<tr>
		<td nowrap='1'>
		<fieldset>
			<legend> 上传新图片 </legend>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr height="30">
					<td nowrap='1'>图片:</td>
					<td nowrap='1'>
						<input name="imgfile" type="file" id="imgfile" onChange="view.style.display='block';tu.src=this.value;" class="binput" />
					 	 
					 </td>
					 <td id="view" style="display:none" width="120" rowspan="3"><img id="tu" src=""  height="120"><br><center>图片预览</center></td>
				</tr>
				<tr height="30">
					<td nowrap='1'>选项:</td>
					<td nowrap='1'>
						
						<input name="w" type="text" value="300" size="3" />&nbsp;缩略宽度<br>
						<input name="h" type="text" value="300" size="3" />&nbsp;缩略高度 
					</td>
				</tr>
				<tr height="36">
					<td nowrap='1'>&nbsp;</td>
					<td colspan="2">
           					<input type="submit" name="picSubmit" id="picSubmit" value="上传图片" style="height:24px" class="binput">
           				 </td>
				</tr>
			</table>
			</fieldset>
		</td>
	</tr>
</table>
<?php } ?> 
</form>
</body>
</html>
