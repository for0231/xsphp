<?php
	/*==================================================================*/
	/*		�ļ���:Article.class.php                            */
	/*		��Ҫ: ���¹�����.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Article extends BaseLogic {
		private $comment;
		
		//==========================================
		// ����:  __construct($showError=TRUE)
		// ����: ��ʹ�������Ա
		// ����: $showError�û������Ƿ���ʾ���󱨸���ʾ
		// ����: ��
		//==========================================
		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."article";
			$this->comment=new Comments();
			$this->fieldList=Array("title","summary","postTime","author","comeFrom","views", "content","keyword","catId","audit","recommend");
		}

		//==========================================
		// ����: addArticle($post)
		// ����: ���������ݿ����������
		// ����: post���û��ڱ����ύ������ȫ����������
		// ����:true��false
		//==========================================	
		function addArticle($post) {
			$post["content"]=stripslashes($post["content"]);
			if($this->add($post)){
				$this->messList[] = "�ĵ���ӳɹ�.";
				return true;
			}else{
				$this->messList[] = "�ĵ����ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����:  modArticle($postList)
		// ����: �û��޸�ָ��������
		// ����: postList���û��޸����±��е���������
		// ����: true��false
		//==========================================
		function modArticle($postList){
			if($this->mod($postList)){
				$this->messList[] = "�ĵ��޸ĳɹ�.";
				return true;
			}else{
				$this->messList[] = "�ĵ��޸�ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����: delArticle($id)
		// ����: ����ɾ��ָ��������
		// ����: id��ָ����ɾ��������ID
		// ����: true��false
		//==========================================
		function delArticle($id){
			if($this->del($id)){
				if($this->comment->delCommByUid($id, true)){
					$this->messList[] = "�ĵ�������ɾ���ɹ�.";
				}
				$this->messList[] = "�ĵ�ɾ���ɹ�.";
				return true;
			}else{
				$this->messList[] = "�ĵ�ɾ��ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����: delArticleByCid($cid)
		// ����: �������µ����IDɾ��������µ��������º����µ�����
		// ����: cid��������������ID
		// ����:true��false
		//==========================================
		function delArticleByCid($cid){
			if(is_array($cid))
				$tmp = "IN (" . join(",", $cid) . ")";
			else 
				$tmp = "= $cid";
			
			$sql = "DELETE FROM {$this->tabName} WHERE catId " . $tmp ;

			$res=$this->mysqli->query("SELECT id FROM {$this->tabName} WHERE catId " . $tmp);
			while($idArr=$res->fetch_assoc()){
				$ids[]=$idArr["id"];
			}
			if($this->comment->delCommByUid($ids, true)){
				$this->messList[] = "�ĵ�������ɾ���ɹ�.";
			}
			$result=$this->mysqli->query($sql);	

			if($result && $this->mysqli->affected_rows >0){
				return true;
			}else{
				return false;
			}
		}
		
		//==========================================
		// ����: getRecommend($catId=0,$offset=0, $num=10)
		// ����: ��ȡ�Ƽ�����
		// ����: catId���������ID��offset����ȡ���µ�ƫ��λ�ã�num�ǻ�ȡ���µļ�¼����
		// ����: ָ�����������¼�¼����
		//==========================================
		function getRecommend($catId=0,$offset=0, $num=10){
			if($catId !=0 ){
				$sql = "SELECT id, title,author,postTime,audit FROM {$this->tabName}
				WHERE catId={$catId} and recommend=1  and audit=1 ORDER BY id DESC LIMIT $offset, $num";
			}else{	
				$sql = "SELECT id, title,author,postTime,audit FROM {$this->tabName}
				WHERE recommend=1  and audit=1 ORDER BY id DESC LIMIT $offset, $num";
			}

			$result=$this->mysqli->query($sql);

			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}
		//==========================================
		// ����: getNew($offset=0, $num=10)
		// ����: ��ȡ������£���һ��֮�ڵĸ���
		// ����: offset����ȡ���µ�ƫ��λ�ã�num�ǻ�ȡ���µļ�¼����
		// ����: ָ�����������¼�¼����
		//==========================================
		function getNew($offset=0, $num=10){
			$sql = "SELECT id, title,author,postTime,audit FROM {$this->tabName}
				WHERE postTime > ".(time()-60*60*24*7)." and audit=1 ORDER BY postTime DESC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);

			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}
		//==========================================
		// ����: getHot($catId=0,$offset=0, $num=10)
		// ����: ��ȡ�����������£���һ��֮�ڵ�
		// ����: catId���������ID��offset����ȡ���µ�ƫ��λ�ã�num�ǻ�ȡ���µļ�¼����
		// ����: ָ�����������¼�¼����
		//==========================================
		function getHot($catId=0,$offset=0, $num=10){
			if($catId !=0 ){
				$sql = "SELECT id, title,author,postTime,audit FROM {$this->tabName}
				WHERE catId={$catId} and audit=1 and postTime > ".(time()-60*60*24*30)." ORDER BY views DESC LIMIT $offset, $num";
			}else{
				$sql = "SELECT id, title,author,postTime,audit FROM {$this->tabName}
				WHERE postTime > ".(time()-60*60*24*30)."  and audit=1 ORDER BY views DESC LIMIT $offset, $num";
			}
			$result=$this->mysqli->query($sql);

			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}
		//==========================================
		// ����: getRowTotal($catId)
		// ����: ��ȡָ����������µ����¼�¼���������ڷ�ҳ��ʹ��
		// ����: catId�����µ����ID
		// ����: ��¼����
		//==========================================
		function getRowTotal($catId){
			$result=$this->mysqli->query("SELECT * FROM {$this->tabName} WHERE  catId={$catId}");
			return $result->num_rows;	
		}	
		//==========================================
		// ����: getAllArts($catId, $offset, $num)
		// ����: ��ȡ��������
		// ����: catId���������ID��offset����ȡ���µ�ƫ��λ�ã�num�ǻ�ȡ���µļ�¼����
		// ����: ָ�����������¼�¼����
		//==========================================
		function getAllArts($catId, $offset, $num) {
			$sql = "SELECT id, title,author,postTime,audit FROM {$this->tabName}
				WHERE catId={$catId} ORDER BY id DESC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);

			while($row=$result->fetch_assoc()){
				$row["comms"]=$this->comment->getTotal($row["id"]);
				$data[]=$row;
			}
			return $data;
		}
		//==========================================
		// ����:  getAuditArts($catId, $offset=0, $num=10)
		// ����: ��ȡ������˹�������
		// ����: catId���������ID��offset����ȡ���µ�ƫ��λ�ã�num�ǻ�ȡ���µļ�¼����
		// ����: ָ�����������¼�¼����
		//==========================================
		function getAuditArts($catId, $offset=0, $num=10) {
			$sql = "SELECT id, title,author,postTime FROM {$this->tabName}
				WHERE catId={$catId} and audit=1 ORDER BY id DESC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);

			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}
		//==========================================
		// ����: auditArticle($id)
		// ����: �����½������
		// ����: id����Ҫ��˵�����ID
		// ����: true��false
		//==========================================
		function auditArticle($id) {
			$sql = "UPDATE {$this->tabName} SET audit=1 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "��˳ɹ�.";
				return true;
			}else{
				$this->messList[] = "���ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����: lockArticle($id)
		// ����: �û�����ָ��������
		// ����: id����Ҫ���������µ�ID
		// ����: true��false
		//==========================================
		function lockArticle($id) {
			$sql = "UPDATE {$this->tabName} SET audit=0 WHERE id ";
			if(is_array($id)) {
				$sql .= "IN (" . join(",", $id) . ")";

			}else{
				$sql .= "= $id";
			}

			if($this->mysqli->query($sql)){
				$this->messList[] = "�����ɹ�.";
				return true;
			}else{
				$this->messList[] = "����ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����: getArticleTitle($id)
		// ����: ��ȡָ�����µı���
		// ����: id����Ҫ����ȡ���µ�ID
		// ����:�ɹ��������µı��⣬ʧ���򷵻�false
		//==========================================
		function getArticleTitle($id){
			$sql = "SELECT id, title FROM {$this->tabName} WHERE id ={$id}";
			
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
		}
		//==========================================
		// ����:  setViews($id)
		// ����: �û��������µķ��ʴ���
		// ����: id�Ǳ��������µ�ID
		// ����:��
		//==========================================
		function setViews($id){
			$this->mysqli->query("UPDATE {$this->tabName} SET views=views+1 WHERE id={$id}");
		}
		//==========================================
		// ����: getNextArticle($colId, $id)
		// ����: ��ȡ��Ӧָ�����µ���һƪ����
		// ����: colId�Ǳ��������ڵ����ID�� id�ǵ�ǰ���µ�ID
		// ����: �ɹ�������һƪ���£�ʧ���򷵻�false
		//==========================================	
		function getNextArticle($colId, $id){
			$sql="SELECT  id, title,author,postTime FROM {$this->tabName} WHERE  id > {$id} and audit=1 and catId={$colId} ORDER BY id ASC LIMIT 0, 1";
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
		}
		//==========================================
		// ����: getPrevArticle($colId, $id)
		// ����: ��ȡ��Ӧָ�����µ���һƪ����
		// ����: colId�Ǳ��������ڵ����ID�� id�ǵ�ǰ���µ�ID
		// ����: �ɹ�������һƪ���£�ʧ���򷵻�false
		//==========================================	
		function getPrevArticle($colId, $id){
			$sql="SELECT  id, title,author,postTime FROM {$this->tabName} WHERE  id < {$id} and audit=1 and catId={$colId} ORDER BY id DESC LIMIT 0, 1";
			$result=$this->mysqli->query($sql);

			if($result && $result->num_rows ==1){
				return $result->fetch_assoc();
			}else{
				return false;
			}
		}
		//==========================================
		// ����: getSearchResult($type, $condition, $offset, $num)
		// ����: ��ȡ���µ������ṹ�б�����
		// ����: type��ָ�����������ͣ�condition��ָ�����������ݣ�offset����ȡ���µ�ƫ��λ�ã�num�ǻ�ȡ���µļ�¼����
		// ����: �����������б����ݣ���ģ����ʹ��
		//==========================================
		function getSearchResult($type, $condition, $offset, $num){
			$sql = "SELECT id, title,author,postTime,views FROM {$this->tabName} WHERE audit=1 ";	
			$tmp = "";
			$condition=trim($condition);
			switch($type){
				case "title":               //����������
					$tmp .= "AND title LIKE '%{$condition}%' ";
					break;
				case "content":               //����������
					$tmp .= "AND content LIKE '%{$condition}%' ";
					break;
				case "keyword":               //���ؼ�������
					$tmp .= "AND keyword LIKE '%{$condition}%' ";
					break;
			}

			$tmp .= "ORDER BY postTime DESC LIMIT {$offset}, {$num}";
			$sql .= $tmp;

			$result=$this->mysqli->query($sql);
			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}

		//==========================================
		// ����: getSearchTotal($type, $condition)
		// ����: ��ȡ���µ������ṹ�б������ܼ�¼��
		// ����: type��ָ�����������ͣ�condition��ָ������������
		// ����: ���������ṹ���ܼ�¼��
		//==========================================
		function getSearchTotal($type, $condition){
			$sql = "SELECT id, title,author,postTime,views FROM {$this->tabName} WHERE audit=1 ";	
			$tmp = "";
			$condition=trim($condition);
			switch($type){
				case "title":               //����������
					$tmp .= "AND title LIKE '%{$condition}%' ";
					break;
				case "content":               //����������
					$tmp .= "AND content LIKE '%{$condition}%' ";
					break;
				case "keyword":               //���ؼ�������
					$tmp .= "AND keyword LIKE '%{$condition}%' ";
					break;
			}

			$tmp .= "ORDER BY postTime DESC";
			$sql .= $tmp;

			$result=$this->mysqli->query($sql);
			return $result->num_rows;	
		}
		//==========================================
		// ����: validateForm()
		// ����: ����ӵ����»��޸ĵ��������ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['title'])){
				$this->messList[] = "���±��ⲻ��Ϊ��.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['title'], 100)) {
				$this->messList[] = "���±��ⲻ�ܳ���50���ַ�.";
				$result=false;
			}
			if(!Validate::required($_POST['postTime'])){
				$this->messList[] = "����ʱ�䲻��Ϊ��.";
				$result=false;
			}
			if(!Validate::match($_POST['postTime'], "/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/")) {
				$this->messList[] = "����ʱ���ʽ����ȷ.";		
				$result=false;
			}
			if(!Validate::checkLength($_POST['summary'], 300)) {
				$this->messList[] = "����ժҪ���ܳ���300���ַ�.";
				$result=false;
			}
			if(!Validate::required($_POST['author'])) {
				$this->messList[] = "�������߲���Ϊ��.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['author'], 30)) {
				$this->messList[] = "�������߲��ܳ���30���ַ�.";
				$result=false;
			}
			if(!Validate::required($_POST['keyword'])) {
				$this->messList[] = "�ؼ��ֲ���Ϊ��.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['keyword'], 20)){
				$this->messList[] = "�ؼ��ֲ��ܳ���20���ַ�.";
				$result=false;
			}
			if(!Validate::required($_POST['content'])) {
				$this->messList[] = "�������ݲ���Ϊ��.";
				$result=false;
			}
			return  $result;
		}	
	}

	
?>
