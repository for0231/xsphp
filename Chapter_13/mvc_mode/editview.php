<?php 
	require("header.inc.php"); 

	function __autoload($className){
		include $className."_class.php";
	}
	
	if($_GET["action"]=="add"){
		$title="�����Ʒ";
		$view=TRUE;
	}elseif($_GET["action"]=="modify"){
		$title="�޸���Ʒ";
		$view=FALSE;
		$DbModle=new ProductModle();
		$product=$DbModle->selectSingleProduct($_GET["productID"]);
	}
?>
<form action="control.php?action=<?php echo $view?'add':'modify'; ?>" method="POST">
<table align="center" width="60%" border="0">
	<caption><h2><?php echo $title ?></h2></caption>
	<input type="hidden" name="productID" value="<?php echo $view?'':$_GET["productID"]; ?>">
	<tr>
		<th>��Ʒ���ƣ�</th>
		<td><input type="text" name="name" value="<?php echo $view?'':$product->getName(); ?>" ></td>
	</tr>
	<tr>
		<th>��Ʒ�۸�</th>
		<td><input type="text" name="price" value="<?php echo $view?'':$product->getPrice(); ?>"></td>
	</tr>
	<tr><th>��Ʒ���ܣ�</th>
		<td><textarea cols="40" rows="5" name="description"><?php 
			echo $view?"":$product->getDescription(); 
		?></textarea></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<input type="submit" value="�ύ"><input type="reset" value="����">
		</td>

	</tr>
</table>
</form>

<?php require("footer.inc.php"); ?>
