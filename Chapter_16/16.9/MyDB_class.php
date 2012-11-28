<?php
	class MyDB{
		private $mysqli;                     		//保存mysqli扩展中的mysqli对象   
         	/* 本类的构造方法，用来创建mysqli对象并连接到数据库，和初使化一些成员属性 */
		public function __construct() {
			$this->mysqli=new mysqli("localhost", "mysql_user", "mysql_pwd", "products");  
			if(mysqli_connect_errno()) {       	//如果连接失败打印错误信息并退出程序
				echo "连接失败，原因为：".mysqli_connect_error();
				$this->mysqli=FALSE;      	//将mysqli对象赋上false值
				exit();                    	//退出程序
			}		
			$this->showError=$showError;    	//为成员属性showError赋初值
		}
		public function __destruct() {          	//该类的析构方法
			$this->close();                 	//当对象不可用时自动调用本类中的close()方法
		}
		public function close() {             		//调用该方法关闭与数据库的连接并释放资源
			if($this->mysqli)              		//如果mysqli对象存在条件成功
				$this->mysqli->close();    	//调用mysqli对象中的class()方法关闭数据库
			$this->mysqli=FALSE;         		//将成员属生mysqli赋上FALSE值
		}
		public function getRowTotal(){       		//调用该方法返回商品表product中记录总数
			$result=$this->mysqli->query("select * from Product");  //执行Select语句
			return $result->num_rows;	                        //返回结果集中的记录总数
		}
		public function getPageRows($offset, $num){   	//获取指定一段的记录
			$query="SELECT productID,name,price,description FROM product ORDER BY productID LIMIT $offset, $num";
			if($result=$this->mysqli->query($query)){   	//执行Select语句获取指定一段记录
				while($row=$result->fetch_assoc())    	//从结果集中遍历出每一行记录
					$allProduct[]=$row;             //将每行记录都添加到$allProduct数组中
				$result->close();                    	//关闭结果集
				return $allProduct;                  	//返回指定一页的所有行记录
			}else{                                 		//如果查询不成功
				return FALSE;                      	//返回false值
			}
		}
	}
?>
