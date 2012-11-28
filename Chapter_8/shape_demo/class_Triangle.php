<?php
	class Triangle implements Shape {  	//������һ������������ʵ������״�ӿ��е��ܳ������
		private $side1;                //���������ε�һ���ߵĳ�Ա����
		private $side2;                //���������εڶ����ߵĳ�Ա����
		private $side3;                //���������ε������ߵĳ�Ա����

		function __construct($sides="") {    //�����εĹ��췽�����ñ��д��������ֵ���������ζ���
			$this->side1=$sides["side1"];    //�ñ�����������ĵ�һ���߳�����Ա����side1����ֵ
			$this->side2=$sides["side2"];    //�ñ�����������ĵڶ����߳�����Ա����side2����ֵ
			$this->side3=$sides["side3"];    //�ñ�����������ĵ������߳�����Ա����side3����ֵ
		}

		function area() {           //������������ļ��㹫ʽ��ʵ�ֽӿ��еĳ��󷽷�area()
			$s=($this->side1+$this->side2+$this->side3)/2;
			return sqrt( $s*($s - $this->side1)*($s - $this->side2)*($s - $this->side3) );  //���������ε����
		}
	
		function perimeter() {     //���������ܳ��ļ��㹫ʽ��ʵ�ֽӿ��еĳ��󷽷�perimeter()
			return  $this->side1+$this->side2+$this->side3;        //���������ε��ܳ�
		}
	}
?>
