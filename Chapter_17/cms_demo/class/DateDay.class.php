<?php
	/*==================================================================*/
	/*		文件名:DateDay.class.php                            */
	/*		概要: 日期时间类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class DateDay {
		private $date;
		private $day;
		function __construct(){
			$this->date=date("Y年m月d日");
			$this->day=$this->getDay();
		}

		private function getDay(){
			$week = array("星期天","星期一","星期二","星期三","星期四","星期五","星期六");
			return $week[date("w")];
		}

		public function getDateDay() {
			return $this->date."&nbsp;".$this->day;
		}
		
	}
?>
