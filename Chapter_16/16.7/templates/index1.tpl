{config_load file="foo.conf"}                            	{* 加载配置文件 *}
<html>
	<head><title>{$smarty.config.pageTitle}</title></head>  {* 引用配置文件中声明的标题变量 *}
	<body bgcolor="{$smarty.config.bodyBgColor}">       	{* 引用配置文件中的背景颜色变量 *}
		<table border="{$smarty.config.tableBorderSize}" bgcolor="{$smarty.config.tableBgColor}">
			<tr bgcolor="{$smarty.config.rowBgColor}">  {* 引用配置文件中行的背景颜色变量 *}
				<td>First</td>
				<td>Last</td>
				<td>Address</td>
			</tr>
		</table>
	</body>
</html>
