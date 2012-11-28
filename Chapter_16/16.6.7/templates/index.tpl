<html>
	<head>
		<title>联系人信息列表</title>
	</head>
	<body>
		<table border="1" width="80%" align="center">
			<caption><h1>联系人信息</h1></caption>
			<tr>
				<th>姓名</th><th>传真</th><th>电子邮件</th><th>联系电话</th>
			</tr>
			{foreach from=$contact item=row}        {* 外层foreach遍历数组$contact *}
				<tr>                            {* 输出表格的行开始标记 *}
				{foreach from=$row item=col}       {* 内层foreach遍历数组$row *}
					<td>{$col}</td>	             {* 以表格形式输出数组中的每个数据 *}
				{/foreach}                       {* 内层foreach区块结束标记 *}
				</tr>                           {* 输出表格的行结束标记 *}
			{/foreach}                           {* 外层foreach区域的结束标记 *}
		</table>
	</body>
</html>
