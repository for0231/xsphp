<?php
	$opt=array(PDO::ATTR_PERSISTENT => TRUE);
	try {
   		$dbh = new PDO('mysql:dbname=testdb;host=localhost', 'mysql_user', 'mysql_pwd', $opt);
	} catch (PDOException $e) {
		echo '���ݿ�����ʧ�ܣ�'.$e->getMessage();
		exit;
	}
	echo "\nPDO�Ƿ�ر��Զ��ύ���ܣ�".$dbh->getAttribute(PDO::ATTR_AUTOCOMMIT);
	echo "\n��ǰPDO�Ĵ������ģʽ��".$dbh->getAttribute(PDO::ATTR_ERRMODE);
	echo "\n���ֶ��ַ��Ĵ�Сдת���� ".$dbh->getAttribute(PDO::ATTR_CASE);
	echo "\n������״̬���������Ϣ�� ".$dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS);
	echo "\n���ַ���ת��ΪSQL��null��".$dbh->getAttribute(PDO::ATTR_ORACLE_NULLS);
	echo "\nӦ�ó�����ǰ��ȡ���ݴ�С��".$dbh->getAttribute(PDO::ATTR_PERSISTENT);
	echo "\n�����ݿ����еķ�������Ϣ��".$dbh->getAttribute(PDO::ATTR_SERVER_INFO);
	echo "\n���ݿ�������汾����Ϣ��".$dbh->getAttribute(PDO::ATTR_SERVER_VERSION);
	echo "\n���ݿ�ͻ��˰汾����Ϣ��".$dbh->getAttribute(PDO::ATTR_CLIENT_VERSION);
?>

