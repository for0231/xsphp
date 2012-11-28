<?php
	/*==================================================================*/
	/*		�ļ���:BaseLogic.class.php                          */
	/*		��Ҫ: ���ݴ�������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class BaseLogic extends MyDB {
		protected $tabName;		//�������
		protected $fieldList;
		protected $messList;

		//==========================================
		// ����: add($postList)
		// ����: ���
		// ����: $postList �ύ�ı����б�
		// ����: �ղ��������ID
		//==========================================
		function add($postList) {
			$fieldList='';
			$value='';
			foreach ($postList as $k=>$v) {
				if(in_array($k, $this->fieldList)){
					$fieldList.=$k.",";
					if (!get_magic_quotes_gpc())
						$value .= "'".addslashes($v)."',";
					else
						$value .= "'".$v."',";
				}
			}

			$fieldList=rtrim($fieldList, ",");
			$value=rtrim($value, ",");

			$sql = "INSERT INTO {$this->tabName} (".$fieldList.") VALUES(".$value.")";
			$result=$this->mysqli->query($sql);

			if($result && $this->mysqli->affected_rows >0 ) 
				return $this->mysqli->insert_id;
			else
				return false;
		}


		//==========================================
		// ����: mod($postList)
		// ����: �޸ı�����
		// ����: $postList �ύ�ı����б�
		//==========================================
		function mod($postList) {
			$id=$postList["id"];
			unset($postList["id"]);
			$value='';
			foreach ($postList as $k=>$v) {
				if(in_array($k, $this->fieldList)){
					if (!get_magic_quotes_gpc())
						$value .= $k." = '".addslashes($v)."',";
					else
						$value .= $k." = '".$v."',";
				}
			}
			$value=rtrim($value, ",");
			$sql = "UPDATE {$this->tabName} SET {$value} WHERE id={$id}";
			return $this->mysqli->query($sql);	
		}
	
		//==========================================
		// ����: del($id)
		// ����: ɾ��
		// ����: $id ��Ż�ID�б�����
		// ����: 0 ʧ�� �ɹ�Ϊɾ���ļ�¼��
		//==========================================
		function del($id) {
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";
			
			$sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp ;
			return $this->mysqli->query($sql);	
		
		}

		
		function get($id) {
			$sql = "SELECT * FROM {$this->tabName} WHERE id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
	
		}
		function getMessList(){
			$message="";
			if(!empty($this->messList)){
				foreach($this->messList as $value){
					$message.=$value."<br>";
				}
			}
			return $message; 	
		}
	}
?>
