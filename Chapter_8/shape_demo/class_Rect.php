<?php	
	class Rect implements Shape {  	//������һ����������ʵ������״�ӿ��е��ܳ������
		private $width;           //�������εĳ�Ա���Կ��
		private $height;         //�������εĳ�Ա���Ը߶�

		function __construct($sides="") {     //���εĹ��췽�����ñ��д���ĸ߶ȺͿ�ȴ������ζ���
			$this->width=$sides["width"];   //�ñ�����������Ŀ�ȸ���Ա����width����ֵ
			$this->height=$sides["height"];  //�ñ�����������ĸ߶ȸ���Ա����height����ֵ
		}

		function area() {                      //����������ļ��㹫ʽ��ʵ�ֽӿ��еĳ��󷽷�area()
			return $this->width*$this->height;   //���ʸ÷���ʱ�����ؾ��ε����
		}
	
		function perimeter() {         //�������ܳ��ļ��㹫ʽ��ʵ�ֽӿ��еĳ��󷽷�perimeter()
			return 2*($this->width+$this->height);   //���ʸ÷���ʱ�����ؾ��ε��ܳ�
		}
	}
?>
