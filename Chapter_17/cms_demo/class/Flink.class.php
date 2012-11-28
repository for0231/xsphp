<?php
	/*==================================================================*/
	/*		文件名:Flink.class.php                              */
	/*		概要: 友情链接管理类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
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
				$this->messList[] = "网站名称不能为空.";
				$result=false;
			}
			if(!Validate::required($_POST['url'])) {
				$this->messList[] = "网站URL不能为空.";
				$result=false;
			}
			if(!Validate::required($_POST['logo'])) {
				$this->messList[] = "网站LOGO图片地址不能为空.";
				$result=false;
			}
			if(!Validate::required($_POST['email'])) {
				$this->messList[] = "网站管理员的电子邮箱地址不能为空.";
				$result=false;
			}
			if(Validate::match($_POST['webName'], "|[\\\/\'\"]|")) {
				$this->messList[] = "网站名称含有非法字符, 不能包含\\ / ' \"等字符.";
				$result=false;
			}
		
			if(!Validate::checkLength($_POST['msg'], 200)) {
				$this->messList[] = "网站描述不能超过100个汉字.";
				$result=false;
			}
			return  $result;
		}


		function fLinkAdd($post) {	
			$post["dtime"]=time();
			if($this->add($post)){
				$this->messList[] = "添加友情链接成功.";
				return true;
			}else{
				$this->messList[] = "友情链接添加失败.";
				return false;
			}
		}
		function modFlink($postList){
			if($this->mod($postList)){
				$this->messList[] = "友情链接修改成功.";
				return true;
			}else{
				$this->messList[] = "友情链接修改失败.";
				return false;
			}
		}
		function delFlink($id){
			if($this->del($id)){
				$this->messList[] = "友情链接删除成功.";
				return true;
			}else{
				$this->messList[] = "友情链接删除失败.";
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
				$this->messList[] = "友情链接顺序修改成功.";
				return true;
			}else{
				$this->messList[] = "没有需要修改的友情链接顺序.";
				return false;
			}
		}


	}
?>
