<?php
	/*==================================================================*/
	/*		�ļ���:Validate.class.php                           */
	/*		��Ҫ: ������֤��.                	       	    */
	/*		����: �����                                        */
	/*		����ʱ��: 2009-05-25                                */
	/*		����޸�ʱ��:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class Validate
	{
		//==========================================
		// ����: required($data)
		// ����: �������ݲ���Ϊ��
		// ����: $data ����
		//==========================================
		static function required($data) 
		{
			if(trim($data) == "")
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		//==========================================
		// ����: required($data)
		// ����: �������ݲ���Ϊ��
		// ����: $data ����
		//==========================================
		static function noZero($data) 
		{
			if(trim($data) == 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}

		//==========================================
		// ����: checkLength($data)
		// ����: �������ݲ��ܳ���ָ������
		// ����: $data ����
		// ����: $len ָ������
		//==========================================
		static function checkLength($data, $len)
		{
			if(!is_int($len))
				exit("���Ȳ�����������");
			if(strlen($data) > $len)
			{
				return false;
			}	
			else
			{
				return true;
			}
		}
		//==========================================
		// ����: isNumber($data)
		// ����: ��������Ƿ�Ϊ����
		// ����: $data ����
		//==========================================
		static function isNumber($data)
		{
			$re = "/^\d+$/";
			if(preg_match($re, $data))
				return true;
			else
				return false;
		
		}
		//==========================================
		// ����: match($data, $re)
		// ����: ��������Ƿ�ƥ�������ģʽ
		// ����: $data ����
		// ����: $re ����ʹ�õ�������ʽ
		//==========================================
		static function match($data, $re)
		{
			if(preg_match($re, $data))
				return true;
			else
				return false;
		}
		//==========================================
		// ����: equal($data1, $data2)
		// ����: ���������������Ƿ����
		// ����: $data1,$data2 ����
		//==========================================
		static function equal($data1, $data2)
		{
			if($data1 === $data2)
				return true;
			else
				return false;
		}
	}
?>
