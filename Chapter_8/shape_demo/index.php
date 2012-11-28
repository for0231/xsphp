<html>
	<head>
		<title>图形的周长和面积计算器</title>       
	</head>

	<body>
		<?php
			function __autoload($className) {      //用到某类时，才自动加载到本页面
				include("class_" . ucfirst($className) . ".php");       //包含相应的类所在的文件
			}
		?>
		<center>
			<h2>图形的周长和面积计算器</h2>           <!-- 页面主题 -->
			<hr>
			<a href="index.php?action=1">矩形</a> ||       <!--  用户点击选择矩形 -->
			<a href="index.php?action=2">三角形</a> ||     <!--  用户点击选择三角形 -->
			<a href="index.php?action=3">圆形</a> <hr>    <!--  用户点击选择圆形 -->
		</center>
		
		<?php 
			switch($_REQUEST["action"]){    //当用户选择不同的图形时输出对象的表单
				case 1:            //当用户选择矩形时，创建表单对象，在此输出矩形表单内容
					$form=new Form("矩形",$_REQUEST,"index.php");   //创建矩形的表单对象
					echo $form;  //输出表单引用时，自动调用对象中的__toString()方法
					break;
				case 2:            //当用户选择三角形时，创建表单对象，在此输出三角形表单内容
					$form=new Form("三角形",$_REQUEST,"index.php","post", "_blank");
					echo $form;  //输出表单引用时，自动调用对象中的__toString()方法
					break;
				case 3:            //当用户选择圆形时，创建表单对象，在此输出圆形表单内容
					$form=new Form("圆形",$_REQUEST);
					echo $form;  //输出表单引用时，自动调用对象中的__toString()方法
					break;
				default:
					echo "请选择一个形状<br>";      //在没有选择任何形状时输出这行内容
			}

			if(isset($_REQUEST["act"])) {      //如果用户有提交表单内容的动作，则执行下面语句
				switch($_REQUEST["act"]){   //判断用户提交的是那个表单
					case 1:                 //如果提交的是矩形表单,则创建矩形对象
						$shape=new Rect($_REQUEST);          //创建一个矩形对象
						break;
					case 2:                 //如果提交的是三角形表单,则创建三角形对象
						$shape=new Triangle($_REQUEST);       //创建一个三角形对象
						break;
					case 3:                 //如果提交的是圆形表单,则创建贺形对象
						$shape=new Circle($_REQUEST);         //创建一个圆形对象
						break;
				}
                   		//访问不同对象中的运算方法，输出各自计算后的结果，多态的应用
				echo "面积为：".$shape->area()."<br>";       //创建哪个图形对象，计算哪个图形面积
				echo "周长为：".$shape->perimeter()."<br>";  //创建哪个图形对象，计算哪个图形周长
			}
		?>
	</body>
</html>
