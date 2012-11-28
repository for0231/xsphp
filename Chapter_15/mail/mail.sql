CREATE TABLE user (                                #创建名称为user的数据表
  id int(11) unsigned NOT NULL auto_increment,     #保存用户的ID，无符号、非空、自动增长
  username varchar(20) NOT NULL default '',        #保存用户名
  userpwd varchar(32) NOT NULL default '',         #保存用户密码
  PRIMARY KEY  (id)                                #将用户的id设置为主键
);
CREATE TABLE mail (                                #创建名称为mail的数据表
  id int(11) unsigned NOT NULL auto_increment,     #保存邮件的ID，无符号、非空、自动增长
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',  #保存用户的ID，与用户表进行关联
  mailtitle varchar(20) NOT NULL default '',       #保存邮件标题
  maildt int(10) unsigned NOT NULL DEFAULT '0',    #保存邮件接收的时间
  PRIMARY KEY  (id)                                #将邮件的id设置为主键
);
