<html>
	<head><title>�������԰�ģʽ</title></head>
	<body>
		<?php
			$filename="text_data.txt";   //����һ�����������ļ�����������ļ��б���������Ϣ

			if(isset($_POST["sub"])){   //�ж��û��Ƿ����ύ��Ť���û��ύ���������ɹ�
				//���ձ����������ݣ�������Ϊһ����ʹ�á�||���ָ���ʹ�á�<|>����β
				$message=$_POST["username"]."||".$_POST["title"]."||".$_POST["mess"]."<|>";
				writeMessage($filename, $message);    //�����Զ��庯��������Ϣд���ļ�
			}

			if(file_exists($filename))          //�ж��ļ��Ƿ���ڣ������������������
				readMessage($filename);     //�ļ�����������Զ��庯������ȡ����

			function writeMessage($filename, $message) {   //�Զ���һ�����ļ���д�����ݵĺ���
				$fp = fopen($filename, "a");              //��׷��ģʽ���ļ�
				if (flock($fp, LOCK_EX)) {              //������������������ռ������
   					fwrite($fp, $message);              //������д���ļ�
    					flock($fp, LOCK_UN);             //ͬ��ʹ��flock()�����ͷ�����
				} else {                               //���������ռ����ʧ��
    					echo "���������ļ�!";             //���������Ϣ
				}
				fclose($fp);	                           //�ر��ļ���Դ
			}
			function readMessage($filename){         //�Զ���һ��������ȡ�ļ��ĺ���
				$fp=fopen($filename, "r");           //��ֻ����ģʽ���ļ�
				flock($fp, LOCK_SH);              //�����ļ��Ĺ�������
				$buffer="";                        //���ļ��е����ݱ������������ַ�����
				while (!feof($fp)) {                 //ʹ��whileѭ�����ļ������ݱ�������  
					$buffer.= fread($fp, 1024);      //��������׷�ӵ�$buffer������
				}	
				$data=explode("<|>", $buffer);      //ͨ����<|>����ÿ�����Էָ������뵽������
				foreach($data as $line) {           //�������齫ÿ��������HTML���
					list($username, $title, $message)=explode("||",$line);    //��ÿ�������ٷָ� 
					if($username!="" && $title!="" && $message!="") {   //�ж�ÿ�����Ƿ�Ϊ��
						echo $username.'˵��';        //����û���
						echo '&nbsp;'.$title.'��';        //�������
						echo $message."<hr>";        //�������������Ϣ
					}
				}
				flock($fp, LOCK_UN);                 // �ͷ�����
				fclose($fp);                          //�ر��ļ���Դ
			}
		?>
         	<!-- ����Ϊ�û���������棨GUI��-->
		<form action="" method="post">
			�û�����<input type="text" size=10 name="username"><br>
			��&nbsp;&nbsp;�⣺<input type="text" size=30 name="title"><br>
			<textarea name="mess" rows=4 cols=38>������������������Ϣ��</textarea>
			<input type="submit" name="sub" value="����">
		</form>
	</body>
</html>
