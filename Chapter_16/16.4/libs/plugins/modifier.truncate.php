<?php
     /* �����Ķ����ԭ����ͬ��ֻ���ں����ڲ�����������һ�˵�����������ȡ���� */
	function smarty_modifier_truncate($string, $length = 80, $etc = '...',$break_words = false) {
		if ($length == 0)                    //���ָ���Ľ�ȡ�ַ�������Ϊ0
			return '';                      //ֱ�ӷ��ؿ��ַ���
		if (strlen($string) > $length) {         //���ʵ���ַ����ĳ��ȴ���ָ����ȡ�ĳ���
			$length -= strlen($etc);          //��ָ����ȡ�ĳ��ȼ�ȥʡ�Է����ַ����ĳ���
			if (!$break_words)             //�����Ҫƥ�䵥�ʱ߽�������Ĵ���
				$string = preg_replace('/s+?(S+)?$/', '', SubstrGB($string, 0, $length+1)); 
			return SubstrGB($string, 0, $length).$etc;   //���ؽ�ȡ����ַ���
		} else                                     //���ָ����ȡ�ĳ���С��ԭ�ַ����ĳ���
			return $string;                         //ֱ�ӷ���ԭ�ַ���
	}
	/* �ú�����Ϊ���溯�����ӹ��ܣ�$str�ַ���,$start��ʼ��λ��,$len ��ȡ����  */
	function SubstrGB($str,$start,$len) {
		if( strlen($str) > $len) {                     //����ַ����ĳ��ȴ��ڽ�ȡ����
			$strlen=$strart+$len;                  //ʵ�ʽ�ȡ�ĳ����ǿ�ʼ��λ�ü��Ͻ�ȡ����
			for($i=0;$i<$strlen;$i++) {             //�����ڽ�ȡ����Χ�ڵ�ÿ���ַ�
				if(ord(substr($str,$i,1))>0xa0){     //���ASCII��ֵ�ǴӺ��ֵĿ�ʼ
					$tmpstr.=substr($str,$i,2);     //�����ַ���һ��������һ��
					$i++;                     //��Ҫ����һ�α���
				} else {                        //���ASCII��ֵ��˫�ֽڵ���
					$tmpstr.=substr($str,$i,1);    //��ȡһ���ַ������ַ���
				}
			}
			return $tmpstr;                      //���ش������ַ���
		} else {                                 //����ַ����ĳ���С�ڽ�ȡ����
			return $str;                         //����Ҫ����ֱ�ӷ���
		} 
	} 
?>

