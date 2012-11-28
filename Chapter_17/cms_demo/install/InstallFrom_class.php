<?php
	/*==================================================================*/
	/*		�ļ���:InstallFrom_class.php                        */
	/*		��Ҫ: ��װ�����е��û������洦����.          	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-01                                */
	/*		����޸�ʱ��:2009-05-01                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class InstallFrom {	
		private $method;
		private $action;
		private $class;
		//==========================================
		// ����: __construct($method="POST", $action="index.php", $class="white-box") 
		// ����: ���췽�����ڳ�ʹ������ĳ�Ա����
		// ����: metchod��ָ�������ύ������action��ָ�����ύ��λ�ã�classָ��������ʽ��
		// ����: ��
		//==========================================	
		function __construct($method="POST", $action="index.php", $class="white-box") {
			$this->method=$method;
			$this->action=$action;
			$this->class=$class;
		}
		//==========================================
		// ����:  getAgreement()
		// ����: ���ڻ�ȡ���Э�����
		// ����: ��
		// ����: �������Э������ַ���
		//==========================================
		function getAgreement(){
			$fc.='<div class="body-box tip-msg">';
			$fc.='��ӭ��ʹ��LAMP_CMS���ݹ���ϵͳ1.0beta���������Ķ����°�װ�������а�װ.';
			$fc.='</div>';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'" class="'.$this->class.'">';
			$fc.='<div class="body-box">';
			$fc.='<div class="center red-font">LAMP_CMS ���Э��</div>';
			$fc.='<div class="license">';
			$fc.='<ol>';
			$fc.='<li>LAMP_CMS���ݹ���ϵͳ������Ȩ��<a href="http://bbs.lampbrother.net"><span class="red-font">LAMP�ֵ���</span></a>����,δ�������������κ���ҵ��;.</li>';
			$fc.='<li>�û�����������ʹ�ò�����������Ĳ��԰汾,�Ա�������κθ����뽫���°汾����LAMP�ֵ���������һ��.</li>';
			$fc.='<li>�κ���Ըʹ�ò��԰汾���û�,LAMP�ֵ��������ṩ�κ�ʹ�ñ��ϡ���������Ҳ���е��κ���ʹ�ñ���������������������Ρ�</li>';
			$fc.='<ol>';	
			$fc.='</div></div>';
			$fc.='<div class="center body-box">';
			$fc.='<input type="hidden" name="step" value="2">';
			$fc.='<input type="submit" class="button" value="��ͬ��">';
			$fc.='<input type="button" class="button" value="�Ҳ�ͬ��" onclick="window.close()">';
			$fc.='</div>';
			$fc.='</form>';
			return $fc;	
		}
		//==========================================
		// ����: getDbFrom($info, $inputs, $error="tip-msg")
		// ����: ��ȡ���ݿ����ñ�
		// ����: info�ǰ�װ�����е���ʾ��Ϣ��inputs���û��ڱ���������������飬error�Ǵ��󱨸����ʽ��
		// ����: ���ݿ����ñ������ַ���
		//==========================================
		function getDbFrom($info, $inputs, $error="tip-msg"){
			$fc.='<div class="body-box '.$error.'">'.$info.'</div>';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'" class="'.$this->class.'">';
			$fc.='<ul>';

			$fc.='<li class="light-row">';
			$fc.='<span class="col_width">���ݿ���������</span>';
			$fc.='<input type="text" class="text-box" name="DB_HOST" value="'.$inputs["DB_HOST"].'">';
			$fc.='���ݿ��������ַ, һ��Ϊ localhost';
			$fc.='</li>';
			
			$fc.='<li class="dark-row">';
			$fc.='<span class="col_width">���ݿ��û���</span>';
			$fc.='<input type="text" class="text-box" name="DB_USER" value="'.$inputs["DB_USER"].'">';	
			$fc.='���ݿ��˺��û���';
			$fc.='</li>';

			$fc.='<li class="light-row">';
			$fc.='<span class="col_width">���ݿ�����</span>';
			$fc.='<input type="password" class="text-box" name="DB_PWD" value="'.$inputs["DB_PWD"].'">';	
			$fc.='���ݿ��˺�����';
			$fc.='</li>';

			$fc.='<li class="dark-row">';
			$fc.='<span class="col_width">���ݿ�����</span>';
			$fc.='<input type="text" class="text-box" name="DB_NAME" value="'.$inputs["DB_NAME"].'">';	
			$fc.='���ݿ�����';
			$fc.='</li>';


			$fc.='<li class="light-row">';
			$fc.='<span class="col_width">����ǰ׺</span>';
			$fc.='<input type="text" class="text-box" name="TAB_PREFIX" value="'.$inputs["TAB_PREFIX"].'">';
			$fc.='ͬһ���ݿⰲװ��CMSʱ�ɸı�Ĭ��';
			$fc.='</li>';

			$fc.='<li class="dark-row">';
			$fc.='<span class="col_width">��վ����</span>';
			$fc.='<input type="text" class="text-box" name="APP_NAME" value="'.$inputs["APP_NAME"].'">';	
			$fc.='�����ڱ���������ʾ';
			$fc.='</li>';

			$fc.='</ul>';
			$fc.='<div class="center body-box">';
			$fc.='<input type="hidden" name="step" value="3">';
			$fc.='<input type="button" class="button" value="��һ��" onclick="history.back()">';
			$fc.='<input type="submit" class="button" value="��һ��" >';
			$fc.='</div>';
			$fc.='</form>';
			return $fc;	
		}
		//==========================================
		// ����: getAdminFrom($info, $inputs, $error="tip-msg")
		// ����: ��д����Ա�û���������ı�
		// ����: info�ǰ�װ�����е���ʾ��Ϣ��inputs���û��ڱ���������������飬error�Ǵ��󱨸����ʽ��
		// ����: ����Ա��ӱ������ַ���
		//==========================================
		function getAdminFrom($info, $inputs, $error="tip-msg"){
			$fc.='<div class="body-box '.$error.'">'.$info.'</div>';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'" class="'.$this->class.'">';
			$fc.='<ul>';

			$fc.='<li class="light-row liimg">';
			$fc.='<span class="col_width">����Ա�ʺ�</span>';
			$fc.='<input type="text" class="text-box" name="ADMIN_USER" value="'.$inputs["ADMIN_USER"].'">';
			$fc.='</li>';
			
			$fc.='<li class="dark-row liimg">';
			$fc.='<span class="col_width">����Ա����</span>';
			$fc.='<input type="password" class="text-box" name="ADMIN_PWD" value="'.$inputs["ADMIN_PWD"].'">';
			$fc.='</li>';
			$fc.='<li class="light-row liimg">';
			$fc.='<span class="col_width">�ظ�����</span>';
			$fc.='<input type="password" class="text-box" name="ADMIN_REPWD" value="'.$inputs["ADMIN_REPWD"].'">';	
			$fc.='</li>';
			$fc.='<li class="dark-row liimg">';
			$fc.='<span class="col_width">����Ա����</span>';
			$fc.='<input type="text" class="text-box" name="ADMIN_MAIL" value="'.$inputs["ADMIN_MAIL"].'">';	
			$fc.='</li>';

			$fc.='</ul>';
			$fc.='<div class="center body-box">';
			$fc.='<input type="hidden" name="step" value="4">';
			$fc.='<input type="button" class="button" value="��һ��" onclick="history.back()">';
			$fc.='<input type="submit" class="button" value="��һ��" >';
			$fc.='</div>';
			$fc.='</form>';
			return $fc;	
		}
		//==========================================
		// ����: getInstallMessage($message, $installStats)
		// ����: ��װ��Ϣ��ʾ�ı�����
		// ����: $message�ǰ�װ����ʾ��Ϣ��installStats��װ�ĳɹ���ʧ�ܵ�״̬��Ϣ
		// ����: ��װ��Ϣ��ʾ�����ַ���
		//==========================================
		function getInstallMessage($message, $installStats){
			$fc="";
			$fc.='<div class="body-box tip-msg">';
			$fc.='��װ��Ϣ��ʾ����';
			$fc.='</div>';
			$fc.='<div class="body-box">';
			$fc.='<div class="license">';
			$fc.=$message;
			$fc.='</div></div>';
			$fc.='<div class="center body-box">';
			$fc.='<form method="'.$this->method.'" action="'.$this->action.'">';
			if($installStats){
				$fc.='<input type="hidden" name="step" value="5">';
				$fc.='<input type="submit" class="button" value="��ϲ����װ�ɹ������������ҳ" >';
			
			}else{
				$fc.='<input type="button" class="button" value="��װʧ�ܣ��뷵��" onclick="history.back()">';
			}	
			$fc.='</form>';
			$fc.='</div>';
			return $fc;	
		}

	}
?>
