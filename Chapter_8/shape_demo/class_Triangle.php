<?php
	class Triangle implements Shape {  	//定义了一个三角形子类实现了形状接口中的周长和面积
		private $side1;                //声明三角形第一个边的成员属性
		private $side2;                //声明三角形第二个边的成员属性
		private $side3;                //声明三角形第三个边的成员属性

		function __construct($sides="") {    //三角形的构造方法，用表单中传入的三边值创建三角形对象
			$this->side1=$sides["side1"];    //用表单数组中输入的第一个边长给成员属性side1赋初值
			$this->side2=$sides["side2"];    //用表单数组中输入的第二个边长给成员属性side2赋初值
			$this->side3=$sides["side3"];    //用表单数组中输入的第三个边长给成员属性side3赋初值
		}

		function area() {           //按三角形面积的计算公式，实现接口中的抽象方法area()
			$s=($this->side1+$this->side2+$this->side3)/2;
			return sqrt( $s*($s - $this->side1)*($s - $this->side2)*($s - $this->side3) );  //返回三角形的面积
		}
	
		function perimeter() {     //按三角形周长的计算公式，实现接口中的抽象方法perimeter()
			return  $this->side1+$this->side2+$this->side3;        //返回三角形的周长
		}
	}
?>
