<?php
	class MyDB{
		private $mysqli;                     		//����mysqli��չ�е�mysqli����   
         	/* ����Ĺ��췽������������mysqli�������ӵ����ݿ⣬�ͳ�ʹ��һЩ��Ա���� */
		public function __construct() {
			$this->mysqli=new mysqli("localhost", "mysql_user", "mysql_pwd", "products");  
			if(mysqli_connect_errno()) {       	//�������ʧ�ܴ�ӡ������Ϣ���˳�����
				echo "����ʧ�ܣ�ԭ��Ϊ��".mysqli_connect_error();
				$this->mysqli=FALSE;      	//��mysqli������falseֵ
				exit();                    	//�˳�����
			}		
			$this->showError=$showError;    	//Ϊ��Ա����showError����ֵ
		}
		public function __destruct() {          	//�������������
			$this->close();                 	//�����󲻿���ʱ�Զ����ñ����е�close()����
		}
		public function close() {             		//���ø÷����ر������ݿ�����Ӳ��ͷ���Դ
			if($this->mysqli)              		//���mysqli������������ɹ�
				$this->mysqli->close();    	//����mysqli�����е�class()�����ر����ݿ�
			$this->mysqli=FALSE;         		//����Ա����mysqli����FALSEֵ
		}
		public function getRowTotal(){       		//���ø÷���������Ʒ��product�м�¼����
			$result=$this->mysqli->query("select * from Product");  //ִ��Select���
			return $result->num_rows;	                        //���ؽ�����еļ�¼����
		}
		public function getPageRows($offset, $num){   	//��ȡָ��һ�εļ�¼
			$query="SELECT productID,name,price,description FROM product ORDER BY productID LIMIT $offset, $num";
			if($result=$this->mysqli->query($query)){   	//ִ��Select����ȡָ��һ�μ�¼
				while($row=$result->fetch_assoc())    	//�ӽ�����б�����ÿһ�м�¼
					$allProduct[]=$row;             //��ÿ�м�¼����ӵ�$allProduct������
				$result->close();                    	//�رս����
				return $allProduct;                  	//����ָ��һҳ�������м�¼
			}else{                                 		//�����ѯ���ɹ�
				return FALSE;                      	//����falseֵ
			}
		}
	}
?>
