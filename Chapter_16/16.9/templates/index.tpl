<html>
	<head><title> Smartyʵ����Ʒ�б� </title></head>
	<body>
         	<{* �Ա�����ʽ��ʽ��ǰҳ���ض��������� *}>
		<table align="center" border="1" width="90%">
			<caption><h1> <{ $tableName }> </h1></caption>
			<tr>
				<th>���</th> <th>��Ʒ����</th> <th>�۸�</th> <th>��Ʒ����</th>
			</tr>
              		<{* ʹ��section��������PHP�з����������Ʒ����$products *}>
			<{ section name=record loop=$products }>
				<tr>
					<td> <{ $products[record].productID }> </td>
					<td> <{ $products[record].name }> </td>
					<td> <{ $products[record].price }> </td>
					<td> <{ $products[record].description }> </td>
				</tr>	
			<{ sectionelse }>
				<tr><td colspan=4> û���κ���Ʒ���� </td></tr>
			<{ /section }>
		</table>
         	<{* ���������������ͷ�ҳ�йص���Ϣ��������û�����ҳ���л����������� *}>
		<p align="center">
		��<b> <{ $pageInfo.row_total }> </b>����¼��
		��ʾ�� <b> <{ $pageInfo.page_start }> </b>-<b> <{ $pageInfo.page_end }> </b> ����¼
		<a href='<{ $url }>?page=1'>|&lt;</a>
		<{ if $pageInfo.prev_page }>
			<a href='<{ $url }>?page=<{ $pageInfo.prev_page }>'>&lt;&lt;</a>
		<{ else }>	
			&lt;&lt;
		<{ /if }>
		<{ if $pageInfo.next_page }>
			<a href='<{ $url }>?page=<{ $pageInfo.next_page }>'>>></a>
		<{ else }>	
			>>
		<{ /if }>
		<a href='<{ $url }>?page=<{ $pageInfo.page_num }>'>>|</a>
		��ǰ<b> <{ $pageInfo.current_page }>/<{ $pageInfo.page_num }> </b>ҳ
		</p>	
	</body>
</html>
