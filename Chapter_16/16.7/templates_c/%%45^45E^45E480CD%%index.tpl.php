<?php /* Smarty version 2.6.18, created on 2009-07-31 03:44:04
         compiled from index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'index.tpl', 1, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "foo.conf"), $this);?>
                          		<html>           
	<head><title><?php echo $this->_config[0]['vars']['pageTitle']; ?>
</title></head>          		<body bgcolor="<?php echo $this->_config[0]['vars']['bodyBgColor']; ?>
">               				<table border="<?php echo $this->_config[0]['vars']['tableBorderSize']; ?>
" bgcolor="<?php echo $this->_config[0]['vars']['tableBgColor']; ?>
">
			<tr bgcolor="<?php echo $this->_config[0]['vars']['rowBgColor']; ?>
">         					<td>First</td>
				<td>Last</td>
				<td>Address</td>
			</tr>
		</table>
	</body>
</html>