{config_load file="foo.conf"}                            	{* ���������ļ� *}
<html>
	<head><title>{$smarty.config.pageTitle}</title></head>  {* ���������ļ��������ı������ *}
	<body bgcolor="{$smarty.config.bodyBgColor}">       	{* ���������ļ��еı�����ɫ���� *}
		<table border="{$smarty.config.tableBorderSize}" bgcolor="{$smarty.config.tableBgColor}">
			<tr bgcolor="{$smarty.config.rowBgColor}">  {* ���������ļ����еı�����ɫ���� *}
				<td>First</td>
				<td>Last</td>
				<td>Address</td>
			</tr>
		</table>
	</body>
</html>
