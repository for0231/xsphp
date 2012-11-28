<html>
	<head><title> Smarty实现商品列表 </title></head>
	<body>
         	<{* 以表格的形式显式当前页的特定个数数据 *}>
		<table align="center" border="1" width="90%">
			<caption><h1> <{ $tableName }> </h1></caption>
			<tr>
				<th>编号</th> <th>商品名称</th> <th>价格</th> <th>商品介绍</th>
			</tr>
              		<{* 使用section语句遍历从PHP中分配过来的商品数组$products *}>
			<{ section name=record loop=$products }>
				<tr>
					<td> <{ $products[record].productID }> </td>
					<td> <{ $products[record].name }> </td>
					<td> <{ $products[record].price }> </td>
					<td> <{ $products[record].description }> </td>
				</tr>	
			<{ sectionelse }>
				<tr><td colspan=4> 没有任何商品存在 </td></tr>
			<{ /section }>
		</table>
         	<{* 在下面段落中输出和分页有关的信息，并输出用户可以页面切换操作的链接 *}>
		<p align="center">
		共<b> <{ $pageInfo.row_total }> </b>条记录，
		显示第 <b> <{ $pageInfo.page_start }> </b>-<b> <{ $pageInfo.page_end }> </b> 条记录
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
		当前<b> <{ $pageInfo.current_page }>/<{ $pageInfo.page_num }> </b>页
		</p>	
	</body>
</html>
