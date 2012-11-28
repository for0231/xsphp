<?php
	class Form {             //����һ������
		private $formName;   //�����ʱ���û�ѡ��ͼ�ε�����
		private $request;      //�����Ա������һ�����飬�������û��ύ������ֵ
		private $action;       //���ύ��URL
		private $method;      //�����ύ����
		private $target;        //�����Ŀ�꣬�����Լ�ҳ�滹�ǵ���һ���µ�ҳ��
		
         	//���췽���ڴ�������ʱ����������Ҫ�����и���Ա���Գ�ʹ���Ĳ���ֵ
		function __construct($formName, $request, $action="index.php", $method="get", $target="_self")
		{
			$this->formName=$formName;     //����Ա�����б������Ƹ���ֵ
			$this->request=$request;          //����Ա�����б������Ƹ���ֵ
			$this->action=$action;            //����Ա�����б������Ƹ���ֵ
			$this->method=$method;        //����Ա�����б������Ƹ���ֵ
			$this->target=$target;           //����Ա�����б������Ƹ���ֵ
		}

		function __toString() {      //��ֱ�������������ʱ�Զ����ã�����һ��HTML���ַ���
			$str='<table align=center border=0 width=400>';           //�ñ�����������Ĳ���
			$str.='<caption><h3>'.$this->formName.'</h3></caption>';  //�Ա�����ʽ���ͼ������
			$str.='<form action='.$this->action.' method='.$this->method.' target='.$this->target.'>'; //�����
		
			switch($this->request["action"]) {    //�����û��������ṩ���û���Ӧ�������
				case 1:           //����û�ѡ�������Ҫ���û�������εĸ߶ȺͿ��
					$str.='<tr><th>���θ߶ȣ�</th><td>';
					$str.='<input type="text" name="height" value='.$this->request["height"].'>';
					$str.='</td></tr>';
					$str.='<tr><th>���ο�ȣ�</th><td>';
					$str.='<input type="text" name="width" value='.$this->request["width"].'>';
					$str.='</td></tr>';
					break;
				case 2:          //����û�ѡ����������Ҫ���û����������ε�������
					$str.='<tr><th>��һ���ߣ�</th><td>';
					$str.='<input type="text" name="side1" value='.$this->request["side1"].'>';
					$str.='</td></tr>';
					$str.='<tr><th>�ڶ����ߣ�</th><td>';
					$str.='<input type="text" name="side2" value='.$this->request["side2"].'>';
					$str.='</td></tr>';
					$str.='<tr><th>�������ߣ�</th><td>';
					$str.='<input type="text" name="side3" value='.$this->request["side3"].'>';
					$str.='</td></tr>';
					break;
				case 3:         //����û�ѡ��Բ����Ҫ���û�����Բ�εİ뾶
					$str.='<tr><th>Բ�İ뾶��</th><td>';
					$str.='<input type="text" name="radius" value='.$this->request["radius"].'>';
					$str.='</td></tr>';
					break;
			}
			$str.='<tr><td align=center colspan=2><input type="submit" value="����"></td></tr>';
			$str.='<input type="hidden" name="act" value='.$this->request["action"].'>';    //���ر�
			$str.='<input type="hidden" name="action" value='.$this->request["action"].'>';  //���ر�
			$str.='</form>';
			$str.='</table>';
			
			return $str;	      //�����γɱ����ַ�������������������������þͿ��Ի�ȡ��
		}
	}
?>
