<?php
	$num=0;                          	//����ͳ����Ŀ¼���ļ��ĸ���
	$dirname='phpMyAdmin';            	//����һ�����������浱ǰĿ¼������������һ��Ŀ¼��
	$dir_handle=opendir($dirname);       	//��opendir��Ŀ¼

     	//��������Ŀ¼���ļ���ʹ�ñ���ʽ���
	echo '<table border="0" align="center" width="600" cellspacing="0" cellpadding="0">';
	echo '<caption><h2>Ŀ¼'.$dirname.'���������</h2></caption>';     //���������
	echo '<tr align="left" bgcolor="#cccccc">';                        //��������ֶ���
	echo '<th>�ļ���</th><th>�ļ���С</th><th>�ļ�����</th><th>�޸�ʱ��</th></tr>';
	while($file=readdir($dir_handle)) {    		//ʹ��readdirѭ����ȡĿ¼�������
		$dirFile=$dirname."/".$file;      	//��Ŀ¼�µ��ļ��͵�ǰĿ¼���������������ڳ�����ʹ��
		if($num++%2==0)             		//����һ����ɫ��ͬʱҲ��������num�ۼ�
			$bgcolor='#ffffff';         	//����Ϊ��ɫ����
		else
			$bgcolor='#cccccc';        	//˫��Ϊ��ɫ����
		echo '<tr bgcolor='.$bgcolor.'>';            	//����п�ʼ��ǣ���ʹ�ñ���ɫ
		echo '<td>'.$file.'</td>';                   	//��ʾ�ļ���
         	echo '<td>'.filesize($dirFile).'</td>';         //��ʾ�ļ���С
         	echo '<td>'.filetype($dirFile).'</td>';         //��ʾ�ļ�����
         	echo '<td>'.date("Y/n/t",filemtime($dirFile)).'</td>';       //��ʽ����ʾ�ļ��޸�ʱ��
         	echo '</tr>';
	}
	echo '</table>';                                     //�رձ����
	closedir($dir_handle);                               //�ر��ļ��������

	echo '��<b>'.$dirname.'</b>Ŀ¼�µ���Ŀ¼���ļ�����<b>'.$num.'</b>��';
?>
