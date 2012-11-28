DROP TABLE IF EXISTS categories;                            	   #如果表categories存在，将其删除
CREATE TABLE categories (                                          #创建类别数据表categories
  categoryId SMALLINT(4) UNSIGNED NOT NULL AUTO_INCREMENT,   	   #图书类别ID
  pid SMALLINT(4) UNSIGNED NOT NULL DEFAULT '0',                   #图书类别的父ID
  categoryName VARCHAR(15) NOT NULL UNIQUE,                        #图书类别名称
  categoryDesn TEXT NOT NULL,                                      #图书类别描述
  PRIMARY KEY (categoryId)                                         #设置类别ID为主键
) TYPE=MyISAM;                                                     #设置表类型为MyISAM

DROP TABLE IF EXISTS books;                                	   #如果表books存在，将其删除
CREATE TABLE books (                                               #创建图书数据表books
  bookId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,    	   #图书ID
  categoryId SMALLINT(4) UNSIGNED NOT NULL DEFAULT '0',            #图书类类别ID
  bookName VARCHAR(50) NOT NULL,                                   #图书名称
  publisher VARCHAR(100) NOT NULL,                                 #出版社
  author VARCHAR(20) NOT NULL,                                     #图书作者
  price DOUBLE(6,2) NOT NULL,                                      #图书价格
  detail TEXT NOT NULL,                                            #图书介绍
  PRIMARY KEY (bookId),                                            #设置图书ID为主键
  KEY bookname (bookName)                                          #设置图书名称为索引
) TYPE=MyISAM;                                                     #设置表类型为MyISAM

DROP TABLE IF EXISTS users;                               	   #如果表users存在，将其删除
CREATE TABLE users (                                               #创建用户表users
  userId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,     	   #用户ID
  loginName VARCHAR(50) NOT NULL UNIQUE,                           #登录名称
  password VARCHAR(50) NOT NULL,                                   #登录口令
  userName VARCHAR(30) NOT NULL,                                   #真实姓名
  telNo VARCHAR(15) NOT NULL,                                      #联系电话
  address VARCHAR(100) NOT NULL,                                   #收货地址
  postcode VARCHAR(10) NOT NULL,                                   #邮政编码
  PRIMARY KEY (userId)                                             #设置用户ID为主键
) TYPE=MyISAM;                                                     #设置表类型为MyISAM

DROP TABLE IF EXISTS carts;                               	   #如果表carts存在，将其删除
CREATE TABLE carts (                                               #创建购物车表carts
  cartId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,            #购物车ID
  userId MEDIUMINT(8) UNSIGNED NOT NULL,                           #用户ID
  bookId MEDIUMINT(8) UNSIGNED NOT NULL,                           #图书ID
  number SMALLINT(4) UNSIGNED NOT NULL,                            #选购数量
  PRIMARY KEY (cartId)                                             #设置购物车ID为主键
) TYPE=MyISAM;                                                     #设置表类型为MyISAM

DROP TABLE IF EXISTS orders;                            	   #如果表orders存在，将其删除
CREATE TABLE orders (                                              #创建订单表orders
  orderId MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,     	   #订单ID
  userId MEDIUMINT(8) UNSIGNED NOT NULL,                           #用户ID
  bookId MEDIUMINT(8) UNSIGNED NOT NULL,                           #图书ID
  number SMALLINT(4) UNSIGNED NOT NULL,                            #购书数量
  createTime DATETIME NOT NULL,                                    #购书时间
  PRIMARY KEY (orderId)                                            #设置订单ID为主键
) TYPE=MyISAM;                                                     #设置表类型为MyISAM
