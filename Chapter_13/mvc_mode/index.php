<?php  
	require("header.inc.php");
	
	function __autoload($className){
		include $className."_class.php";
	}

	$DbModle=new ProductModle();
	$allProducts=$DbModle->selectAllProduct();
	if($allProducts){
		echo '<table align="center" width="90%" border="1">';
		echo '<caption><h2>��Ʒ�б�</h2></caption>';
		echo '<th>��ƷID</th><th>����</th><th>�۸�</th><th>�༭</th>';
		foreach($allProducts as $product){
			echo '<tr>';
			echo '<td>'.$product->getId().'</td>';
			echo '<td>'.$product->getName().'</td>';
			echo '<td>'.$product->getPrice().'</td><td>';
			echo '<a href="editview.php?action=modify&productID='.$product->getId().'">�޸�</a>/';
			echo '<a href="control.php?action=delete&productID='.$product->getId().'">ɾ��</a>';
			echo '</td></tr>';
		}
		echo '</table>';
	}else{
		echo '<p align="center">û���κ���Ʒ</p>';
	}

	echo '<center><a href="editview.php?action=add">�����Ʒ</a></center>';

	require("footer.inc.php");  
?>
