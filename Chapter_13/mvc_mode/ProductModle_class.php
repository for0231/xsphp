<?php
	class ProductModle extends MyDB {
		public function addProduct($product){
			$query="INSERT INTO product(name, price, description) values (?, ?, ?)";
			$stmt = $this->mysqli->prepare($query); 
			$stmt->bind_param('sds', $name, $price, $description);
			$name=$product->getName();
			$price=$product->getPrice();
			$description=$product->getDescription();
			$stmt->execute(); 

			if($stmt->affected_rows!=1){
				$this->printError("数据插入失败：".$stmt->error);
				return FALSE;
			}else{
				return $this->mysqli->insert_id;
			}
		}

		public function deleteProduct($productID){
			$query="DELETE FROM product WHERE productID='".$productID."'";
			if($this->mysqli->query($query)){
				return TRUE;
			}else{
				$this->printError("数据删除失败：".$this->mysqli->error);
				return FALSE;
			}
		}

		public function modifyProduct($product){
			$query="UPDATE product set name=?,price=?,description=? WHERE productID=?";
			$stmt = $this->mysqli->prepare($query); 
			$stmt->bind_param('sdsi', $name, $price, $description,$productID);
			$name=$product->getName();
			$price=$product->getPrice();
			$description=$product->getDescription();
			$productID=$product->getId();
			$stmt->execute(); 

			if($stmt->affected_rows!=1){
				$this->printError("数据更新失败：".$stmt->error);
				return FALSE;
			}else{
				return TRUE;
			}
		}
		public function selectSingleProduct($productId) {
			$query="SELECT * FROM product WHERE productID='".$productId."'";
			if($result=$this->mysqli->query($query)){
				if($row=$result->fetch_assoc()){
					$product=new Product($row);
					$result->close();
					return $product;
				}else{
					$result->close();
					$this->printError("获取单行数据失败！");
					return FALSE;
				}
			}else{
				$this->printError("数据查询失败：".$this->mysqli->error);
				return FALSE;
			}
		}

		public function selectAllProduct() {
			$query="SELECT * FROM product ORDER BY productID";
			if($result=$this->mysqli->query($query)){
				if($result->num_rows){
					while($row=$result->fetch_assoc())
						$allProduct[]=new Product($row);
					$result->close();
					return $allProduct;
						
				}else{
					$result->close();
					$this->printError("没有获取到任何记录");
					return FALSE;
				
				}
			}else{
				$this->printError("数据查询失败：".$this->mysqli->error);
				return FALSE;
			}
		}
	}
?>
