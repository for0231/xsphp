CREATE TABLE user (                                #��������Ϊuser�����ݱ�
  id int(11) unsigned NOT NULL auto_increment,     #�����û���ID���޷��š��ǿա��Զ�����
  username varchar(20) NOT NULL default '',        #�����û���
  userpwd varchar(32) NOT NULL default '',         #�����û�����
  PRIMARY KEY  (id)                                #���û���id����Ϊ����
);
CREATE TABLE mail (                                #��������Ϊmail�����ݱ�
  id int(11) unsigned NOT NULL auto_increment,     #�����ʼ���ID���޷��š��ǿա��Զ�����
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',  #�����û���ID�����û�����й���
  mailtitle varchar(20) NOT NULL default '',       #�����ʼ�����
  maildt int(10) unsigned NOT NULL DEFAULT '0',    #�����ʼ����յ�ʱ��
  PRIMARY KEY  (id)                                #���ʼ���id����Ϊ����
);
