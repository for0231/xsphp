<html>
	<head>
		<title>��ϵ����Ϣ�б�</title>
	</head>
	<body>
		<table border="1" width="80%" align="center">
			<caption><h1>��ϵ����Ϣ</h1></caption>
			<tr>
				<th>����</th><th>����</th><th>�����ʼ�</th><th>��ϵ�绰</th>
			</tr>
			{foreach from=$contact item=row}        {* ���foreach��������$contact *}
				<tr>                            {* ��������п�ʼ��� *}
				{foreach from=$row item=col}       {* �ڲ�foreach��������$row *}
					<td>{$col}</td>	             {* �Ա����ʽ��������е�ÿ������ *}
				{/foreach}                       {* �ڲ�foreach���������� *}
				</tr>                           {* ��������н������ *}
			{/foreach}                           {* ���foreach����Ľ������ *}
		</table>
	</body>
</html>
