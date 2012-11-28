<table border="1" width="80%" align="center">
	<caption><h1>联系人信息</h1></caption>
	<tr>
		<th>姓名</th><th>传真</th><th>电子邮件</th><th>联系电话</th>
	</tr>
	{section name=line loop=$contact}          {* 使用section遍历数组$contact *}
		<tr>                              {* 输出表格的行开始标记 *}
			<td>{$contact[line].name}</td>   {* 输出数组第二维中下标为name的元素值 *}
			<td>{$contact[line].fax}</td>     {* 输出数组第二维中下标为fax的元素值*}
			<td>{$contact[line].email}</td>   {* 输出数组第二维中下标为email的元素值*}
			<td>{$contact[line].phone}</td>	 {* 输出数组第二维中下标为phone的元素值*}
		</tr>                             {* 输出表格的行结束标记 *}
	{/section}                              {* section区域的结束标记 *}
</table>
