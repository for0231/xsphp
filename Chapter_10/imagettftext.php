<?php
	$im = imagecreatetruecolor(400, 30);              //����400x300���ش�С�Ļ���
	$white = imagecolorallocate($im, 255, 255, 255);    //������ɫ
	$grey = imagecolorallocate($im, 128, 128, 128);     //������ɫ
	$black = imagecolorallocate($im, 0, 0, 0);          //������ɫ
	imagefilledrectangle($im, 0, 0, 399, 29, $white);     //���һ��ʹ�ð�ɫ���ľ�����Ϊ����
 
    	//����������������Ҫ����ת�룬ת��ΪUTF-8���ַ����ſ���ֱ�Ӵ���
	$text=iconv("GB2312", "UTF-8", "LAMP�ֵ����������ֵܣ�����̣�");
	$font = 'simsun.ttc';          //ָ�����壬��ϵͳ����simsum.ttc��Ӧ�����帴�Ƶ���ǰĿ¼��
	imagettftext($im, 20, 0, 12, 21, $grey, $font, $text);   //���һ����ɫ���ַ�����Ϊ��Ӱ
	imagettftext($im, 20, 0, 10, 20, $black, $font, $text);  //����Ӱ֮�����һ����ɫ���ַ���

	header("Content-type: image/png");               //֪ͨ������������ʽΪPNG��ͼ��
	imagepng($im);                               //������������PNG��ʽ��ͼ��
	imagedestroy($im);                            //������Դ���ͷ��ڴ�ռ�õĿռ�
?>
