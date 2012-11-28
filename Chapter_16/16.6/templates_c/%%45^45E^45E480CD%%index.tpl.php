<?php /* Smarty version 2.6.18, created on 2009-07-31 03:31:04
         compiled from index.tpl */ ?>
访问从PHP中分配的关联数组:
	电子邮件：<?php echo $this->_tpl_vars['contact']['email']; ?>
  家庭电话：<?php echo $this->_tpl_vars['contact']['phone']['home']; ?>
<br>
访问从PHP中分配的索引数组:
	电子邮件：<?php echo $this->_tpl_vars['contact2'][1]; ?>
  家庭电话：<?php echo $this->_tpl_vars['contact2'][2][0]; ?>
<br>
访问从PHP中分配的索引和关联混合数组：
	第一个电子邮件：<?php echo $this->_tpl_vars['contact3'][0]['first']; ?>
  家庭电话：<?php echo $this->_tpl_vars['contact3']['phone'][0]; ?>
<br>