<{ include "header.tpl" }>
	
<table border="1" align="center" width="90%" cellpadding="3" cellspacing="0">
	<caption><h1> <{ $tableName }> <h1></caption>
	<tr bgcolor="#cccccc">
		<th>���</th><th>����</th><th>�Ա�</th><th>����</th><th>�����ʼ�</th>
	</tr>
	
	<{ loop $users $user }>
		<tr>	
			<{ loop $user $colKey => $colValue }>
				<{ if $colKey == "sex" }>
					<{ if $colValue=="��" }>
						<td bgColor="red"> <{ $colValue }> </td>
					<{ elseif $colValue=="Ů" }>
						<td bgColor="green"> <{ $colValue }> </td>
					<{ else }>
						<td bgColor="blue"> ĩ֪ </td>
					<{ /if }>
				<{ else }>
					<td> <{ $colValue }> </td>
				<{ /if }>
			<{ /loop }>
		</tr>
	<{ /loop }>	
</table>
<center>�����ҵ�<b> <{ $rowNum }> </b>����¼</center>

<{ include 'footer.tpl' }>
