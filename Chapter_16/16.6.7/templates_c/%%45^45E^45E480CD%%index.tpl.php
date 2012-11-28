<?php /* Smarty version 2.6.18, created on 2009-07-31 03:35:07
         compiled from index.tpl */ ?>
<html>
	<head>
		<title>联系人信息列表</title>
	</head>
	<body>
		<table border="1" width="80%" align="center">
			<caption><h1>联系人信息</h1></caption>
			<tr>
				<th>姓名</th><th>传真</th><th>电子邮件</th><th>联系电话</th>
			</tr>
			<?php $_from = $this->_tpl_vars['contact']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>        				<tr>                            				<?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['col']):
?>       					<td><?php echo $this->_tpl_vars['col']; ?>
</td>	             				<?php endforeach; endif; unset($_from); ?>                       				</tr>                           			<?php endforeach; endif; unset($_from); ?>                           		</table>
	</body>
</html>