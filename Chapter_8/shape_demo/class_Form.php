<?php
	class Form {             //声明一个表单类
		private $formName;   //输出表单时，用户选择图形的名称
		private $request;      //这个成员属性是一个数组，包含了用户提交的所有值
		private $action;       //表单提交的URL
		private $method;      //表单的提交方法
		private $target;        //输出的目标，是在自己页面还是弹出一个新的页面
		
         	//构造方法在创建对象时，传入所需要的所有给成员属性初使化的参数值
		function __construct($formName, $request, $action="index.php", $method="get", $target="_self")
		{
			$this->formName=$formName;     //给成员属性中表单的名称赋初值
			$this->request=$request;          //给成员属性中表单的名称赋初值
			$this->action=$action;            //给成员属性中表单的名称赋初值
			$this->method=$method;        //给成员属性中表单的名称赋初值
			$this->target=$target;           //给成员属性中表单的名称赋初值
		}

		function __toString() {      //当直接输出对象引用时自动调用，返回一个HTML表单字符串
			$str='<table align=center border=0 width=400>';           //用表格控制输出表单的部局
			$str.='<caption><h3>'.$this->formName.'</h3></caption>';  //以标题形式输出图形名称
			$str.='<form action='.$this->action.' method='.$this->method.' target='.$this->target.'>'; //表单标记
		
			switch($this->request["action"]) {    //根据用户的请求提供给用户相应的输入表单
				case 1:           //如果用户选择矩形则要求用户输入矩形的高度和宽度
					$str.='<tr><th>矩形高度：</th><td>';
					$str.='<input type="text" name="height" value='.$this->request["height"].'>';
					$str.='</td></tr>';
					$str.='<tr><th>矩形宽度：</th><td>';
					$str.='<input type="text" name="width" value='.$this->request["width"].'>';
					$str.='</td></tr>';
					break;
				case 2:          //如果用户选择三角形则要求用户输入三角形的三个边
					$str.='<tr><th>第一条边：</th><td>';
					$str.='<input type="text" name="side1" value='.$this->request["side1"].'>';
					$str.='</td></tr>';
					$str.='<tr><th>第二条边：</th><td>';
					$str.='<input type="text" name="side2" value='.$this->request["side2"].'>';
					$str.='</td></tr>';
					$str.='<tr><th>第三条边：</th><td>';
					$str.='<input type="text" name="side3" value='.$this->request["side3"].'>';
					$str.='</td></tr>';
					break;
				case 3:         //如果用户选择圆形则要求用户输入圆形的半径
					$str.='<tr><th>圆的半径：</th><td>';
					$str.='<input type="text" name="radius" value='.$this->request["radius"].'>';
					$str.='</td></tr>';
					break;
			}
			$str.='<tr><td align=center colspan=2><input type="submit" value="计算"></td></tr>';
			$str.='<input type="hidden" name="act" value='.$this->request["action"].'>';    //隐藏表单
			$str.='<input type="hidden" name="action" value='.$this->request["action"].'>';  //隐藏表单
			$str.='</form>';
			$str.='</table>';
			
			return $str;	      //返回形成表单的字符串，在主程序中输出对象引用就可以获取到
		}
	}
?>
