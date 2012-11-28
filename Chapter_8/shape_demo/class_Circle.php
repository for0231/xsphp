<?php	
	class  Circle implements Shape {           //定义了一个圆形子类实现了形状接口中的周长和面积
		private $radius;                     //声明一个成员属性用于存储圆形的半径

		function __construct($sides="") {      //圆形的构造方法，用表单中传入的半径值创建圆形对象
			$this->radius=$sides["radius"];   //用表单数组中输入的半径值给成员属性radius赋初值
		}

		function area() {           //按圆形面积的计算公式，实现接口中的抽象方法area()
			return pi()*$this->radius*$this->radius;   //返回圆形的面积
		}
	
		function perimeter() {      //按圆形面积的计算公式，实现接口中的抽象方法area()
			return 2*pi()*$this->radius;            //返回圆形的周长
		}	
	}	
?>
