<?php
	$im = imagecreate(150,150);                          	 //����һ��150*150�Ļ���
	$bg = imagecolorallocate($im, 255, 255, 255);            //���û����ı�����ɫΪ��ɫ
	$black = imagecolorallocate($im, 0, 0, 0);               //����һ����ɫ����Ϊ��ɫ
	$string="LAMPBrother";                             	//����һ��������ͼ����������ַ���
	imageString($im, 3, 28, 70, $string, $black);              //ˮƽ���ַ���$string�����ͼ����
	imageStringUp($im, 3, 59, 115, $string, $black);          //��ֱ���¶������$string��ͼ����
	for($i=0,$j=strlen($string); $i<strlen($string); $i++,$j--){   //ʹ��ѭ�������ַ������ͼ����
		imageChar($im, 3, 10*($i+1), 10*($i+2), $string[$i], $black);    //������б���ÿ���ַ�
		imageCharUp($im, 3, 10*($i+1), 10*($j+2), $string[$i], $black);  //������б���ÿ���ַ�
	}
	header('Content-type: image/png');                     //���������ͷ����ʶ��
	imagepng($im);                                    //���PNG��ʽ��ͼƬ
?>
