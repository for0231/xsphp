<?php
	/*==================================================================*/
	/*		文件名:Comments.class.php                           */
	/*		概要: 文章评论管理类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Comments extends BaseLogic {
		private $tab2Name;
		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."comments";
			$this->tab2Name = TAB_PREFIX."user";
			$this->fieldList=array("uid", "aid", "postTime", "content", "cmt", "support", "oppose");
		}

		function commAdd($post) {	
			$post["postTime"]=time();
			$post["userPwd"]=md5($post["userPwd"]);
			if(!empty($post["quote"])){
				$data=$this->getQuote($post["quote"]);
				$quote='<table style="border-right: #cccccc 1px dotted; table-layout: fixed; border-top: #cccccc 1px dotted; border-left: #cccccc 1px dotted; border-bottom: #cccccc 1px dotted" cellspacing="0" cellpadding="6" width="95%" align="center" border="0">
    			<tbody>
       				 <tr>
				 <td style="word-wrap: break-word;font-size:12px" bgcolor="#fdfddf">
				['.$data["username"].'] 于 '.date("m-d i:s", $data["postTime"]).' 时发布的原贴：
					<br />
					'.$data["content"].'
           				 &nbsp;</td>
        			</tr>
  		 	 </tbody>
		</table><br>';

				$post["content"]=$quote.$post["content"];
			}

			return $this->add($post);
		}
		private function getQuote($cid){
			$sql="SELECT u.userName username,c.postTime postTime, c.content content FROM {$this->tabName} c, {$this->tab2Name} u WHERE c.uid=u.id AND c.id={$cid}";
			$result=$this->mysqli->query($sql);
			if($result){
				return $result->fetch_assoc();
			}
		}
			
		function getComm($aid, $offset, $num){
			$sql="SELECT c.id,u.userName username,c.postTime postTime, c.content content, c.cmt cmt, c.support support, c.oppose oppose FROM {$this->tabName} c, {$this->tab2Name} u WHERE c.uid=u.id AND c.aid={$aid} ORDER BY c.id DESC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()) {
				$data[]=$row;
			}
			return $data;
		}

		function getTotal($aid){
			$result=$this->mysqli->query("SELECT * FROM {$this->tabName} WHERE aid={$aid}");
			return $result->num_rows;
		}

		function delCommByUid($id, $aid=false){
			if(is_array($id))
				$tmp = "IN (" . join(",", $id) . ")";
			else 
				$tmp = "= $id";

			if($aid)
				$sql = "DELETE FROM {$this->tabName} WHERE aid " . $tmp ;
			else
				$sql = "DELETE FROM {$this->tabName} WHERE uid " . $tmp ;

			$result=$this->mysqli->query($sql);	

			if($result && $this->mysqli->affected_rows >0){
				return true;
			}else{
				return false;
			}
		}

		function setSupport($cid, $num){
			if($num==1){
				$sql1="UPDATE {$this->tabName} SET support=support+1 WHERE id={$cid}";
				$sql2="SELECT support FROM {$this->tabName} WHERE id={$cid}";
			}else if($num==2){
				$sql1="UPDATE {$this->tabName} SET oppose=oppose+1 WHERE id={$cid}";
				$sql2="SELECT oppose FROM {$this->tabName} WHERE id={$cid}";
			}
			$this->mysqli->query($sql1);
			$result=$this->mysqli->query($sql2);
			if($result){
				$data=$result->fetch_row();
				return $data[0];
			}
		}

	}
?>
