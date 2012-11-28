<?php
	/*==================================================================*/
	/*		�ļ���:ValidationCode.class.php                     */
	/*		��Ҫ: ��֤�������.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
     	/* ͨ������Ķ�����Զ�̬��ȡ��֤��ͼƬ������֤���ַ���              */
	class ValidationCode {
		private $width;                                 //��֤��ͼƬ�Ŀ��
		private $height;                               	//��֤��ͼƬ�ĸ߶�
		private $codeNum;                            	//��֤���ַ��ĸ���
		private $checkCode;                           	//��֤���ַ�
		private $image;                               	//��֤�뻭��

		/* ���췽������ʵ������֤����󣬲�ΪһЩ��Ա���Գ�ʹ��        */
		/* ����width: ������֤��ͼƬ�Ŀ�ȣ�Ĭ�Ͽ��ֵΪ60����         */
		/* ����height: ������֤��ͼƬ�ĸ߶ȣ�Ĭ�ϸ߶�ֵΪ20����        */
		/* ����codeNum: ������֤������ĸ�����ֵĸ�����Ĭ�ϸ���Ϊ4��    */
		function __construct($width=60, $height=20, $codeNum=4) {
			$this->width=$width;                     	//Ϊ��Ա����width��ʹ��
			$this->height=$height;                     	//Ϊ��Ա����height��ʹ��
			$this->codeNum=$codeNum;               		//Ϊ��Ա����codeNum��ʹ��
			$this->checkCode=$this->createCheckCode();  	//Ϊ��Ա����checkCode��ʹ��
		}
		function showImage(){                       	 	//ͨ�����ʸ÷���������������ͼ��
			$this->getCreateImage();                 	//�����ڲ���������������������г�ʹ��
			$this->outputText();                     	//��ͼ�������������ַ���
			$this->setDisturbColor();                 	//��ͼ��������һЩ��������
			$this->outputImage();                    	//������Ӧ��ʽ��ͼ�����
		}
		function getCheckCode(){                     		//���ʸ÷�����ȡ�����������֤���ַ���
			return $this->checkCode;                 	//���س�Ա����$checkCode������ַ���
		}
		private function getCreateImage(){              	//��������ͼ����Դ������ʹ����Ӱ
			$this->image=imageCreate($this->width,$this->height);
			$back=imageColorAllocate($this->image, 255, 255, 255);
			$border=imageColorAllocate($this->image, 0, 0, 0);
			imageRectangle($this->image,0,0,$this->width-1,$this->height-1,$border);
		}
		private function createCheckCode(){           		//��������û�ָ���������ַ���
			for($i=0;$i<$this->codeNum;$i++) {
				$number=rand(0,2);
				switch($number){
					case 0 : $rand_number=rand(48,57);break;    //����
					case 1 : $rand_number=rand(65,90);break;    //��д��ĸ
					case 2 : $rand_number=rand(97,122);break;   //Сд��ĸ
				}
				$ascii=sprintf("%c",$rand_number);
				$ascii_number=$ascii_number.$ascii;
			}	
			return $ascii_number;	
		}	
		private function setDisturbColor() {    //���ø������أ���ͼ���������ͬ��ɫ��100����
			for ($i=0;$i<=50;$i++) {
				$color = imagecolorallocate($this->image, rand(0,255), rand(0,255), rand(0,255));
   				 imagesetpixel($this->image,rand(1,$this->width-2),rand(1,$this->height-2),$color);
			}
		}
		private function outputText() {       //�����ɫ������ڷš�����ַ�����ͼ�������
			for ($i=0;$i<=$this->codeNum;$i++) {
   				 $bg_color = imagecolorallocate($this->image, rand(0,255), rand(0,128), rand(0,255));
   				 $x = floor($this->width/$this->codeNum)*$i+3;
   				 $y = rand(0,$this->height-15);
				 imagechar($this->image, 5, $x, $y, $this->checkCode[$i], $bg_color);
 			  }
		}

		private function outputImage(){              		//�Զ����GD֧�ֵ�ͼ�����ͣ������ͼ��
			if(imagetypes() & IMG_GIF){          		//�ж�����GIF��ʽͼ��ĺ����Ƿ����
				header("Content-type: image/gif");  	//���ͱ�ͷ��Ϣ����MIME����Ϊimage/gif
				imagegif($this->image);           	//��GIF��ʽ��ͼ������������
			}elseif(imagetypes() & IMG_JPG){     		//�ж�����JPG��ʽͼ��ĺ����Ƿ����
				header("Content-type: image/jpeg"); 	//���ͱ�ͷ��Ϣ����MIME����Ϊimage/jpeg
				imagejpeg($this->image, "", 0.5);   	//��JPEN��ʽ��ͼ������������
			}elseif(imagetypes() & IMG_PNG){     		//�ж�����PNG��ʽͼ��ĺ����Ƿ����
				header("Content-type: image/png");  	//���ͱ�ͷ��Ϣ����MIME����Ϊimage/png
				imagepng($this->image);          	//��PNG��ʽ��ͼ������������
			}elseif(imagetypes() & IMG_WBMP){   		//�ж�����WBMP��ʽͼ��ĺ����Ƿ����
				 header("Content-type: image/vnd.wap.wbmp");   //���ͱ�ͷΪimage/wbmp
				 imagewbmp($this->image);       	//��WBMP��ʽ��ͼ������������
			}else{                              		//���û��֧�ֵ�ͼ������
				die("PHP��֧��ͼ�񴴽���");    		//�����ͼ�����һ������Ϣ�����˳�����
			}	
		}
		function __destruct(){                      		//���������֮ǰ����ͼ����Դ�ͷ��ڴ�
 			imagedestroy($this->image);            		//����GD���еķ�������ͼ����Դ
		}
	}
?>
