<?php	
	class Rect implements Shape {  	//定义了一个矩形子类实现了形状接口中的周长和面积
		private $width;           //声明矩形的成员属性宽度
		private $height;         //声明矩形的成员属性高度

		function __construct($sides="") {     //矩形的构造方法，用表单中传入的高度和宽度创建矩形对象
			$this->width=$sides["width"];   //用表单数组中输入的宽度给成员属性width赋初值
			$this->height=$sides["height"];  //用表单数组中输入的高度给成员属性height赋初值
		}

		function area() {                      //按矩形面积的计算公式，实现接口中的抽象方法area()
			return $this->width*$this->height;   //访问该方法时，返回矩形的面积
		}
	
		function perimeter() {         //按矩形周长的计算公式，实现接口中的抽象方法perimeter()
			return 2*($this->width+$this->height);   //访问该方法时，返回矩形的周长
		}
	}
?>
