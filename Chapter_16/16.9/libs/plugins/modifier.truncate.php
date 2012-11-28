<?php
     /* 函数的定义和原来相同，只是在函数内部功能上做了一此调整，用来截取中文 */
	function smarty_modifier_truncate($string, $length = 80, $etc = '...',$break_words = false) {
		if ($length == 0)                    //如果指定的截取字符串长度为0
			return '';                      //直接返回空字符串
		if (strlen($string) > $length) {         //如果实际字符串的长度大于指定截取的长度
			$length -= strlen($etc);          //将指定截取的长度减去省略符号字符串的长度
			if (!$break_words)             //如果需要匹配单词边界做下面的处理
				$string = preg_replace('/s+?(S+)?$/', '', SubstrGB($string, 0, $length+1)); 
			return SubstrGB($string, 0, $length).$etc;   //返回截取后的字符串
		} else                                     //如果指定截取的长度小于原字符串的长度
			return $string;                         //直接返回原字符串
	}
	/* 该函数作为上面函数的子功能，$str字符串,$start开始的位置,$len 截取长度  */
	function SubstrGB($str,$start,$len) {
		if( strlen($str) > $len) {                     //如果字符串的长度大于截取长度
			$strlen=$strart+$len;                  //实际截取的长度是开始的位置加上截取长度
			for($i=0;$i<$strlen;$i++) {             //遍历在截取长度围内的每个字符
				if(ord(substr($str,$i,1))>0xa0){     //如果ASCII的值是从汉字的开始
					$tmpstr.=substr($str,$i,2);     //两个字符即一个汉字在一起
					$i++;                     //需要跳过一次遍历
				} else {                        //如果ASCII的值是双字节的字
					$tmpstr.=substr($str,$i,1);    //次取一个字符的子字符串
				}
			}
			return $tmpstr;                      //返回处理后的字符串
		} else {                                 //如果字符串的长度小于截取长度
			return $str;                         //不需要处理直接返回
		} 
	} 
?>

