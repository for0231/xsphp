<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=gb2312">
		<title>��ȡ��������Ϣ�ĵ�һ��PHP����</title>	
	</head>	
	<body>			
<?php		
	$sysos = $_SERVER["SERVER_SOFTWARE"];	     //��ȡ��������ʶ���ִ�
	$sysversion = PHP_VERSION;                   //��ȡPHP�������汾	

	//����������������MySQL���ݿⲢ��ȡMySQL���ݿ�汾��Ϣ
	mysql_connect("localhost", "mysql_user", "mysql_pass"); 	
	$mysqlinfo = mysql_get_server_info();	

	//�ӷ������л�ȡGD�����Ϣ
	if(function_exists("gd_info")){                   
		$gd = gd_info();
		$gdinfo = $gd['GD Version'];
	}else {
		$gdinfo = "δ֪";
	}

        //��GD���в鿴�Ƿ�֧��FreeType����
	$freetype = $gd["FreeType Support"] ? "֧��" : "��֧��";  
	
	//��PHP�����ļ��л���Ƿ����Զ���ļ���ȡ
	$allowurl= ini_get("allow_url_fopen") ? "֧��" : "��֧��";
	
	//��PHP�����ļ��л������ϴ�����
	$max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
	
	//��PHP�����ļ��л�ýű������ִ��ʱ��
	$max_ex_time= ini_get("max_execution_time")."��";

	//����������ȡ������ʱ�䣬�й���½���õ��Ƕ�������ʱ��,����ʱ��д��Etc/GMT-8
	date_default_timezone_set("Etc/GMT-8");
	$systemtime = date("Y-m-d H:i:s",time());
	
	/*  *******************************************************************  */	
	/*   ��HTML������ʽ�����ϻ�ȡ���ķ�������Ϣ������ͻ��������          */	
	/*  *******************************************************************  */	
	echo "<table align=center cellspacing=0 cellpadding=0>";
	echo "<caption> <h2> ϵͳ��Ϣ  </h2> </caption>";
	echo "<tr> <td> Web��������    </td> <td> $sysos        </td> </tr>";
        echo "<tr> <td> PHP�汾��      </td> <td> $sysversion   </td> </tr>";
	echo "<tr> <td> MySQL�汾��    </td> <td> $mysqlinfo    </td> </tr>";
	echo "<tr> <td> GD��汾��     </td> <td> $gdinfo       </td> </tr>";
	echo "<tr> <td> FreeType��     </td> <td> $freetype     </td> </tr>";
	echo "<tr> <td> Զ���ļ���ȡ�� </td> <td> $allowurl     </td> </tr>";
	echo "<tr> <td> ����ϴ����ƣ� </td> <td> $max_upload   </td> </tr>";
	echo "<tr> <td> ���ִ��ʱ�䣺 </td> <td> $max_ex_time  </td> </tr>";
	echo "<tr> <td> ������ʱ�䣺   </td> <td> $systemtime   </td> </tr>";
	echo "</table>";
?>
	<body>
</html>

