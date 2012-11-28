DROP TABLE IF EXISTS categories;                            	   #�����categories���ڣ�����ɾ��
CREATE TABLE categories (                                          #����������ݱ�categories
  categoryId SMALLINT(4) UNSIGNED NOT NULL AUTO_INCREMENT,   	   #ͼ�����ID
  pid SMALLINT(4) UNSIGNED NOT NULL DEFAULT '0',                   #ͼ�����ĸ�ID
  categoryName VARCHAR(15) NOT NULL UNIQUE,                        #ͼ���������
  categoryDesn TEXT NOT NULL,                                      #ͼ���������
  PRIMARY KEY (categoryId)                                         #�������IDΪ����
) TYPE=MyISAM;                                                     #���ñ�����ΪMyISAM

DROP TABLE IF EXISTS books;                                	   #�����books���ڣ�����ɾ��
CREATE TABLE books (                                               #����ͼ�����ݱ�books
  bookId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    	   #ͼ��ID
  categoryId SMALLINT(4) UNSIGNED NOT NULL DEFAULT '0',            #ͼ�������ID
  bookName VARCHAR(50) NOT NULL,                                   #ͼ������
  publisher VARCHAR(100) NOT NULL,                                 #������
  author VARCHAR(20) NOT NULL,                                     #ͼ������
  price DOUBLE(6,2) NOT NULL,                                      #ͼ��۸�
  detail TEXT NOT NULL,                                            #ͼ�����
  PRIMARY KEY (bookId),                                            #����ͼ��IDΪ����
  KEY bookname (bookName)                                          #����ͼ������Ϊ����
) TYPE=MyISAM;                                                     #���ñ�����ΪMyISAM

DROP TABLE IF EXISTS users;                               	   #�����users���ڣ�����ɾ��
CREATE TABLE users (                                               #�����û���users
  userId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,     	   #�û�ID
  loginName VARCHAR(50) NOT NULL UNIQUE,                           #��¼����
  password VARCHAR(50) NOT NULL,                                   #��¼����
  userName VARCHAR(30) NOT NULL,                                   #��ʵ����
  telNo VARCHAR(15) NOT NULL,                                      #��ϵ�绰
  address VARCHAR(100) NOT NULL,                                   #�ջ���ַ
  postcode VARCHAR(10) NOT NULL,                                   #��������
  PRIMARY KEY (userId)                                             #�����û�IDΪ����
) TYPE=MyISAM;                                                     #���ñ�����ΪMyISAM

DROP TABLE IF EXISTS carts;                               	   #�����carts���ڣ�����ɾ��
CREATE TABLE carts (                                               #�������ﳵ��carts
  cartId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,            #���ﳵID
  userId MEDIUMINT(8) UNSIGNED NOT NULL,                           #�û�ID
  bookId MEDIUMINT(8) UNSIGNED NOT NULL,                           #ͼ��ID
  number SMALLINT(4) UNSIGNED NOT NULL,                            #ѡ������
  PRIMARY KEY (cartId)                                             #���ù��ﳵIDΪ����
) TYPE=MyISAM;                                                     #���ñ�����ΪMyISAM

DROP TABLE IF EXISTS orders;                            	   #�����orders���ڣ�����ɾ��
CREATE TABLE orders (                                              #����������orders
  orderId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,     	   #����ID
  userId MEDIUMINT(8) UNSIGNED NOT NULL,                           #�û�ID
  bookId MEDIUMINT(8) UNSIGNED NOT NULL,                           #ͼ��ID
  number SMALLINT(4) UNSIGNED NOT NULL,                            #��������
  createTime DATETIME NOT NULL,                                    #����ʱ��
  PRIMARY KEY (orderId)                                            #���ö���IDΪ����
) TYPE=MyISAM;                                                     #���ñ�����ΪMyISAM
