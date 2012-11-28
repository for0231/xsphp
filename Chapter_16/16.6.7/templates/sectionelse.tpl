{section name=customer loop=$custid}         	{* 使用section迭代处理并输出多个数据数组  *}
	id: {$custid[customer]}<br>             {* 迭代处理数组$custid, 输出所有的客户ID   *}
	name: {$name[customer]}<br>           	{* 迭代处理数组$name, 输出所有的客户名子  *}
	address: {$address[customer]}<br>       {* 迭代处理数组$address, 输出所有的客户地址*}
{sectionelse}                               	{* section在loop指定的数组没有值的时候被执行*}
	<p>数组$custid中没有任何值</p>       	{* 如果看到这条语句，说明数组中没有任何数据*}
{/section}    
