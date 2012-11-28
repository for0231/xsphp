<?php
	/*==================================================================*/
	/*		文件名:Album.class.php                              */
	/*		概要: 相册管理类.                	       	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Album extends BaseLogic {
		
		//==========================================
		// 函数:  __construct($showError=TRUE)
		// 功能: 初使化对象成员
		// 参数: $showError用户设置是否显示错误报告提示
		// 返回: 无
		//==========================================
		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."album";
			$this->fieldList=array("catPid","catPath", "catTitle", "description");
		}

		//==========================================
		// 函数:  getTree()
		// 功能: 从数据表中获取相册的结构树
		// 参数: 无
		// 返回: 无限分类的相册对结构数组
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
		// 函数: buildSelect($name, $default=null, $attrArray=array())
		// 功能: 构建在模板中显示的相册下拉框内容
		// 参数: name是select标签的名称，default被选择的默认是列表项，attrArray是select标签的其它属性
		// 返回: 生成的Select标签
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
					$catTitle = '≮'.$value['catTitle'].'≯';
					$htmlStr .= '<option value="'.$value['catId'].'">'.$catTitle.'</option>';
				} elseif ($value['catId'] == $default) {
					$catTitle = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',count(explode('-',$value['catPath']))-1) . '→&nbsp;' .  $value['catTitle'];
					$htmlStr .= '<option value="'.$value['catId'].'" selected>'.$catTitle.'</option>';
				} else {
					$catTitle = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',count(explode('-',$value['catPath']))-1) . '→&nbsp;' . $value['catTitle'];
					$htmlStr .= '<option value="'.$value['catId'].'">'.$catTitle.'</option>';
				}
			}
			$htmlStr .= '</select>';

			return $htmlStr;
		}

		//==========================================
		// 函数: getNode($catId)
		// 功能: 获取一个相册节点
		// 参数: 相册类别ID
		// 返回: 如果成功获取节点返回true，否则返回false
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
		// 函数:  parseTree()
		// 功能: 解析相册结构数输出
		// 参数: 无
		// 返回: 解析后的相册列表内容，在模板中使用
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
					$htmlStr .= '【<a href="main.php?action=editAlbum&edit=mod&catId='.$value["catId"].'">修改</a>】';
					$htmlStr .= '【<a href="main.php?action=editAlbum&edit=del&catId='.$value["catId"].'" onclick=\'return confirm("确定要删除相册'.$value['catTitle'].'及子分类吗？")\'>删除</a>】';
					$htmlStr .='</span>';
				}
				$htmlStr .= '</li>';
			}
			return $htmlStr;
		}
		//==========================================
		// 函数:  validateForm()
		// 功能: 对用户添加的相册内容进行验证
		// 参数: 无
		// 返回: true或false
		//==========================================
		function validateForm(){
			$result=true;
			if(!Validate::required($_POST['catTitle'])) {
				$this->messList[] = "相册名称不能为空.";
				$result=false;
			}
			if(Validate::match($_POST['catTitle'], "|[\\\/\'\"]|")) {
				$this->messList[] = "相册名称含有非法字符, 不能包含\\ / ' \"等字符.";
				$result=false;
			}
			if(!Validate::checkLength($_POST['description'], 200)) {
				$this->messList[] = "相册描述不能超过100个汉字.";
				$result=false;
			}

			if(!$result){
				$this->messList[] = "相册添加失败.";
			}
			return  $result;
		}
		//==========================================
		// 函数:  getAbsPath($catPid)
		// 功能: 获取无限分类的绝对路径
		// 参数: 类别的父ID
		// 返回: 返回指定相册分类的路径
		//==========================================
		private function getAbsPath($catPid){
			$sql="SELECT catPath FROM {$this->tabName} WHERE catId='".$catPid."'";
			$result=$this->mysqli->query($sql);
			$data=$result->fetch_assoc();
			return $data["catPath"];
		}	
		//==========================================
		// 函数:  getCatPath($catPid)
		// 功能:获取相册的结构树的查看路径
		// 参数: catpid相册的父类ID
		// 返回: 返回查看路径的字符串
		//==========================================
		private function getCatPath($catPid) {
			$absPath=$this->getAbsPath($catPid);	
			return $absPath.'-'.$catPid;
			
		}
		//==========================================
		// 函数: albumAdd($post)
		// 功能: 向数据表中添加相册记录
		// 参数: post提供在表单中输入的相册信息数组
		// 返回: true或false
		//==========================================
		function albumAdd($post) {	
			$post["catPath"]=$this->getCatPath($post['catPid']);

			if($this->add($post) ){
				$this->messList[] = "相册添加成功.";
				return true;
			}else{
				$this->messList[] = "相册添加失败.";
				return false;
			}
		}
		//==========================================
		// 函数:  isSelfNode($catPid,$catId)
		// 功能: 判断一个节点是否是自己的子节点
		// 参数: catPid相册的父类ID， catId是当前相册的ID
		// 返回: true或false
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
		// 函数: albumMod($post,$catId)
		// 功能: 修改单个相册信息
		// 参数: post是表单提交的数组信息，catId是需要修改相册的ID
		// 返回: true或false
		//==========================================
		function albumMod($post,$catId) {
			if($this->isSelfNode($post["catPid"],$catId)){
				$this->messList[] = "不能将[".$post["catTitle"]."]移动到自己的子类别中.";
				$this->messList[] = "相册修改失败.";
				return false;
			}

			$post["catPath"]=$this->getCatPath($post['catPid']);
			$sql = "UPDATE {$this->tabName} set catPid='".$post["catPid"]."',catPath='".$post["catPath"]."', catTitle='".$post["catTitle"]."', description='".$post["description"]."' WHERE catId='".$catId."'";

			$result=$this->mysqli->query($sql);
			if($result && $this->mysqli->affected_rows >0 ){   
				$this->moveTo($catId, $post["catPath"]);
				$this->messList[] = "相册修改成功.";
				return true;
			}else{
				$this->messList[] = "相册修改失败.";
				return false;
			}
		}
		//==========================================
		// 函数:  moveTo($catId,$catPath)
		// 功能: 移动相册到某个节点下
		// 参数: catId是被移相册的ID，catPath是相册的路径
		// 返回: 无
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
						$this->messList[] = "相册子类[".$data["catTitle"]."]移动成功.";
					}else{
						$this->messList[] = "相册子类移动失败.";
					}
				}
			}
		}
		//==========================================
		// 函数: remove($catId)
		// 功能: 删除相册及子相册和相册下面的图片
		// 参数: catId是需要删除相册的类别ID
		// 返回: true或false
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
					$this->messList[] = "相册下的图片删除成功.";
				}
				
				$this->messList[] = "相册删除成功.";
				return true;
			}else{
				$this->messList[] = "相册删除失败.";
				return false;
			}
		}
	}
?>
