<?php
	class Product {
		private $productID;
		private $name;
		private $price;
		private $description;

		public function __construct($product=array()){
			foreach($product as $property=>$value) {
				$this->$property=$value;
			}
		}
		
		public function getId(){
			if(!empty($this->productID))
				return $this->productID;
			else 
				return FALSE;
		}

		public function getName(){
			if(!empty($this->name))
				return $this->html2text($this->name);
			else
				return "未知产品名称";
		}

		public function getPrice(){
			if(!empty($this->price))
				return $this->moneyFormat($this->price);
			else
				return "末知价格";
		}

		public function getSrcPrice() {
			return $this->price();
		}

		public function getDescription(){
			if(!empty($this->description))
				return $this->html2text($this->description);
			else
				return "该产品没有详细的介绍信息";
		}

		private function html2text($html) {
			return htmlspecialchars(stripslashes($html));
		}

		private function moneyFormat($price) {
			return number_format($price, 2, '.', ',');
		}
	}
?>
