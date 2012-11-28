<?php
	class Person {        //声明一个Person类，包含三个成员属性和一个成员方法
		private $name;   //人的名子
		private $sex;     //人的性别
		private $age;     //人的年龄
	
		function __construct($name="", $sex="", $age="") {   //构造方法为成员属性赋初值
			$this->name=$name;
			$this->sex=$sex;
			$this->age=$age;
		}

		function say()  {       //这个人可以说话的方法, 说出自己的成员属性
			echo "我的名子叫：".$this->name." 性别：".$this->sex." 我的年龄是：".$this->age."<br>";
		}
	}
?>

