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
				return "δ֪��Ʒ����";
		}

		public function getPrice(){
			if(!empty($this->price))
				return $this->moneyFormat($this->price);
			else
				return "ĩ֪�۸�";
		}

		public function getSrcPrice() {
			return $this->price();
		}

		public function getDescription(){
			if(!empty($this->description))
				return $this->html2text($this->description);
			else
				return "�ò�Ʒû����ϸ�Ľ�����Ϣ";
		}

		private function html2text($html) {
			return htmlspecialchars(stripslashes($html));
		}

		private function moneyFormat($price) {
			return number_format($price, 2, '.', ',');
		}
	}
?>
