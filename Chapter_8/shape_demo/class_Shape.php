<?php	
	interface Shape {  		   //定义了一个形状的接口，里面有两个抽象方法让子类去实现
		function area();         //声明的抽象方法在子类中实现它，用来计算不同图型的面积
		function  perimeter();   //声明的抽象方法在子类中实现它，用来计算不同图型的周长
	}
?>
