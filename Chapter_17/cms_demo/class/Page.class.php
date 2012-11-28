<?php
	/*==================================================================*/
	/*		�ļ���:Page.class.php                               */
	/*		��Ҫ: ��ҳ������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Page {
		private $total;     //��ѯ���е������ܼ�¼��
		private $page;      //��ǰ�ڼ�ҳ
		private $num;       //ÿҳ��ʾ��¼������
		private $pageNum;   //һ������ҳ
		private $offset;    //�����ݿ���ȡ��¼�Ŀ�ʼƫ����

		function __construct($total, $page=1, $num=5) {
			$this->total=$total;
			$this->page=$page;
			$this->num=$num;
			$this->pageNum=$this->getPageNum();
			$this->offset=$this->getOffset();	
		}

		private function getPageNum(){
			return ceil($this->total/$this->num);
		}

		private function getNextPage() {
			if($this->page==$this->pageNum)
				return false;
			else
				return $this->page+1;
		}	

		private function getPrevPage() {
			if($this->page==1) 
				return false;
			else
				return $this->page-1;
		}
		//���ݿ��ѯ��ƫ����
		private function getOffset() {
			return ($this->page-1)*$this->num;
		}
		//��ǰҳ��ʼ�ļ�¼��
		private function getStartNum() {
			if($this->total==0)
				return 0;
			else 
				return $this->offset+1;
		}
		//��ǰҳ�����ļ�¼��
		private function getEndNum() {
			return min($this->offset+$this->num,$this->total);
		}
		
		public function getPageInfo(){
			$pageInfo=array(
					"row_total" => $this->total,
					"row_num" => $this->num,
					"page_num" => $this->getPageNum(),
					"current_page"	=> $this->page,
					"row_offset" => $this->getOffset(),
					"next_page" => $this->getNextPage(),
					"prev_page" => $this->getPrevPage(),
					"page_start" => $this->getStartNum(),
					"page_end" => $this->getEndNum()
				);
			return $pageInfo;
		}	
	}
?>
