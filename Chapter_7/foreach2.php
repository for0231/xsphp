<?php
        //����һ��һά�Ĺ�������$contact, ʹ�á�=>�������ָ����ÿ��Ԫ�ص��ַ����±�
	$contact = array("ID" => 1,
		"����" => "��ĳ",
		"��˾" => "A��˾",
		"��ַ" => "������",
		"�绰" => "(010)98765432",
		"EMAIL" => "gao@php.com" 
	);
	//��HTML�б��ķ�ʽ���������ÿ��Ԫ�ص���Ϣ
	echo '<dl>һ����ϵ����Ϣ��';
	foreach($contact as $key => $value){       //ʹ��foreach�ĵڶ��ָ�ʽ�����Ի�ȡ����Ԫ�صļ�/ֵ
		echo "<dd> $key : $value </dd>";   //���ÿ��Ԫ�صļ�/ֵ��
	}
	echo '</dl>';
?>
