<?php
	/*==================================================================*/
	/*		�ļ���:DateDay.class.php                            */
	/*		��Ҫ: ����ʱ����.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class DateDay {
		private $date;
		private $day;
		function __construct(){
			$this->date=date("Y��m��d��");
			$this->day=$this->getDay();
		}

		private function getDay(){
			$week = array("������","����һ","���ڶ�","������","������","������","������");
			return $week[date("w")];
		}

		public function getDateDay() {
			return $this->date."&nbsp;".$this->day;
		}
		
	}
?>
