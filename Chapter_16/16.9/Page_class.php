<?php
	class Page {                  		//��ҳ��
		private $total;            	//�������е����ݱ��¼��������
		private $page;            	//���浱ǰ�ڼ�ҳ
		private $num;            	//����ÿҳ��ʾ��¼������
		private $pageNum;        	//����һ������Ϊ����ҳ������
		private $offset;           	//��������ݿ���ȡ��¼�Ŀ�ʼƫ����
         	/* ����Ĺ��췽������������ʱ������ʹ����Ա���� */
		/* ����total����Ҫ�ṩһ���ݱ�ļ�¼����        */
		/* ����page����Ҫ�ṩһ����ǰҳ����             */
		/* ����num����Ҫ�ṩÿҳ��ʾ��¼������          */
		function __construct($total, $page=1, $num=5) {
			$this->total=$total;                    //Ϊ��Ա����$totalͨ���ṩ�Ĳ�����ʹ��
			$this->page=$page;                   	//Ϊ��Ա����$pageͨ���ṩ�Ĳ�����ʹ��
			$this->num=$num;                   	//Ϊ��Ա����$numͨ���ṩ�Ĳ�����ʹ��
			$this->pageNum=$this->getPageNum();  	//Ϊ����$pageNumͨ�������ڲ�������ʹ��
			$this->offset=$this->getOffset();	//Ϊ����$offsetͨ�������ڲ�������ʹ��
		}
		private function getPageNum(){             	//���ø÷������ؼ�����ҳ������
			return ceil($this->total/$this->num);   //���ݼ�¼������ÿҳ��ʾ��¼�ĸ�������
		}
		private function getNextPage() {             	//���ø÷���������һҳ��ҳ������
			if($this->page==$this->pageNum)       	//�ж��Ƿ������һҳ
				return false;                   //��������һҳ����û����һҳ������false
			else                                	//�������һҳ
				return $this->page+1;           //������һҳ������ҳ������
		}	
		private function getPrevPage() {             	//���ø÷���������һҳ��ҳ����������
			if($this->page==1)                   	//��������ǵ�һҳ
				return false;                   //û����һҳ���򷵻�false
			else                               	//������ǵ�һҳ����������һҳ
				return $this->page-1;           //������һҳ��ҳ����������
		}
		private function getOffset() {               	//���ø÷����������ݿ��ѯ����Ҫ��ƫ����
			return ($this->page-1)*$this->num;      //���������ݱ��п�ʼ��ѯ��λ��
		}
		private function getStartNum() {            	//���ø÷������ص�ǰҳ��ʼ�ļ�¼ƫ����
			if($this->total==0)                  	//������ݱ���û�м�¼
				return 0;                       //����0
			else                               	//������ݱ����м�¼
				return $this->offset+1;         //���ص�ǰҳ��ʼ�ļ�¼ƫ����
		}
		private function getEndNum() {            	//����ʱ���ص�ǰҳ�����ļ�¼ƫ����
			return min($this->offset+$this->num,$this->total);   //���㲢���ؽ�����λ��
		}
         	/* �÷�����Ψһ�����ڶ����ⲿ���õĹ��з���                */
		/* �÷����Ὣ���к͵�ǰҳ���й�ϵ��ֵ����һ������һ�𷵻�  */
		public function getPageInfo(){             
			$pageInfo=array(                            		//����һ��������������Ϣ
					"row_total" => $this->total,          	//������ݱ��м�¼��������
					"row_num" => $this->num,          	//���ÿҳ��ʾ������
					"page_num" => $this->getPageNum(),  	//����Ϊ����ҳ����Ϣ
					"current_page"	=> $this->page,      	//��ǰҳ������
					"row_offset" => $this->getOffset(),     //��ǰҳ��ʼ��ƫ��λ��
					"next_page" => $this->getNextPage(),  	//��һҳ�������ҳ����������
					"prev_page" => $this->getPrevPage(),    //��һҳ�������ҳ����������
					"page_start" => $this->getStartNum(),   //��ǰҳ�濪ʼ�ļ�¼λ��
					"page_end" => $this->getEndNum()   	//��ǰҳ�������ҳ��λ��
				);
			return $pageInfo;                   		//����ź͵�ǰҳ�йص�������Ϣ���鷵��
		}	
	}
?>
