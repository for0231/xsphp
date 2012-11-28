{foreach name=myname item=value  from=$demo}              	  {* 使用foreach遍历数组$demo *}
	{if $smarty.foreach.myname.first}                         {* 判断是否是第一次执行循环 *}
		<hr>                                           	  {* 在第一次循环时输出一条线 *}
	{/if}
	{$smarty.foreach.myname.iteration}. 看一下这是第几行<br>  {* 显示当前循环的执行次数 *}
	{if $smarty.foreach.myname.last}                          {* 判断是否是第一次执行循环 *}
		<hr>                                              {* 在最后一次循环时输出一条线 *}
	{/if}
{/foreach}	
共执行了<b>{$smarty.foreach.myname.total}</b>次循环。        	  {* 在循环外获取循环执行的次数 *}
