<?php
	/*==================================================================*/
	/*		�ļ���:MainControl.class.php                        */
	/*		��Ҫ: ����������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	require "../FCKeditor/fckeditor.php"; // ��������FCKeditor���ļ�

	class MainControl {
		private $tpl;
		private $timer;

		function __construct($tpl,$action=null){
			$this->timer=new Timer();
			$this->tpl=$tpl;
			$catId=isset($_GET["catId"])?$_GET["catId"]:1;
			switch($action) {
				//ϵͳ���ò���
				case 'sysInfo':
					$this->sysInfo();
					break;
				case 'baseSet':
					$this->baseSet();
					break;
				case 'updateCache':
					$this->updateCache();
					break;
				//�������ӹ���
				case 'addFlink':
					$this->addFlink();
					break;
				case 'editFlink':
					$this->editFlink();
					break;

				//ͼƬ������
				case 'addAlbum':
					$this->addAlbum();
					break;
				case 'editAlbum':
					$this->editAlbum();
					break;
				case 'addPicture':
					$this->addPicture();
					break;
				case 'editPicture':
					$this->editPicture($catId);
					break;
				case 'modPicture':
					$this->modPicture();
					break;
				//���¹�����
				case 'addCat':
					$this->addCat();
					break;
				case 'editCat':
					$this->editCat();
					break;
				case 'addArticle':
					$this->addArticle();
					break;
				case 'editArticle':
					$this->editArticle($catId);
					break;
				//�û�����
				case 'addUser':
					$this->addUser();
					break;
				case 'editUser':
					$this->editUser();
					break;
				default:
					$this->sysIntroduce();	
			}
		}
		private function addUser(){
			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ. ');
			$user=new User();
			if($_GET["edit"]=="mod"){
				$this->tpl->assign("dtitle", '�û�����>�˺Ź���>�޸��û�');
				$data=$user->get($_GET["id"]);
				$this->tpl->assign("post", $data);
				$this->tpl->assign("act","mod");
				$this->tpl->assign("action", "addUser&edit=mod&id=".$_GET["id"]);
				$this->tpl->assign("submitButton", "�� ��");
			}else{
				$this->tpl->assign("dtitle", '�û�����>�˺Ź���>����û�');	
				$this->tpl->assign("action", "addUser&edit=add");
				$this->tpl->assign("act","add");
				$this->tpl->assign("submitButton", "�� ��");
			}


			if($_POST["action"]=="mod"){
				if($user->validateForm(0)){
					if($user->modUser($_POST)){
						echo '<script>window.location="main.php?action=editUser"</script>';	
						return;
					}else{
						$this->message(0, $user->getMessList());
					}	 
				}else{
					$this->message(0, $user->getMessList());
				}
				$this->tpl->assign("post", $_POST);
			}

			
			if($_POST["action"]=="add"){
				if($user->validateForm()){
					if($user->userAdd($_POST)){
						$this->message(1,$user->getMessList());
						$_POST=array();
					}else{
						$this->message(0, $user->getMessList());
					}
				}else{
					$this->message(0,$user->getMessList());
				}
				$this->tpl->assign("post", $_POST);
			}
			$this->tpl->display("admin/addUser.tpl");
		}

		private function editUser(){
			$this->tpl->assign("dtitle", '�û�����>�˺Ź���>�༭�û�');	
			$this->tpl->assign("tmess", '����Ա�û�����ɾ�������򽫲��ܵ�¼ϵͳ.<br> �û���ɾ��ʱ,��������Ҳ��һ��ɾ��. ');
			$user=new User();
			
		
			if($_GET["edit"]=="del"){
				if($user->delUser($_REQUEST["id"])){
					$this->message(1,$user->getMessList());
				}else{
					$this->message(0, $user->getMessList());
				}
			}

			if(isset($_POST["dels_x"]) || isset($_POST["dels_y"])){
				if($user->delUser($_POST["del"])){
					$this->message(1,$user->getMessList());
				}else{
					$this->message(0, $user->getMessList());
				}
			}

			$total=$user->getRowTotal();
			$current_page=isset($_GET["page"])?$_GET["page"]:1;
			$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);	
			$pageInfo=$pageObj->getPageInfo();
			$allUsers=$user->getAllUsers($pageInfo["row_offset"], $pageInfo["row_num"]);
			$this->tpl->assign("users", $allUsers);
			$this->tpl->assign("pageInfo", $pageInfo);
		
			$this->tpl->display("admin/editUser.tpl");	
		}

		private function addFlink(){
			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ,LOGOѡ��Ϊ������վ��LOGOͼƬ����λ��. ');
			$fLink=new Flink();
			if($_GET["edit"]=="mod"){
				$this->tpl->assign("dtitle", 'ϵͳ����>�������ӹ���>�޸���������');
				$data=$fLink->get($_GET["id"]);
				$this->tpl->assign("post", $data);
				if($data["list"]){
					$this->tpl->assign("logoPic", "checked");
				}else{
					$this->tpl->assign("webName", "checked");
				}
				$this->tpl->assign("act","mod");
				$this->tpl->assign("action", "addFlink&edit=mod&id=".$_GET["id"]);
				$this->tpl->assign("submitButton", "�� ��");
			}else{
				$this->tpl->assign("dtitle", 'ϵͳ����>�������ӹ���>�����������');	
				$this->tpl->assign("webName", "checked");
				$this->tpl->assign("action", "addFlink&edit=add");
				$this->tpl->assign("act","add");
				$this->tpl->assign("submitButton", "�� ��");
			}


			if($_POST["action"]=="mod"){
				if($fLink->validateForm($_POST)){
					if($fLink->modFlink($_POST)){
						echo '<script>window.location="main.php?action=editFlink"</script>';	
						return;
					}else{
						$this->message(0, $fLink->getMessList());
					}	 
				}else{
					$this->message(0, $fLink->getMessList());
				}		
				if($_POST["list"]){
					$this->tpl->assign("logoPic", "checked");
				}else{
					$this->tpl->assign("webName", "checked");
				}
				$this->tpl->assign("post", $_POST);
			}

			
			if($_POST["action"]=="add"){
				if($fLink->validateForm($_POST)){
					if($fLink->fLinkAdd($_POST)){
						$this->message(1,$fLink->getMessList());
						$_POST=array();
					}else{
						$this->message(0, $fLink->getMessList());
					}
				}else{
					$this->message(0,$fLink->getMessList());
				}
				if($_POST["list"]){
					$this->tpl->assign("logoPic", "checked");
				}else{
					$this->tpl->assign("webName", "checked");
				}
				$this->tpl->assign("post", $_POST);
			}
			$this->tpl->display("admin/addFlink.tpl");
		}

		private function editFlink(){
			$this->tpl->assign("dtitle", 'ϵͳ����>�������ӹ���>������������');	
			$this->tpl->assign("tmess", '����ͨ�����������ı�������������ҳ�е���ʾ˳��,��С���������˳��.');
			$fLink=new Flink();
			
		
			if($_GET["edit"]=="del"){
				if($fLink->delFlink($_GET["id"])){
					$this->message(1,$fLink->getMessList());
				}else{
					$this->message(0, $fLink->getMessList());
				}
			}

			if(isset($_POST["order"])){
				if($fLink->modOrder($_POST["linkOrder"], $_POST["linkIds"])){
					$this->message(1,$fLink->getMessList());
				}else{
					$this->message(0, $fLink->getMessList());
				}
			}

			$total=$fLink->getRowTotal();
			$current_page=isset($_GET["page"])?$_GET["page"]:1;
			$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);	
			$pageInfo=$pageObj->getPageInfo();
			$allLinks=$fLink->getAllLinks($pageInfo["row_offset"], $pageInfo["row_num"]);
			$this->tpl->assign("links", $allLinks);
			$this->tpl->assign("pageInfo", $pageInfo);
		
			$this->tpl->display("admin/editFlink.tpl");
		}

		private function addArticle(){
			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ. ');
			$column=new Columns();
			$article=new Article();
			$oFCKeditor = new FCKeditor("content") ;          // ����FCKeditorʵ�����ɴ������ʵ��
			$oFCKeditor->BasePath = '../FCKeditor/';      // ����FCKeditorĿ¼��ַ

			if($_GET["edit"]=="mod"){
				$art=$article->get($_GET["id"]);
				$this->tpl->assign("dtitle", '���ݹ���>���¹���>�ĵ��޸�');	
				$colSelect=$column->buildSelect("catId", $art["catId"]);
				$this->tpl->assign("colSelect", $colSelect);
				$this->tpl->assign("post", $art);
				$oFCKeditor->Value=$art["content"];
				$this->tpl->assign("action", "addArticle&edit=mod");
				$this->tpl->assign("id", $art["id"]);
				$this->tpl->assign("act", "mod");
				if($art["recommend"]==1 || $_POST["recommend"]==1){
					$this->tpl->assign("recommend", "checked");
				}else{
					$this->tpl->assign("no_recommend", "checked");
				}
				$this->tpl->assign("submitButton", "�� ��");
			}else{
				$this->tpl->assign("dtitle", '���ݹ���>���¹���>����ĵ�');	
				$this->tpl->assign("no_recommend","checked");
				$colSelect=$column->buildSelect("catId");
				$post["postTime"]=time();
				$this->tpl->assign("post", $post);
				$this->tpl->assign("colSelect", $colSelect);
				$this->tpl->assign("act", "add");
				$this->tpl->assign("action", "addArticle&edit=add");
				$this->tpl->assign("submitButton", "�� ��");	
			}

			if($_POST["action"]=="mod"){
				if($article->validateForm($_POST)){
					$_POST["postTime"]=strtotime($_POST["postTime"]);
					if($article->modArticle($_POST)){
						echo '<script>window.location="main.php?action=editArticle&catId='.$_POST["catId"].'" </script>';	
						return;
					}else{
						$this->message(0, $article->getMessList());
					}	 
				}else{
					$this->message(0,$article->getMessList());
				}		
				$this->tpl->assign("post", $_POST);
				$oFCKeditor->Value=stripslashes($_POST["content"]);
				$this->tpl->assign("colSelect", $column->buildSelect("catId", $_POST["catId"]));
			}

			if($_POST["action"]=="add"){
				if($article->validateForm($_POST)){
					$_POST["postTime"]=strtotime($_POST["postTime"]);
					if($article->addArticle($_POST)){
						$this->message(1,$article->getMessList());
						$_POST=array();
						$_POST["postTime"]=time();
					}else{
						$this->message(0, $article->getMessList());
					}
				}else{
					$this->message(0,$article->getMessList());
				}
				$this->tpl->assign("post", $_POST);
				$oFCKeditor->Value=stripslashes($_POST["content"]);
				$this->tpl->assign("colSelect", $column->buildSelect("catId", $_POST["catId"]));
			}
			$this->tpl->assign("FCKeditor",$oFCKeditor->Create());
			$this->tpl->display("admin/addArticle.tpl");
		}

		private function editArticle($catId){
			$this->tpl->assign("dtitle", '���ݹ���>���¹���>�����ĵ�');	

			$this->tpl->assign("tmess", '��������Ӻ󶼴�������״̬,ֻ����˺�����²��ܷ���.<br>��˺������Ҳ��������,���������²�������. ');

			$column=new Columns();
			$article=new Article();
			
			if($_GET["edit"]=="audit"){
				if($article->auditArticle($_GET["id"])){
					$this->message(1,$article->getMessList());
				}else{
					$this->message(0, $article->getMessList());
				}
			}elseif(isset($_POST["audits_x"]) || isset($_POST["audits_y"])){
				if($article->auditArticle($_POST["del"])){
					$this->message(1,$article->getMessList());
				}else{
					$this->message(0, $article->getMessList());
				}
			}

						
			if($_GET["edit"]=="lock"){
				if($article->lockArticle($_GET["id"])){
					$this->message(1,$article->getMessList());
				}else{
					$this->message(0, $article->getMessList());
				}
			}elseif(isset($_POST["locks_x"]) || isset($_POST["locks_y"])){
				if($article->lockArticle($_POST["del"])){
					$this->message(1,$article->getMessList());
				}else{
					$this->message(0, $article->getMessList());
				}
			}

			if($_GET["edit"]=="del"){
				if($article->delArticle($_GET["id"])){
					$this->message(1,$article->getMessList());
				}else{
					$this->message(0, $article->getMessList());
				}
			}elseif(isset($_POST["dels_x"]) || isset($_POST["dels_y"])){
				if($article->delArticle($_POST["del"])){
					$this->message(1,$article->getMessList());
				}else{
					$this->message(0, $article->getMessList());
				}
			}
			$this->tpl->assign("appPath",APP_PATH);
			$this->tpl->assign("colSelect", $column->buildSelect("catId", $catId, array("onChange"=>"window.location='main.php?action=editArticle&catId='+options[selectedIndex].value")));
			$total=$article->getRowTotal($catId);
			$current_page=isset($_GET["page"])?$_GET["page"]:1;
			$pageObj=new Page($total, $current_page, ARTICLE_PAGE_SIZE);	
			$pageInfo=$pageObj->getPageInfo();
			$allArticle=$article->getAllArts($catId,$pageInfo["row_offset"], $pageInfo["row_num"]);
			$this->tpl->assign("arts", $allArticle);
			$this->tpl->assign("pageInfo", $pageInfo);
			$this->tpl->assign("catId", $catId);
			$this->tpl->display("admin/editArticle.tpl");
		}

		private function editCat() {
			$this->tpl->assign("dtitle", '���ݹ���>��Ŀ����>������Ŀ');	

			$this->tpl->assign("tmess", '��ʾ�����µĸ����಻��ɾ��.<br>ע�⣺ɾ����Ŀ����ʱ��ɾ������Ŀ�������ӷ��������,�����ز���.<br>����ͨ�����������ı���Ŀ����ʾ˳��,��С���������˳��. ');
			$column=new Columns();
			if($_GET["edit"]=="del"){
				if($column->remove($_GET["colId"])){
					$this->message(1,$column->getMessList());
				}else{
					$this->message(0, $column->getMessList());
				}
			}

			if(isset($_POST["order"])){
				if($column->modOrder($_POST["colOrder"], $_POST["colIds"])){
					$this->message(1,$column->getMessList());
				}else{
					$this->message(0, $column->getMessList());
				}
			}

			$this->tpl->assign("list", $column->parseTree());
			$this->tpl->display("admin/editCat.tpl");
		}

		private function addCat() {
			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ. ');
			$column=new Columns();

			if($_GET["edit"]=="mod"){
				$this->tpl->assign("dtitle", '���ݹ���>��Ŀ����>�޸���Ŀ');
				$data=$column->getNode($_GET["colId"]);
				$this->tpl->assign("colSelect", $column->buildSelect("colPid", $data["colPid"]));
				$this->tpl->assign("post", $data);
				$pic=new Picture();
				$picId=$data["picId"];
				$this->tpl->assign("act","mod");
				$this->tpl->assign("action", "addCat&edit=mod&colId=".$_GET["colId"]);
				$this->tpl->assign("submitButton", "�� ��");
				$tu=$pic->get($picId);
				if($tu["hasThumb"] == 1 || $tu["hasMark"] == 1){
					$picName=GALLERY_PATH.str_replace(".","_new.", $tu["picName"]);	
				}else{
					$picName=GALLERY_PATH.$tu["picName"];
				}
				$this->tpl->assign("tuPath", $picName);

			}else{
				$this->tpl->assign("dtitle", '���ݹ���>��Ŀ����>�����Ŀ');	
				$colSelect=$column->buildSelect("colPid");
				$this->tpl->assign("colSelect", $colSelect);
				$this->tpl->assign("action", "addCat&edit=add");
				$this->tpl->assign("act","add");
				$this->tpl->assign("submitButton", "�� ��");
			}


			if($_POST["action"]=="mod"){
				if($column->validateForm($_POST)){
					if($column->columnMod($_POST,$_GET["colId"])){
						echo '<script>window.location="main.php?action=editCat&colPid='.$_POST["colPid"].'" </script>';	
						return;
					}else{
						$this->message(0, $column->getMessList());
					}
				}else{
					$this->message(0, $column->getMessList());
				}
				$picId=$_POST["picId"];
				$this->tpl->assign("colSelect", $column->buildSelect("colPid", $_POST["colPid"]));
				$this->tpl->assign("post", $_POST);
			}

			
			if($_POST["action"]=="add"){
				if($column->validateForm($_POST)){
					if($column->columnAdd($_POST)){
						$this->message(1,$column->getMessList());
					}else{
						$this->message(0, $column->getMessList());
					}
				
				}else{
					$this->message(0,$column->getMessList());
					$this->tpl->assign("post", $_POST);
				
				}
				$this->tpl->assign("colSelect", $column->buildSelect("colPid", $_POST["colPid"]));
			}
			$this->tpl->display("admin/addCat.tpl");
		}
		

		private function sysInfo(){
			$mydb=new MyDB();
			$sysinfo=new SysInfo($mydb);
			$this->tpl->assign("sysinfo", $sysinfo->getSysInfos());	
			$this->tpl->assign("dtitle", 'ϵͳ����>��������>ϵͳ��Ϣ');	
			$this->tpl->assign("tmess", '���Ը�����վ����Ҫ���Է��������е����ý��е���.');
			$this->tpl->display("admin/sysInfo.tpl");
		}

		private function baseSet(){
			$this->tpl->assign("dtitle", 'ϵͳ����>��������>��������');	
			$this->tpl->assign("tmess", 'ˮӡ����Ϊ����,һ����Ϊ�Լ�����վ��Ȩ��Ϊ����,֧������. ͼƬ�ߴ�������Ҫ��ʹ��Ĭ��ֵΪ��ѳߴ�. ');

			$bs=new  BaseSet();

			if(isset($_POST["mod"]))
			{	
				if($bs->validateForm($_POST)){
					if($bs->writeConfig("config.inc.php",$_POST)){
						$this->message(1,$bs->getMessList());
					}else{
						$this->message(0, $bs->getMessList());
					}	
				}else{
					$this->message(0, $bs->getMessList());
				}
				global $styleList;
				$_POST["selectStyle"]=$styleList;

				$this->tpl->assign("varList", $_POST);
			}else{
				$varList=$bs->getSet();
				$this->tpl->assign("varList",$varList);
			}
			
			$this->tpl->display("admin/baseSet.tpl");
		}
		private function updateCache(){
			$this->tpl->assign("dtitle", 'ϵͳ����>��������>���»���');	
			
			$this->message(1,"������³ɹ���");
			$this->tpl->clear_all_cache();
			$this->tpl->display("admin/updateCache.tpl");
		}
		private function message($bool, $message){
			if($bool){
				$this->tpl->assign("mess", "sucess");
				$this->tpl->assign("tmess", $message);	
			}else{
				$this->tpl->assign("mess", "error");
				$this->tpl->assign("tmess", $message);
			}
		}

		private function sysIntroduce(){
				$this->tpl->assign("dtitle", '��̨������ҳ');	
				$this->tpl->assign("tmess", '��������˵����Ա���վ�����ݽ��й���.');
				$this->tpl->display("admin/main.tpl");
		}

		private function addAlbum() {
			$this->tpl->assign("dtitle", '���ݹ���>ͼƬ����>������');	
			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ. ');
			$album=new Album();
			$select=$album->buildSelect("catPid");
			$this->tpl->assign("select", $select);
			$this->tpl->assign("action", "addAlbum");
			$this->tpl->assign("act","add");
			$this->tpl->assign("submitButton", "�� ��");

			if($_POST["action"]=="add"){
				if($album->validateForm($_POST)){
					if($album->albumAdd($_POST)){
						$this->message(1,$album->getMessList());
					}else{
						$this->message(0, $album->getMessList());
					}
				
				}else{
					$this->message(0, $album->getMessList());
					$this->tpl->assign("post", $_POST);
				}
				$this->tpl->assign("select", $album->buildSelect("catPid", $_POST["catPid"]));
			}
			$this->tpl->display("admin/addAlbum.tpl");
		}

		private function editAlbum() {
			$this->tpl->assign("dtitle", '���ݹ���>ͼƬ����>�༭���');	
			$this->tpl->assign("tmess", '��ʾ������᲻��ɾ��.<br>ע�⣺ɾ�����ʱ��ɾ�������������������ͼƬ,�����ز���. ');
			$album=new Album();
			$this->tpl->assign("list", $album->parseTree());
			if($_GET["edit"]=="mod"){
				$data=$album->getNode($_GET["catId"]);
				$this->tpl->assign("select", $album->buildSelect("catPid", $data["catPid"]));
				$this->tpl->assign("post", $data);
				$this->tpl->assign("dtitle", '���ݹ���>ͼƬ����>�޸����');	
				$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ. ');
				$this->tpl->assign("action", "editAlbum&edit=mod&catId=".$_GET["catId"]);
				$this->tpl->assign("act","mod");	
				$this->tpl->assign("submitButton", "�� ��");
				if($_POST["action"]=="mod"){
					if($album->validateForm($_POST)){
						if($album->albumMod($_POST,$_GET["catId"])){
							$this->message(1,$album->getMessList());
						}else{
							$this->message(0, $album->getMessList());
						}
				
					}else{
						$this->message(0, $album->getMessList());
					}
					$this->tpl->assign("select", $album->buildSelect("catPid", $_POST["catPid"]));
					$this->tpl->assign("post", $_POST);
				}
				$this->tpl->display("admin/addAlbum.tpl");
			}elseif($_GET["edit"]=="del"){
				if($album->remove($_GET["catId"])){
					$this->message(1,$album->getMessList());
				}else{
					$this->message(0, $album->getMessList());
				}
				$this->tpl->assign("list", $album->parseTree());
				$this->tpl->display("admin/editAlbum.tpl");
			}else{
				$this->tpl->display("admin/editAlbum.tpl");
			}
		}
		private function addPicture() {
			$this->tpl->assign("dtitle", '���ݹ���>ͼƬ����>���ͼƬ');	

			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ.<br>�����ϴ���ͼƬ��ʽΪGIF,JPEG��PNG,��С���ܳ���2M.  ');
			$album=new Album();
			$select=$album->buildSelect("catId");
			$this->tpl->assign("select", $select);
			$this->tpl->assign("hasThumb", "checked");
			$this->tpl->assign("hasMark", "checked");
			$this->tpl->assign("action", "addPicture");
			$this->tpl->assign("act","add");

			
			if($_POST["action"]=="add"){
				$pic=new Picture();
				if($pic->addPic(new FileUpload(array("filePath"=>GALLERY_REAL_PATH)),$_POST, $_FILES)){
					$this->message(1,$pic->getMessList());
				}else{
					$this->message(0, $pic->getMessList());
					$this->tpl->assign("select", $album->buildSelect("catId", $_POST["catPid"]));
					$this->tpl->assign("post", $_POST);
					if($_POST["hasThumb"]==1)
						$this->tpl->assign("hasThumb", "checked");
					else
						$this->tpl->assign("hasThumb", "");

					if($_POST["hasMark"]==1)
						$this->tpl->assign("hasMark", "checked");
					else
						$this->tpl->assign("hasMark", "");

				}
			}
			$this->tpl->assign("submitButton", "�� ��");
			$this->tpl->display("admin/addPicture.tpl");
		}

		private function editPicture($catId) {
			$this->tpl->assign("dtitle", '���ݹ���>ͼƬ����>����ͼƬ');	
			$this->tpl->assign("tmess", '��ʾ:��������ͼƬ�б����ʾ��ʽ�뵽ϵͳ����Ļ��������н����޸�.');

			$this->tpl->assign("showType", PICTURE_SHOW_TYPE);
			$this->tpl->assign("path", GALLERY_PATH);
			
			$album=new Album();
			$pic=new Picture();
			if($_GET["act"]=="delete"){
				if(isset($_POST["del"])){
					$id=$_POST["del"];
				}else{
					$id=$_GET["id"];
				}
				if($pic->delPic($id)){
					$this->message(1,$pic->getMessList());
				}else{
					$this->message(0, $pic->getMessList());
				}
			}

			$select=$album->buildSelect("catId", $catId, array("onChange"=>"window.location='main.php?action=editPicture&catId='+options[selectedIndex].value"));
			$this->tpl->assign("select", $select);
			$total=$pic->getRowTotal($catId);
		
			$current_page=isset($_GET["page"])?$_GET["page"]:1;
			$pageObj=new Page($total, $current_page, PICTURE_PAGE_SIZE);	
			$pageInfo=$pageObj->getPageInfo();

			$allPic=$pic->getAllPic($catId,$pageInfo["row_offset"], $pageInfo["row_num"]);
			$this->tpl->assign("pics", $allPic);
			$this->tpl->assign("pageInfo", $pageInfo);
			$this->tpl->assign("catId", $catId);

			$this->tpl->display("admin/editPicture.tpl");
		}

		private function modPicture() {
			$this->tpl->assign("dtitle", '���ݹ���>ͼƬ����>�޸�ͼƬ');	
			$this->tpl->assign("tmess", '��ʾ: ��<span class="red_font">*</span>����ĿΪ������Ϣ.');

			$pic=new Picture();	

			if($_POST["action"]=="mod"){
				if($pic->modPic($_POST)){
					$this->message(1,$pic->getMessList());
				}else{
					$this->message(0, $pic->getMessList());
				}	
				$picInfo=$pic->get($_POST["id"]);
			}else{
				$picInfo=$pic->get($_GET["id"]);
			}			
			$album=new Album();
			$select=$album->buildSelect("catId", $picInfo["catId"]);
			$this->tpl->assign("select", $select);
			list($fileName, $extension)=explode(".", $picInfo["picName"]);

			$picPath=GALLERY_PATH.$picInfo["picName"];
			if($picInfo["hasThumb"]==1){
				$picPath= GALLERY_PATH.$fileName."_new.".$extension;
				$this->tpl->assign("hasThumb", "checked");
			}else{
				$this->tpl->assign("hasThumb", "");
			}

			if($picInfo["hasMark"]==1){
				$picPath= GALLERY_PATH.$fileName."_new.".$extension;
				$this->tpl->assign("hasMark", "checked");
			}else{
				$this->tpl->assign("hasMark", "");
			}
			$this->tpl->assign("picPath", $picPath);	
			$this->tpl->assign("post", $picInfo);

			$this->tpl->assign("action", "modPicture");
			$this->tpl->assign("act","mod");
			$this->tpl->assign("submitButton", "�� ��");
			$this->tpl->display("admin/addPicture.tpl");
		}

		function __destruct(){
			$this->timer->stop();
			$this->tpl->assign("timer", $this->timer->spent());
			$this->tpl->display("admin/timer.tpl");
		}	
	}
?>
