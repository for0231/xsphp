<?php
	/*==================================================================*/
	/*		�ļ���:Picture.class.php                            */
	/*		��Ҫ: ͼƬ������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Picture extends BaseLogic {

		function __construct($showError=TRUE){
			parent:: __construct($showError);
			$this->tabName = TAB_PREFIX."picture";
 			$this->fieldList=array("picTitle", "description", "picName", "catId", "hasThumb", "hasMark");
		}
		
		private function uploadPic($fileUpload,$file){
			if($fileUpload->uploadFile($file["uploadPic"])<0){
				$this->messList[] = $fileUpload->getErrorMsg();
				return false;
			}else{
				$this->messList[] = "ͼƬ�ϴ��ɹ���";
				return true;
			}	
		}
		
		function modPic($post){
			if($this->validateForm($post)){	
				$gdImage=new GDImage(GALLERY_REAL_PATH,$post["picName"]);
				global $pictureSize; 
				$gdImage->makeThumb($pictureSize["maxWidth"], $pictureSize["maxHeight"], false); 						
				if(!empty($post['hasThumb'])){ //��������ͼ
					global $thumbSize;	
					if($gdImage->makeThumb($thumbSize["width"], $thumbSize["height"])){
						$this->messList[] = "�޸�����ͼƬ�ɹ���";
					}else{
						$this->messList[] = "�޸�����ͼƬʧ�ܣ�";
						return false;
					}
				}else{
					$post['hasThumb']=0;
				}
				if(!empty($post['hasMark'])){	//��ˮӡ
					global $waterText;
					if($gdImage->waterMark($waterText)){
						$this->messList[] = "���ˮӡ�ɹ���";
					}else{
						$this->messList[] = "���ˮӡʧ�ܣ�";
						return false;
					}
				}else{
					$post['hasMark']=0;
				}
				if($post["hasThumb"]==0 && $post["hasMark"]==0){
					list($fileName, $extension)=explode(".", $post["picName"]);
					$newFile=GALLERY_REAL_PATH.$fileName."_new.".$extension;
					if(file_exists($newFile)){
						unlink($newFile);
					}
				}
					
				if($this->mod($post)){
					$this->messList[] = "���ݱ���ͼƬ��Ϣ�޸ĳɹ���";
				}else{
					$this->messList[] = "���ݱ���ͼƬ��Ϣ�޸�ʧ�ܣ�";
					return false;
				}
				return true;
			}else{
				$this->messList[] = "ͼƬ�޸�ʧ�ܣ�";
				return false;
			}
		}

		function delPic($id){
			if($this->delPicFile($id)){
				if($this->del($id)){
					$this->messList[] = "���ݱ��¼ɾ���ɹ���";
				}else{
					$this->messList[] = "���ݱ��¼ɾ��ʧ�ܣ�";
					return false;
				}
				$this->messList[] = "ͼƬ�ļ�ɾ���ɹ���";

			}else{
				$this->messList[] = "ͼƬ�ļ�ɾ��ʧ�ܣ�";
				return false;
			}

			return true;
		}

		private function delPicFile($id){
			if($picNames=$this->getPicName($id)){
				return $this->delPicByName($picNames);
			}else{
				return false;
			}
				
		}

		private function delPicByName($picNames) {
			foreach($picNames as $picName){
				$picPath= GALLERY_REAL_PATH.str_replace(".","_new.",$picName);
				$srcPicPath=GALLERY_REAL_PATH.$picName;
				if(file_exists($picPath)){
					unlink($picPath);
				}
				if(file_exists($srcPicPath)){
					unlink($srcPicPath);
				}
			}
			return true;
		}

		function delPicByCid($cid){
			if(is_array($cid))
				$tmp = "IN (" . join(",", $cid) . ")";
			else 
				$tmp = "= $cid";
			
			$sql = "DELETE FROM {$this->tabName} WHERE catId " . $tmp ;

			$res=$this->mysqli->query("SELECT picName FROM {$this->tabName} WHERE catId " . $tmp);
			while($nameArr=$res->fetch_assoc()){
				$names[]=$nameArr["picName"];
			}
			if($this->delPicByName($names)){
				$this->messList[] = "ͼƬɾ���ɹ�.";
			}
			$result=$this->mysqli->query($sql);	

			if($result && $this->mysqli->affected_rows >0){
				return true;
			}else{
				return false;
			}
		}

		private function getPicName($id){
			if(empty($id)){
				$this->messList[] = "û��ѡ����Ҫ��ͼƬ��";
				return false;
			}
			if(is_array($id)){
				$tmp = "IN (" . join(",", $id) . ")";
			}else{ 
				$tmp = "= $id";
			}
			$sql="SELECT picName FROM {$this->tabName} WHERE id " . $tmp;
	
			$result=$this->mysqli->query($sql);
			
			$picNames=array();
			while($data=$result->fetch_assoc()){
				$picNames[]=$data["picName"];
			}
			return $picNames;
		}

		function addPic($fileUpload, $post, $file){
			if($this->validateForm($post)){
				if($this->uploadPic($fileUpload,$file)){
					$post["picName"]=$fileUpload->getNewFileName();	
					$gdImage=new GDImage(GALLERY_REAL_PATH,$post["picName"]);

					global $pictureSize; 
					$gdImage->makeThumb($pictureSize["maxWidth"], $pictureSize["maxHeight"], false); 
					if(!empty($post['hasThumb'])){ //��������ͼ
						global $thumbSize;	
						if($gdImage->makeThumb($thumbSize["width"], $thumbSize["height"])){
							$this->messList[] = "��������ͼƬ�ɹ���";
						}else{
							$this->messList[] = "��������ͼƬʧ�ܣ�";
							return false;
						}
					}
					   
					if(!empty($post['hasMark'])){	//��ˮӡ
						global $waterText;
						if($gdImage->waterMark($waterText)){
							$this->messList[] = "���ˮӡ�ɹ���";
						}else{
							$this->messList[] = "���ˮӡʧ�ܣ�";
							return false;
						}
					}
					
					if($this->add($post)){
						$this->messList[] = "ͼƬ��ӳɹ���";
						return true;
					}else{
						$this->messList[] = "ͼƬ���ʧ�ܣ�";
						return false;
					}
				}else{
					$this->messList[] = "ͼƬ�ϴ�ʧ�ܣ�";
					return false; 
				}
			}else{
				$this->messList[] = "ͼƬ�ϴ�ʧ�ܣ�";
				return false;
			}
		}


		 function getRowTotal($catId){
			$result=$this->mysqli->query("SELECT * FROM {$this->tabName} WHERE  catId={$catId}");
			return $result->num_rows;	
		}	

		function getAllPic($catId, $offset, $num) {
			$sql = "SELECT id, picTitle, picName, description, hasThumb, hasMark FROM {$this->tabName}
				WHERE catId={$catId} ORDER BY id DESC LIMIT $offset, $num";
			$result=$this->mysqli->query($sql);

			while($row=$result->fetch_assoc()){
				$data[]=$row;
			}
			return $data;
		}

		function getPicPro($id){
			$pic=$this->get($id);

			$info=$this->getPicInfo($pic["picName"]);
			$pic["width"]=$info["width"];
			$pic["height"]=$info["height"];
			$pic["size"]=$info["size"];

			if($pic["hasThumb"]){
				$newPic=str_replace(".", "_new.", $pic["picName"]);
				$infoH=$this->getPicInfo($newPic);
				$pic["width_h"]=$infoH["width"];
				$pic["height_h"]=$infoH["height"];
				$pic["size_h"]=$infoH["size"];
				$pic["newName"]=$newPic;
			}
			return $pic;
		}

		private function getPicInfo($picName){
			$file=GALLERY_REAL_PATH.$picName;
			$data	= getimagesize($file);
			$imageInfo["width"] = $data[0];
			$imageInfo["height"]= $data[1];
			$imageInfo["size"]  = Common::sizeCount(filesize($file));
			return $imageInfo;		
		}

		function getPicPath($id){
			$sql="SELECT picName, description, hasThumb,hasMark FROM {$this->tabName} WHERE id={$id}";
			$result=$this->mysqli->query($sql);
			$pic=$result->fetch_assoc();
			if($pic["hasMark"]==1 || $pic["hasThumb"]==1){
				$picPath=str_replace(".", "_new.", $pic["picName"]);
			}else{
				$picPath=$pic["picName"];
			}

			if(file_exists(GALLERY_REAL_PATH.$picPath)){
				return GALLERY_PATH.$picPath;
			}else{
				return false;
			}
		}

		function validateForm($post){
		        $result=true;
		
			if(!Validate::required($post['picTitle'])) {
				$this->messList[] = "ͼƬ���ⲻ��Ϊ��.";
				$result=false;
			}
			if(!Validate::checkLength($post['description'], 200)) {
				$this->messList[] = "ͼƬ�������ܳ���200���ַ�.";
				$result=false;
			}
			return  $result;
		}
	}
?>
