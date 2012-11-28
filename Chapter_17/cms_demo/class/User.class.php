<?php
	/*==================================================================*/
	/*		文件名:User.class.php                               */
	/*		概要: 用户管理类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
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
				$this->messList[] = "用户名称不能为空.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['userName'], 20)) {
				$this->messList[] = "用户名称的长度不能大于20.";
				$result=false;
			}
			if(!Validate::required($_POST['userPwd'])) {
				$this->messList[] = "用户密码不能为空.";
				$result=false;
			}
			if($_POST['userPwd']!=$_POST['userpwdok']) {
				$this->messList[] = "两次密码输入不一致.";
				$result=false;
			}
			if(!Validate::required($_POST['email'])) {
				$this->messList[] = "用户电子邮件不能为空.";
				$result=false;
			}
			if(!Validate::match($_POST['email'], "/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/")) {
				$this->messList[] = "不是正确的电子邮件格式.";
				$result=false;
			}
			if($user){
				if($this->getUserName($_POST["userName"])) {
				$this->messList[] = "该用户已经存在.";
				$result=false;
				}
			}	
			if(!$this->checkCode($_POST["vdcode"])) {
				$this->messList[] = "验证码输入错误.";
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
				$this->messList[] = "用户添加成功.";
				return true;
			}else{
				$this->messList[] = "添加用户失败.";
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
			if($result && $result->num_rows>0) {	//登录成功
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
					$this->messList[]="该用户的评论删除成功";
				}
				$this->messList[] = "用户删除成功.";
				return true;
			}else{
				$this->messList[] = "用户删除失败.";
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
				$this->messList[] = "用户修改成功.";
				return true;
			}else{
				$this->messList[] = "用户修改失败.";
				return false;
			}
		}
	}
?>
