<?php
	/*==================================================================*/
	/*		�ļ���:Album.class.php                              */
	/*		��Ҫ: ��������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Album extends BaseLogic {
		
		//==========================================
		// ����:  __construct($showError=TRUE)
		// ����: ��ʹ�������Ա
		// ����: $showError�û������Ƿ���ʾ���󱨸���ʾ
		// ����: ��
		//==========================================
		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."album";
			$this->fieldList=array("catPid","catPath", "catTitle", "description");
		}

		//==========================================
		// ����:  getTree()
		// ����: �����ݱ��л�ȡ���Ľṹ��
		// ����: ��
		// ����: ���޷�������Խṹ����
		//==========================================
		function getTree(){
			$sql="SELECT concat(catPath,'-',catId) AS absPath, catId,catPid,catPath, catTitle, description FROM {$this->tabName} ORDER BY absPath, catId";
			$result=$this->mysqli->query($sql);
			$record=array();
			while($row=$result->fetch_assoc()){
				$record[]=$row;
			}
			return $record;
		}
		
		//==========================================
		// ����: buildSelect($name, $default=null, $attrArray=array())
		// ����: ������ģ������ʾ���������������
		// ����: name��select��ǩ�����ƣ�default��ѡ���Ĭ�����б��attrArray��select��ǩ����������
		// ����: ���ɵ�Select��ǩ
		//==========================================
		function buildSelect($name, $default=null, $attrArray=array()) {	
			$option = $this->getTree();

			if (!is_array($option) || empty($option)) 
				exit("buildSelect error:the option is not an array or the array is empty");
			
			$htmlStr = '<select class="text-box" name="'.$name.'" id="'.$name.'"';
			$attrStr = ' ';
			if(!empty($attrArray) && is_array($attrArray)) {
				foreach($attrArray as $key => $value) {
					$attrStr.="$key=\"$value\"";
				}
			}
			$htmlStr .= $attrStr . '>';
			
			foreach($option as $key => $value) {
				if ($value['catPid'] == 0) {
					$catTitle = '��'.$value['catTitle'].'��';
					$htmlStr .= '<option value="'.$value['catId'].'">'.$catTitle.'</option>';
				} elseif ($value['catId'] == $default) {
					$catTitle = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',count(explode('-',$value['catPath']))-1) . '��&nbsp;' .  $value['catTitle'];
					$htmlStr .= '<option value="'.$value['catId'].'" selected>'.$catTitle.'</option>';
				} else {
					$catTitle = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',count(explode('-',$value['catPath']))-1) . '��&nbsp;' . $value['catTitle'];
					$htmlStr .= '<option value="'.$value['catId'].'">'.$catTitle.'</option>';
				}
			}
			$htmlStr .= '</select>';

			return $htmlStr;
		}

		//==========================================
		// ����: getNode($catId)
		// ����: ��ȡһ�����ڵ�
		// ����: ������ID
		// ����: ����ɹ���ȡ�ڵ㷵��true�����򷵻�false
		//==========================================	
		function getNode($catId){
			$sql="SELECT catId,catPid, catTitle, description FROM {$this->tabName} WHERE catId='".$catId."'";
			$result=$this->mysqli->query($sql);
			
			if($result && $result->num_rows >0)
				return $result->fetch_assoc();
			else
				return false;
			
		}
		//==========================================
		// ����:  parseTree()
		// ����: �������ṹ�����
		// ����: ��
		// ����: �����������б����ݣ���ģ����ʹ��
		//==========================================
		function parseTree() {	
			$option = $this->getTree();
			$htmlStr='';
			$i=0;
			foreach($option as $value) {
				if($i++%2==0)
					$class='light-row';
				else
					$class='dark-row';
				$htmlStr .= '<li class='.$class.'>';
				$catTitle = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',count(explode('-',$value['catPath']))-1) . '<img border="0" src="images/album.gif">&nbsp;<a href="main.php?action=editPicture&catId='.$value["catId"].'">'.$value['catTitle'].'</a>';
				$htmlStr .= '<span class="col_width">'.$catTitle.'</span>';
				$htmlStr .= '<span class="col_width">'.$value["description"].'&nbsp;</span>';
				if($value["catPid"]!=0){
					$htmlStr .= '<span class="col_width">';
					$htmlStr .= '��<a href="main.php?action=editAlbum&edit=mod&catId='.$value["catId"].'">�޸�</a>��';
					$htmlStr .= '��<a href="main.php?action=editAlbum&edit=del&catId='.$value["catId"].'" onclick=\'return confirm("ȷ��Ҫɾ�����'.$value['catTitle'].'���ӷ�����")\'>ɾ��</a>��';
					$htmlStr .='</span>';
				}
				$htmlStr .= '</li>';
			}
			return $htmlStr;
		}
		//==========================================
		// ����:  validateForm()
		// ����: ���û���ӵ�������ݽ�����֤
		// ����: ��
		// ����: true��false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['catTitle'])) {
				$this->messList[] = "������Ʋ���Ϊ��.";
				$result=false;
			}
			if(Validate::match($_POST['catTitle'], "|[\\\/\'\"]|")) {
				$this->messList[] = "������ƺ��зǷ��ַ�, ���ܰ���\\ / ' \"���ַ�.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['description'], 200)) {
				$this->messList[] = "����������ܳ���100������.";
				$result=false;
			}

			if(!$result){
				$this->messList[] = "������ʧ��.";
			}
			return  $result;
		}
		//==========================================
		// ����:  getAbsPath($catPid)
		// ����: ��ȡ���޷���ľ���·��
		// ����: ���ĸ�ID
		// ����: ����ָ���������·��
		//==========================================
		private function getAbsPath($catPid){
			$sql="SELECT catPath FROM {$this->tabName} WHERE catId='".$catPid."'";
			$result=$this->mysqli->query($sql);
			$data=$result->fetch_assoc();
			return $data["catPath"];
		}	
		//==========================================
		// ����:  getCatPath($catPid)
		// ����:��ȡ���Ľṹ���Ĳ鿴·��
		// ����: catpid���ĸ���ID
		// ����: ���ز鿴·�����ַ���
		//==========================================
		private function getCatPath($catPid) {
			$absPath=$this->getAbsPath($catPid);	
			return $absPath.'-'.$catPid;
			
		}
		//==========================================
		// ����: albumAdd($post)
		// ����: �����ݱ����������¼
		// ����: post�ṩ�ڱ�������������Ϣ����
		// ����: true��false
		//==========================================
		function albumAdd($post) {	
			$post["catPath"]=$this->getCatPath($post['catPid']);

			if($this->add($post) ){
				$this->messList[] = "�����ӳɹ�.";
				return true;
			}else{
				$this->messList[] = "������ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����:  isSelfNode($catPid,$catId)
		// ����: �ж�һ���ڵ��Ƿ����Լ����ӽڵ�
		// ����: catPid���ĸ���ID�� catId�ǵ�ǰ����ID
		// ����: true��false
		//==========================================
		private function isSelfNode($catPid,$catId){
			$absPath=$this->getAbsPath($catPid);

			if(in_array($catId, explode("-", $absPath))){
				return true;
			}else{
				return false;
			}
		}
		//==========================================
		// ����: albumMod($post,$catId)
		// ����: �޸ĵ��������Ϣ
		// ����: post�Ǳ��ύ��������Ϣ��catId����Ҫ�޸�����ID
		// ����: true��false
		//==========================================
		function albumMod($post,$catId) {
			if($this->isSelfNode($post["catPid"],$catId)){
				$this->messList[] = "���ܽ�[".$post["catTitle"]."]�ƶ����Լ����������.";
				$this->messList[] = "����޸�ʧ��.";
				return false;
			}

			$post["catPath"]=$this->getCatPath($post['catPid']);
			$sql = "UPDATE {$this->tabName} set catPid='".$post["catPid"]."',catPath='".$post["catPath"]."', catTitle='".$post["catTitle"]."', description='".$post["description"]."' WHERE catId='".$catId."'";

			$result=$this->mysqli->query($sql);
			if($result && $this->mysqli->affected_rows >0 ){   
				$this->moveTo($catId, $post["catPath"]);
				$this->messList[] = "����޸ĳɹ�.";
				return true;
			}else{
				$this->messList[] = "����޸�ʧ��.";
				return false;
			}
		}
		//==========================================
		// ����:  moveTo($catId,$catPath)
		// ����: �ƶ���ᵽĳ���ڵ���
		// ����: catId�Ǳ�������ID��catPath������·��
		// ����: ��
		//==========================================
		private function moveTo($catId,$catPath){
			$select="SELECT catId,catTitle FROM {$this->tabName} WHERE catPid='".$catId."'";
			$result=$this->mysqli->query($select);
			if($result && $result->num_rows>0){
				$catPath=$catPath.'-'.$catId;
				while($data=$result->fetch_assoc()){
					$update="UPDATE {$this->tabName} set catPath='".$catPath."' WHERE catId='".$data["catId"]."'";
					if($this->mysqli->query($update)){
						$this->moveTo($data["catId"], $catPath);
						$this->messList[] = "�������[".$data["catTitle"]."]�ƶ��ɹ�.";
					}else{
						$this->messList[] = "��������ƶ�ʧ��.";
					}
				}
			}
		}
		//==========================================
		// ����: remove($catId)
		// ����: ɾ����ἰ��������������ͼƬ
		// ����: catId����Ҫɾ���������ID
		// ����: true��false
		//==========================================
		function remove($catId){
			$catPath=$this->getCatPath($catId);
			$sql = "DELETE FROM {$this->tabName} WHERE catId = '".$catId."' OR catPath LIKE '".$catPath."%'";
			$res=$this->mysqli->query("SELECT catId FROM {$this->tabName} WHERE catId = '".$catId."' OR catPath LIKE '".$catPath."%'");
			while($catid=$res->fetch_assoc()){
				$catids[]=$catid["catId"];
			}
		
			$result=$this->mysqli->query($sql);

			if($result && $this->mysqli->affected_rows >0 ){   
				$pic=new Picture();
				if($pic->delPicByCid($catids)){
					$this->messList[] = "����µ�ͼƬɾ���ɹ�.";
				}
				
				$this->messList[] = "���ɾ���ɹ�.";
				return true;
			}else{
				$this->messList[] = "���ɾ��ʧ��.";
				return false;
			}
		}
	}
?>
