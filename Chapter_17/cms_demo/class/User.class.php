<?php
	/*==================================================================*/
	/*		�ļ���:User.class.php                               */
	/*		��Ҫ: �û�������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class User extends BaseLogic {
		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."user";
			$this->fieldList=array("userName", "userPwd", "email","safequestion", "safeanswer", "sex", "regTime");
		}

	
		function validateForm($user=1){
			$result=true;
			if(!Validate::required($_POST['userName'])) {
				$this->messList[] = "�û����Ʋ���Ϊ��.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['userName'], 20)) {
				$this->messList[] = "�û����Ƶĳ��Ȳ��ܴ���20.";
				$result=false;
			}
			if(!Validate::required($_POST['userPwd'])) {
				$this->messList[] = "�û����벻��Ϊ��.";
				$result=false;
			}
			if($_POST['userPwd']!=$_POST['userpwdok']) {
				$this->messList[] = "�����������벻һ��.";
				$result=false;
			}
			if(!Validate::required($_POST['email'])) {
				$this->messList[] = "�û������ʼ�����Ϊ��.";
				$result=false;
			}
			if(!Validate::match($_POST['email'], "/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/")) {
				$this->messList[] = "������ȷ�ĵ����ʼ���ʽ.";
				$result=false;
			}
			if($user){
				if($this->getUserName($_POST["userName"])) {
				$this->messList[] = "���û��Ѿ�����.";
				$result=false;
				}
			}	
			if(!$this->checkCode($_POST["vdcode"])) {
				$this->messList[] = "��֤���������.";
				$result=false;
			}

			return  $result;
		}
		

		function getUserName($username){
			$result=$this->mysqli->query("SELECT userName FROM {$this->tabName} WHERE userName='{$username}'");
			if($result->num_rows>0){
				return true;
			}else{
				return false;
			}
		}

		private function checkCode($vdcode){
			if(trim($vdcode)==$_SESSION['validationcode']){
				return true;
			}else{ 
				return false;
			}
		}


		function userAdd($post) {	
			$post["regTime"]=time();
			$post["userPwd"]=md5($post["userPwd"]);
			if($this->add($post)){
				$this->messList[] = "�û���ӳɹ�.";
				return true;
			}else{
				$this->messList[] = "����û�ʧ��.";
				return false;
			}
		}

	
		function login($uname, $pwd, $admin=null) {	
			if(empty($admin)){
				$sql = "SELECT id FROM {$this->tabName} WHERE userName = '{$uname}' AND userPwd = MD5('{$pwd}')";			
			}else if($admin="admin"){
				$sql = "SELECT id FROM {$this->tabName} WHERE userName = '{$uname}' AND userPwd = MD5('{$pwd}') AND id=1";			
			}
			$result=$this->mysqli->query($sql);
			if($result && $result->num_rows>0) {	//��¼�ɹ�
				$data=$result->fetch_assoc();
				$_SESSION['isLogin'] = true;
				$_SESSION['uid']     = $data['id'];
				$_SESSION['uname']   = $uname;
				return 1;
			}else{
				return 0;
			}
		}

		function logout() {
			$_SESSION = array();
			if (isset($_COOKIE[session_name()])) {
   				setcookie(session_name(), '', time()-42000, '/');
			}
			session_destroy();
		}

		function isLogin() {
			if(!empty($_SESSION['isLogin']))
				return 1;	
			else
				return 0;
		}
		function delUser($id){
			if($this->del($id)){
				$comment=new Comments();
				if($comment->delCommByUid($id)){
					$this->messList[]="���û�������ɾ���ɹ�";
				}
				$this->messList[] = "�û�ɾ���ɹ�.";
				return true;
			}else{
				$this->messList[] = "�û�ɾ��ʧ��.";
				return false;
			}
		}

		function getRowTotal(){
			$result=$this->mysqli->query("SELECT * FROM {$this->tabName}");
			return $result->num_rows;	
		}

		function getAllUsers($offset, $num) {
			$sql = "SELECT id, userName, email, regTime FROM {$this->tabName} ORDER BY id ASC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}
		function modUser($postList){
			$postList["userPwd"]=md5($postList["userPwd"]);
			if($this->mod($postList)){
				$this->messList[] = "�û��޸ĳɹ�.";
				return true;
			}else{
				$this->messList[] = "�û��޸�ʧ��.";
				return false;
			}
		}
	}
?>
