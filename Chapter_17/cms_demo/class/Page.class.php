<?php
	/*==================================================================*/
	/*		文件名:Page.class.php                               */
	/*		概要: 分页处理类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Page {
		private $total;     //查询所有的数据总记录数
		private $page;      //当前第几页
		private $num;       //每页显示记录的条数
		private $pageNum;   //一共多少页
		private $offset;    //从数据库中取记录的开始偏移数

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
		//数据库查询的偏移量
		private function getOffset() {
			return ($this->page-1)*$this->num;
		}
		//当前页开始的记录数
		private function getStartNum() {
			if($this->total==0)
				return 0;
			else 
				return $this->offset+1;
		}
		//当前页结束的记录数
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
