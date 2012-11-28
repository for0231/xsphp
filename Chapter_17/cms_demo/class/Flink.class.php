<?php
	/*==================================================================*/
	/*		�ļ���:Flink.class.php                              */
	/*		��Ҫ: �������ӹ�����.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Flink extends BaseLogic {
		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."flink";
			$this->fieldList=array("webName", "url", "logo", "email","dtime", "msg", "list", "ord");
		
		}
	
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['webName'])) {
				$this->messList[] = "��վ���Ʋ���Ϊ��.";
				$result=false;
			}
			if(!Validate::required($_POST['url'])) {
				$this->messList[] = "��վURL����Ϊ��.";
				$result=false;
			}
			if(!Validate::required($_POST['logo'])) {
				$this->messList[] = "��վLOGOͼƬ��ַ����Ϊ��.";
				$result=false;
			}
			if(!Validate::required($_POST['email'])) {
				$this->messList[] = "��վ����Ա�ĵ��������ַ����Ϊ��.";
				$result=false;
			}
			if(Validate::match($_POST['webName'], "|[\\\/\'\"]|")) {
				$this->messList[] = "��վ���ƺ��зǷ��ַ�, ���ܰ���\\ / ' \"���ַ�.";
				$result=false;
			}
		
			if(!Validate::checkLength($_POST['msg'], 200)) {
				$this->messList[] = "��վ�������ܳ���100������.";
				$result=false;
			}
			return  $result;
		}


		function fLinkAdd($post) {	
			$post["dtime"]=time();
			if($this->add($post)){
				$this->messList[] = "����������ӳɹ�.";
				return true;
			}else{
				$this->messList[] = "�����������ʧ��.";
				return false;
			}
		}
		function modFlink($postList){
			if($this->mod($postList)){
				$this->messList[] = "���������޸ĳɹ�.";
				return true;
			}else{
				$this->messList[] = "���������޸�ʧ��.";
				return false;
			}
		}
		function delFlink($id){
			if($this->del($id)){
				$this->messList[] = "��������ɾ���ɹ�.";
				return true;
			}else{
				$this->messList[] = "��������ɾ��ʧ��.";
				return false;
			}
		}
		function getRowTotal(){
			$result=$this->mysqli->query("SELECT * FROM {$this->tabName}");
			return $result->num_rows;	
		}


		function getAllLinks($offset, $num) {
			$sql = "SELECT id, webName, url, dtime,ord FROM {$this->tabName} ORDER BY id DESC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}

		function getLinks() {
			$sql = "SELECT id, webName, url, logo, list FROM {$this->tabName} ORDER BY ord";
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}

		function modOrder($ords, $ids){
			$stmt=$this->mysqli->prepare("UPDATE {$this->tabName} SET ord=? WHERE id=?");
			$stmt->bind_param('ii', $ord, $id);
			
			$affected_rows=0;
			for($i=0; $i<count($ords); $i++){
				$id=$ids[$i];
				$ord=$ords[$i];
				$stmt->execute();
				$affected_rows+=$stmt->affected_rows;
			}
			if($affected_rows > 0) {
				$this->messList[] = "��������˳���޸ĳɹ�.";
				return true;
			}else{
				$this->messList[] = "û����Ҫ�޸ĵ���������˳��.";
				return false;
			}
		}


	}
?>
