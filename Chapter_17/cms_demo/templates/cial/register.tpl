<html>
	<head>
		<title><{ $appName }>-��Աע��</title>
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/global.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/layout.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/print.css">
		<script src="<{ $stylePath }>/javascript/common.js"></script>
		<script src="<{ $stylePath }>/javascript/register.js"></script>
	</head>
	<body>
		<div id="reg">
       			<div class="dt"><strong>��Աע��</strong><span id="time" class="more"></span></div>
				<script language="javascript" type="text/javascript">
					window.onload=function (){
						setInterval("document.getElementById('time').innerHTML=new Date().toLocaleString()+' ����'+'��һ����������'.charAt(new Date().getDay());",1000);
					}
				</script>
        			<div class="dd">
					<form name="form2"  action="reg_new.php?action=reg" method="post" onsubmit="return validate()">					<input type="hidden" name="url" value="<{ $url }>">
     					 <ul>
       						 <li><span>&nbsp;</span>(��<i class="red"> * </i>�ŵı�ʾΪ������Ŀ���û����������3λС��20λ������������3λ)</li>
        				
        					<li> </li>
        					<li><span>�û�����</span>
          						<input name="userName" type="text" id="username" onblur="checkuser()">
          						<i class="red">*</i> <tt id="userid">(����ʹ�����ģ�����ֹ��[@][.]������������)</tt> </li>
       						<li><span>��¼���룺</span>
          						<input name="userPwd" type="password" id="txtPassword" class="text" onblur="checkpwd()">
          						<i class="red">*</i> </li>
       						 <li><span>ȷ�����룺</span>
         						 <input name="userpwdok" type="password" id="userpwdok" value="" size="20" class="text" onblur="checkpwd()">
         						 <i class="red">*</i> <tt id="pwdokid"></tt> </li>
        					<li><span>�������䣺</span>
         						 <input name="email" type="text" id="email" class="text" onblur="checkemail()">
         						 <i class="red">*</i> <tt id="emailid">(����ȷ��д��ĵ����ʼ���ַ)</tt> </li>
       						 <li><span>��ȫ���⣺</span>
     							   <select name='safequestion' id='safequestion'><option value='0' selected>û��ȫ��ʾ����</option>
							   	<option value='1'>����ϲ���ĸ���ʲô��</option>
							   	<option value='2'>������������ʲô��</option>
								<option value='3'>�����Сѧ��ʲô��</option>
								<option value='4'>��ĸ��׽�ʲô���֣�</option>
								<option value='5'>���ĸ�׽�ʲô���֣�</option>
								<option value='6'>����ϲ����ż����˭��</option>
								<option value='7'>����ϲ���ĸ�����ʲô��</option>
							</select>
       							   <tt id="_safequestion">(��������ʱ����������)</tt> </li>
       						 <li><span>����𰸣�</span>
       							   <input name="safeanswer" type="text" id="safeanswer" class="text" value="" />
       						 </li>
        					<li><span>�Ա�</span>
        						  <input type="radio" name="sex" value="��" /> �� &nbsp;
        						  <input type="radio" name="sex" value="Ů" /> Ů &nbsp;
         						  <input name="sex" type="radio" value="" checked="checked" /> ���� 
						 </li>
  						 <li><span>��֤�룺</span>
         						 <input name="vdcode" type="text" id="vdcode" size="6" class="text" />
         						 <img src="imgcode.php" alt="�����������һ��" style="cursor: pointer;" onclick="javascript: newgdcode(this,this.src);" /> �����壿���ͼƬ����</li>
      					
					</ul>
     					 <hr />
      					<ul>
      						  <li><span>&nbsp;</span>
          						<input class="button"  type="submit" value="ע ��">
       						 </li>
      					</ul>
   				 </form>		
			</div>
		</div>
	</body>
</html>
