<html>
	<head>
		<title>�򵥼�����</title>
	</head>
	<body>
	<?php	
         	/* ����û�������ύ��ť�Ŵ��ڱ����������ܽ��ձ����ݺͶ����ݽ�����֤
         	   ����if����ж��Ƿ񽫱��е������������ύ����ҳ�棬���û����ִ�� */
		if( isset( $_POST["num1"] ) && isset( $_POST["num2"] ) )
		{
			if ( empty($_POST["num1"]) ) {    //�����һ��������Ϊ�����������Ϣ����ֹͣ����
				echo "<font color='red'>��һ������������Ϊ��</font><br>";
				unset($_POST["sub"]);     //ȡ�����е��ύ��������������ж�ʱ����ִ��
			}
			if ( empty($_POST["num2"]) ) {    //����ڶ���������Ϊ�����������Ϣ����ֹͣ����
			    echo "<font color='red'>�ڶ�������������Ϊ��</font><br>";
			    unset($_POST["sub"]);         //ȡ�����е��ύ��������������ж�ʱ����ִ��
			}

			$oper = $_POST["oper"];           //��ȡ���е������������������$oper
			$num1 = $_POST["num1"];           //��ȡ���еĵ�һ��������������������$num1
			$num2 = $_POST["num2"];           //��ȡ���еĵڶ���������������������$num2

			if($oper=="/" || $oper == "%") {  //����û�ѡ����ǳ��Ż�ȡ����ţ�����������Ϊ0
				if($num2 == 0) {          //����ڶ���������Ϊ0, ���������Ϣ����ֹͣ����
					echo "<font color='red'>0������Ϊ����</font><br>";
					unset($_POST["sub"]); //ȡ�����е��ύ��������������ж�ʱ����ִ��
				}
			}
		}
	?>
                <!-- ��HTML������ʽ������������û��������� -->
		<table border="1" align="center" width="400">
		    <form action="" method="post">    <!-- ʹ��post�����ύ����ҳ��-->
			<caption><h2>�򵥼�����</h2></caption>
			<tr>
                        <!-- ��������������value����ֵ�����û�����������ݣ����ύ���Ա���--> 
			<td><input type="text" size="10" name="num1" value="<?php
										                   if(!empty($num1))
											                      echo $num1;
										              ?>"></td>
				<td>
					<select name="oper">
						<option value="+" <?php  //���ѡ���˼Ӻţ����ύ����
								            if($_POST["oper"] == "+") 
									               echo "selected"; 
								       ?>> + </option>
						<option value="-"  <?php  //���ѡ���˼��ţ����ύ����
								           if($_POST["oper"] == "-") 
									              echo "selected"; 
								       ?>> - </option>
						<option value="x"  <?php   //���ѡ���˳˺ţ����ύ����
								           if($_POST["oper"] == "x") 
									              echo "selected"; 
								?>> x </option>
						<option value="/"  <?php  //���ѡ���˳��ţ����ύ����
								           if($_POST["oper"] == "/") 
									             echo "selected"; 
								       ?>> / </option>
						<option value="%"  <?php   //���ѡ����ȡ����ţ����ύ����
								          if($_POST["oper"] == "%") 
									            echo "selected"; 
								        ?>> % </option>
					</select>
				</td>
                                <!-- ��������������value����ֵ�����û�����������ݣ����ύ���Ա���-->
				<td><input type="text" size="10" name="num2" value="<?php
										                       if(!empty($num2))
											                         echo $num2;
										                   ?>"></td>
				<td><input type="submit" name="sub" value="����"></td>	
			</tr>
				
		   <?php
                        /* ͨ������������$_POST["sub"]���ж��Ƿ������ύ��ť��
                           ���������¼����Ƿ�ִ���Լ��Ƿ����������         */
			if(isset($_POST["sub"]) && !empty($_POST["sub"])){
				 $sum=0;              //����һ����ż������ı�������ʹֵΪ0
                                 //ʹ��switch��䣬ͨ����ѡ��������������ִ����������
				 switch($oper)
				 {
				 	case "+":           //����û�ѡ��Ӻţ���ִ������ӷ�����
						$sum = $num1 + $num2;  
						break;
				 	case "-":            //����û�ѡ����ţ���ִ�������������
						$sum = $num1 - $num2;
						break;
				 	case "x":            //����û�ѡ��˺ţ���ִ������˷�����
						$sum = $num1 * $num2;
						break;
				 	case "/":           //����û�ѡ����ţ���ִ�������������
						$sum = $num1 / $num2;
						break;
				 	case "%":          //����û�ѡ��ȡ����ţ���ִ��������ģ����
						$sum = $num1 % $num2;
						break;
				 }
                           //�����������ڱ���������������ļ����ʽ�Լ�������
		          echo "<tr><td colspan='4' align='center'>";         //������к���
				 echo "��������$num1 $oper $num2 = $sum";    //��������������ʽ	
				 echo "</td></tr>";                            //����ر��к���
			}
		   ?>
		    </form>
		</table>
	</body>
</html>

