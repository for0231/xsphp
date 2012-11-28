CREATE TABLE User ( 
  id SMALLINT(3) NOT NULL AUTO_INCREMENT,  
  name VARCHAR(10) NOT NULL DEFAULT '', 
  sex VARCHAR(4) NOT NULL DEFAULT '',
  age SMALLINT(2) NOT NULL DEFAULT '0', 
  email VARCHAR(20) NOT NULL DEFAULT '', 
  PRIMARY KEY  (id)   
) ;
INSERT INTO User(name, sex, age, email) VALUES 
("詢議議", "鹹", 27, "gao@lampbrother.net"),  
("醫議議", "躓", 22, "luo@lampbrother.net"), 
("瑕議議", "鹹", 30, "feng@lampbrother.net"),
("抎議議", "躓", 24, "shu@lampbrother.net");  
