<?php
	class Person {        //����һ��Person�࣬����������Ա���Ժ�һ����Ա����
		private $name;   //�˵�����
		private $sex;     //�˵��Ա�
		private $age;     //�˵�����
	
		function __construct($name="", $sex="", $age="") {   //���췽��Ϊ��Ա���Ը���ֵ
			$this->name=$name;
			$this->sex=$sex;
			$this->age=$age;
		}

		function say()  {       //����˿���˵���ķ���, ˵���Լ��ĳ�Ա����
			echo "�ҵ����ӽУ�".$this->name." �Ա�".$this->sex." �ҵ������ǣ�".$this->age."<br>";
		}
	}
?>

