<html>
	<head>
		<title><{ $appName }>-会员注册</title>
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/global.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/layout.css">
		<link rel="stylesheet" type="text/css" href="<{ $stylePath }>/css/print.css">
		<script src="<{ $stylePath }>/javascript/common.js"></script>
		<script src="<{ $stylePath }>/javascript/register.js"></script>
	</head>
	<body>
		<div id="reg">
       			<div class="dt"><strong>会员注册</strong><span id="time" class="more"></span></div>
				<script language="javascript" type="text/javascript">
					window.onload=function (){
						setInterval("document.getElementById('time').innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);
					}
				</script>
        			<div class="dd">
					<form name="form2"  action="reg_new.php?action=reg" method="post" onsubmit="return validate()">					<input type="hidden" name="url" value="<{ $url }>">
     					 <ul>
       						 <li><span>&nbsp;</span>(带<i class="red"> * </i>号的表示为必填项目，用户名必须大于3位小于20位，密码必须大于3位)</li>
        				
        					<li> </li>
        					<li><span>用户名：</span>
          						<input name="userName" type="text" id="username" onblur="checkuser()">
          						<i class="red">*</i> <tt id="userid">(可以使用中文，但禁止除[@][.]以外的特殊符号)</tt> </li>
       						<li><span>登录密码：</span>
          						<input name="userPwd" type="password" id="txtPassword" class="text" onblur="checkpwd()">
          						<i class="red">*</i> </li>
       						 <li><span>确认密码：</span>
         						 <input name="userpwdok" type="password" id="userpwdok" value="" size="20" class="text" onblur="checkpwd()">
         						 <i class="red">*</i> <tt id="pwdokid"></tt> </li>
        					<li><span>电子邮箱：</span>
         						 <input name="email" type="text" id="email" class="text" onblur="checkemail()">
         						 <i class="red">*</i> <tt id="emailid">(请正确添写你的电子邮件地址)</tt> </li>
       						 <li><span>安全问题：</span>
     							   <select name='safequestion' id='safequestion'><option value='0' selected>没安全提示问题</option>
							   	<option value='1'>你最喜欢的格言什么？</option>
							   	<option value='2'>你家乡的名称是什么？</option>
								<option value='3'>你读的小学叫什么？</option>
								<option value='4'>你的父亲叫什么名字？</option>
								<option value='5'>你的母亲叫什么名字？</option>
								<option value='6'>你最喜欢的偶像是谁？</option>
								<option value='7'>你最喜欢的歌曲是什么？</option>
							</select>
       							   <tt id="_safequestion">(忘记密码时重设密码用)</tt> </li>
       						 <li><span>问题答案：</span>
       							   <input name="safeanswer" type="text" id="safeanswer" class="text" value="" />
       						 </li>
        					<li><span>性别：</span>
        						  <input type="radio" name="sex" value="男" /> 男 &nbsp;
        						  <input type="radio" name="sex" value="女" /> 女 &nbsp;
         						  <input name="sex" type="radio" value="" checked="checked" /> 保密 
						 </li>
  						 <li><span>验证码：</span>
         						 <input name="vdcode" type="text" id="vdcode" size="6" class="text" />
         						 <img src="imgcode.php" alt="看不清楚，换一张" style="cursor: pointer;" onclick="javascript: newgdcode(this,this.src);" /> 看不清？点击图片更换</li>
      					
					</ul>
     					 <hr />
      					<ul>
      						  <li><span>&nbsp;</span>
          						<input class="button"  type="submit" value="注 册">
       						 </li>
      					</ul>
   				 </form>		
			</div>
		</div>
	</body>
</html>
