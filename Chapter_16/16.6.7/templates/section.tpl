<table border="1" width="80%" align="center">
	<caption><h1>��ϵ����Ϣ</h1></caption>
	<tr>
		<th>����</th><th>����</th><th>�����ʼ�</th><th>��ϵ�绰</th>
	</tr>
	{section name=line loop=$contact}          {* ʹ��section��������$contact *}
		<tr>                              {* ��������п�ʼ��� *}
			<td>{$contact[line].name}</td>   {* �������ڶ�ά���±�Ϊname��Ԫ��ֵ *}
			<td>{$contact[line].fax}</td>     {* �������ڶ�ά���±�Ϊfax��Ԫ��ֵ*}
			<td>{$contact[line].email}</td>   {* �������ڶ�ά���±�Ϊemail��Ԫ��ֵ*}
			<td>{$contact[line].phone}</td>	 {* �������ڶ�ά���±�Ϊphone��Ԫ��ֵ*}
		</tr>                             {* ��������н������ *}
	{/section}                              {* section����Ľ������ *}
</table>
