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
				echo '�����Ʒʧ��,��<a href="index.php">����</a>';
			}
			break;	
		case "modify":
			$product=new Product($_POST);
			if($DbModle->modifyProduct($product)){
				header("Location:index.php");
			}else{
				echo '�޸���Ʒʧ��,��<a href="index.php">����</a>';
			}
			break;
		case "delete":
			if($DbModle->deleteProduct($_GET["productID"])){
				header("Location:index.php");
			}else{
				echo 'ɾ����Ʒʧ��,��<a href="index.php">����</a>';
			}
			break;
	}
?>
