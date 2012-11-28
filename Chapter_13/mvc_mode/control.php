<?php
	function __autoload($className){
		include $className."_class.php";
	}
	
	$DbModle=new ProductModle(); 
	
	switch($_GET["action"]){
		case "add":
			$product=new Product($_POST);
			if($DbModle->addProduct($product)){
				header("Location:index.php");
			}else{
				echo '添加商品失败,请<a href="index.php">返回</a>';
			}
			break;	
		case "modify":
			$product=new Product($_POST);
			if($DbModle->modifyProduct($product)){
				header("Location:index.php");
			}else{
				echo '修改商品失败,请<a href="index.php">返回</a>';
			}
			break;
		case "delete":
			if($DbModle->deleteProduct($_GET["productID"])){
				header("Location:index.php");
			}else{
				echo '删除商品失败,请<a href="index.php">返回</a>';
			}
			break;
	}
?>
