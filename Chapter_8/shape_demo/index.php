<html>
	<head>
		<title>ͼ�ε��ܳ������������</title>       
	</head>

	<body>
		<?php
			function __autoload($className) {      //�õ�ĳ��ʱ�����Զ����ص���ҳ��
				include("class_" . ucfirst($className) . ".php");       //������Ӧ�������ڵ��ļ�
			}
		?>
		<center>
			<h2>ͼ�ε��ܳ������������</h2>           <!-- ҳ������ -->
			<hr>
			<a href="index.php?action=1">����</a> ||       <!--  �û����ѡ����� -->
			<a href="index.php?action=2">������</a> ||     <!--  �û����ѡ�������� -->
			<a href="index.php?action=3">Բ��</a> <hr>    <!--  �û����ѡ��Բ�� -->
		</center>
		
		<?php 
			switch($_REQUEST["action"]){    //���û�ѡ��ͬ��ͼ��ʱ�������ı�
				case 1:            //���û�ѡ�����ʱ�������������ڴ�������α�����
					$form=new Form("����",$_REQUEST,"index.php");   //�������εı�����
					echo $form;  //���������ʱ���Զ����ö����е�__toString()����
					break;
				case 2:            //���û�ѡ��������ʱ�������������ڴ���������α�����
					$form=new Form("������",$_REQUEST,"index.php","post", "_blank");
					echo $form;  //���������ʱ���Զ����ö����е�__toString()����
					break;
				case 3:            //���û�ѡ��Բ��ʱ�������������ڴ����Բ�α�����
					$form=new Form("Բ��",$_REQUEST);
					echo $form;  //���������ʱ���Զ����ö����е�__toString()����
					break;
				default:
					echo "��ѡ��һ����״<br>";      //��û��ѡ���κ���״ʱ�����������
			}

			if(isset($_REQUEST["act"])) {      //����û����ύ�����ݵĶ�������ִ���������
				switch($_REQUEST["act"]){   //�ж��û��ύ�����Ǹ���
					case 1:                 //����ύ���Ǿ��α�,�򴴽����ζ���
						$shape=new Rect($_REQUEST);          //����һ�����ζ���
						break;
					case 2:                 //����ύ���������α�,�򴴽������ζ���
						$shape=new Triangle($_REQUEST);       //����һ�������ζ���
						break;
					case 3:                 //����ύ����Բ�α�,�򴴽����ζ���
						$shape=new Circle($_REQUEST);         //����һ��Բ�ζ���
						break;
				}
                   		//���ʲ�ͬ�����е����㷽����������Լ����Ľ������̬��Ӧ��
				echo "���Ϊ��".$shape->area()."<br>";       //�����ĸ�ͼ�ζ��󣬼����ĸ�ͼ�����
				echo "�ܳ�Ϊ��".$shape->perimeter()."<br>";  //�����ĸ�ͼ�ζ��󣬼����ĸ�ͼ���ܳ�
			}
		?>
	</body>
</html>
