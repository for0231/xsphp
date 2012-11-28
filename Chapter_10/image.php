<?php
	// ��������������һ����Դ���͵ı���$image.�����ڴ��п���һ����ʱ����
	$image = imagecreatetruecolor(100, 100);                     //���������Ĵ�СΪ100x100
	
	// ����ͼ�����������ɫ���൱���ڻ���ʱ׼����Ⱦ�Ϻ�
	$white = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);        //Ϊͼ�������ɫΪ��ɫ
	$gray = imagecolorallocate($image, 0xC0, 0xC0, 0xC0);        //Ϊͼ�������ɫΪ��ɫ
	$darkgray = imagecolorallocate($image, 0x90, 0x90, 0x90);      //Ϊͼ�������ɫΪ����ɫ
	$navy = imagecolorallocate($image, 0x00, 0x00, 0x80);         //Ϊͼ�������ɫΪ����ɫ
	$darknavy = imagecolorallocate($image, 0x00, 0x00, 0x50);     //Ϊͼ�������ɫΪ������ɫ
	$red = imagecolorallocate($image, 0xFF, 0x00, 0x00);          //Ϊͼ�������ɫΪ��ɫ
	$darkred = imagecolorallocate($image, 0x90, 0x00, 0x00);      //Ϊͼ�������ɫΪ����ɫ

	imagefill($image, 0, 0, $white);                            //Ϊ����������䱳����ɫ
	// ��̬����3D Ч��
	for ($i = 60; $i > 50; $i--) {                               //ѭ��10�λ�������Ч��
	  imagefilledarc($image, 50, $i, 100, 50, -160, 40, $darknavy, IMG_ARC_PIE); //��һ��Բ�������
	  imagefilledarc($image, 50, $i, 100, 50, 40, 75 , $darkgray, IMG_ARC_PIE);  //��һ��Բ�������
	  imagefilledarc($image, 50, $i, 100, 50, 75, 200 , $darkred, IMG_ARC_PIE);  //��һ��Բ�������
	}

	imagefilledarc($image, 50, 50, 100, 50, -160, 40, $navy, IMG_ARC_PIE);      //��һ��Բ�������
	imagefilledarc($image, 50, 50, 100, 50, 40, 75 , $gray, IMG_ARC_PIE);        //��һ��Բ�������
	imagefilledarc($image, 50, 50, 100, 50, 75, 200 , $red, IMG_ARC_PIE);        //��һ��Բ�������
	
	imageString($image, 1, 15, 55, '34.7%', $white);             //ˮƽ�ػ�һ���ַ���
	imageString($image, 1, 45, 35, '55.5%', $white);             //ˮƽ�ػ�һ���ַ���

	// ������������һ��GIF��ʽ��ͼƬ
	header('Content-type: image/png');	//ʹ��ͷ���������������ͼ��ʽ�����������
	imagepng($image);                       //��������������̬��
	imagedestroy($image);                   //����ͼ���ͷ���Դ
?>

