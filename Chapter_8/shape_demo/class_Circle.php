<?php	
	class  Circle implements Shape {           //������һ��Բ������ʵ������״�ӿ��е��ܳ������
		private $radius;                     //����һ����Ա�������ڴ洢Բ�εİ뾶

		function __construct($sides="") {      //Բ�εĹ��췽�����ñ��д���İ뾶ֵ����Բ�ζ���
			$this->radius=$sides["radius"];   //�ñ�����������İ뾶ֵ����Ա����radius����ֵ
		}

		function area() {           //��Բ������ļ��㹫ʽ��ʵ�ֽӿ��еĳ��󷽷�area()
			return pi()*$this->radius*$this->radius;   //����Բ�ε����
		}
	
		function perimeter() {      //��Բ������ļ��㹫ʽ��ʵ�ֽӿ��еĳ��󷽷�area()
			return 2*pi()*$this->radius;            //����Բ�ε��ܳ�
		}	
	}	
?>
