<html>
	<head>
		<title>简单计算器</title>
	</head>
	<body>
	<?php	
         	/* 如果用户点击了提交按钮才存在表单变量，才能接收表单数据和对数据进行验证
         	   以下if语句判断是否将表单中的两个操作数提交到本页面，如果没有则不执行 */
		if( isset( $_POST["num1"] ) && isset( $_POST["num2"] ) )
		{
			if ( empty($_POST["num1"]) ) {    //如果第一个操作数为空输出错误信息，并停止计算
				echo "<font color='red'>第一个操作数不能为空</font><br>";
				unset($_POST["sub"]);     //取消表单中的提交变量，后面计算判断时将不执行
			}
			if ( empty($_POST["num2"]) ) {    //如果第二个操作数为空输出错误信息，并停止计算
			    echo "<font color='red'>第二个操作数不能为空</font><br>";
			    unset($_POST["sub"]);         //取消表单中的提交变量，后面计算判断时将不执行
			}

			$oper = $_POST["oper"];           //获取表单中的运算符，并赋给变量$oper
			$num1 = $_POST["num1"];           //获取表单中的第一个操作数，并赋给变量$num1
			$num2 = $_POST["num2"];           //获取表单中的第二个操作数，并赋给变量$num2

			if($oper=="/" || $oper == "%") {  //如果用户选择的是除号或取余符号，被除数不能为0
				if($num2 == 0) {          //如果第二个操作数为0, 输出错误信息，并停止计算
					echo "<font color='red'>0不能作为除数</font><br>";
					unset($_POST["sub"]); //取消表单中的提交变量，后面计算判断时将不执行
				}
			}
		}
	?>
                <!-- 以HTML表格的形式输出计算器的用户操作界面 -->
		<table border="1" align="center" width="400">
		    <form action="" method="post">    <!-- 使用post方法提交给本页面-->
			<caption><h2>简单计算器</h2></caption>
			<tr>
                        <!-- 重新设置输入框的value属性值，将用户输入过的数据，在提交后仍保留--> 
			<td><input type="text" size="10" name="num1" value="<?php
										                   if(!empty($num1))
											                      echo $num1;
										              ?>"></td>
				<td>
					<select name="oper">
						<option value="+" <?php  //如果选择了加号，在提交后保留
								            if($_POST["oper"] == "+") 
									               echo "selected"; 
								       ?>> + </option>
						<option value="-"  <?php  //如果选择了减号，在提交后保留
								           if($_POST["oper"] == "-") 
									              echo "selected"; 
								       ?>> - </option>
						<option value="x"  <?php   //如果选择了乘号，在提交后保留
								           if($_POST["oper"] == "x") 
									              echo "selected"; 
								?>> x </option>
						<option value="/"  <?php  //如果选择了除号，在提交后保留
								           if($_POST["oper"] == "/") 
									             echo "selected"; 
								       ?>> / </option>
						<option value="%"  <?php   //如果选择了取余符号，在提交后保留
								          if($_POST["oper"] == "%") 
									            echo "selected"; 
								        ?>> % </option>
					</select>
				</td>
                                <!-- 重新设置输入框的value属性值，将用户输入过的数据，在提交后仍保留-->
				<td><input type="text" size="10" name="num2" value="<?php
										                       if(!empty($num2))
											                         echo $num2;
										                   ?>"></td>
				<td><input type="submit" name="sub" value="计算"></td>	
			</tr>
				
		   <?php
                        /* 通过表单传过来的$_POST["sub"]，判断是否点击了提交按钮，
                           来决定以下计算是否执行以及是否输出计算结果         */
			if(isset($_POST["sub"]) && !empty($_POST["sub"])){
				 $sum=0;              //声明一个存放计算结果的变量，初使值为0
                                 //使用switch语句，通过表单选择的运算符来决定执行哪种运算
				 switch($oper)
				 {
				 	case "+":           //如果用户选择加号，则执行下面加法运算
						$sum = $num1 + $num2;  
						break;
				 	case "-":            //如果用户选择减号，则执行下面减法运算
						$sum = $num1 - $num2;
						break;
				 	case "x":            //如果用户选择乘号，则执行下面乘法运算
						$sum = $num1 * $num2;
						break;
				 	case "/":           //如果用户选择除号，则执行下面除法运算
						$sum = $num1 / $num2;
						break;
				 	case "%":          //如果用户选择取余符号，则执行下面求模运算
						$sum = $num1 % $num2;
						break;
				 }
                           //以下三行是在表格的新行中输出最后的计算格式以及计算结果
		          echo "<tr><td colspan='4' align='center'>";         //输出新行和列
				 echo "计算结果：$num1 $oper $num2 = $sum";    //在列中输出结果格式	
				 echo "</td></tr>";                            //输出关闭列和行
			}
		   ?>
		    </form>
		</table>
	</body>
</html>

