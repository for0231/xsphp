{section name=customer loop=$custid}         	{* ʹ��section����������������������  *}
	id: {$custid[customer]}<br>             {* ������������$custid, ������еĿͻ�ID   *}
	name: {$name[customer]}<br>           	{* ������������$name, ������еĿͻ�����  *}
	address: {$address[customer]}<br>       {* ������������$address, ������еĿͻ���ַ*}
{sectionelse}                               	{* section��loopָ��������û��ֵ��ʱ��ִ��*}
	<p>����$custid��û���κ�ֵ</p>       	{* �������������䣬˵��������û���κ�����*}
{/section}    
