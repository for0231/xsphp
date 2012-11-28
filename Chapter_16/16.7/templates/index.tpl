{config_load file="foo.conf"}                          		{* 加载配置文件 *}
<html>           
	<head><title>{#pageTitle#}</title></head>          	{* 引用配置文件中声明的标题变量 *}
	<body bgcolor="{#bodyBgColor#}">               		{* 引用配置文件中声明的背景颜色变量 *}
		<table border="{#tableBorderSize#}" bgcolor="{#tableBgColor#}">
			<tr bgcolor="{#rowBgColor#}">         	{* 引用配置文件中行的背景颜色变量 *}
				<td>First</td>
				<td>Last</td>
				<td>Address</td>
			</tr>
		</table>
	</body>
</html>
