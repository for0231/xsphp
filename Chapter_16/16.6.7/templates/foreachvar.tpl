{foreach name=myname item=value  from=$demo}              	  {* ʹ��foreach��������$demo *}
	{if $smarty.foreach.myname.first}                         {* �ж��Ƿ��ǵ�һ��ִ��ѭ�� *}
		<hr>                                           	  {* �ڵ�һ��ѭ��ʱ���һ���� *}
	{/if}
	{$smarty.foreach.myname.iteration}. ��һ�����ǵڼ���<br>  {* ��ʾ��ǰѭ����ִ�д��� *}
	{if $smarty.foreach.myname.last}                          {* �ж��Ƿ��ǵ�һ��ִ��ѭ�� *}
		<hr>                                              {* �����һ��ѭ��ʱ���һ���� *}
	{/if}
{/foreach}	
��ִ����<b>{$smarty.foreach.myname.total}</b>��ѭ����        	  {* ��ѭ�����ȡѭ��ִ�еĴ��� *}
