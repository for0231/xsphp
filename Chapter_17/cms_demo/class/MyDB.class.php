<?php
	/*==================================================================*/
	/*		文件名:MyDb.class.php                               */
	/*		概要: 数据访问层数据库处理的公共父类.          	    */
	/*		作者: 高洛峰                                        */
	/*		创建时间: 2009-05-25                                */
	/*		最后修改时间:2009-05-25                             */
	/*		copyright (c)2009 lampteacher@gmail.com             */
	/*==================================================================*/
	class MyDB{
		protected $mysqli;
		protected $showError;

		public function __construct($showError=TRUE) {
			$this->mysqli=new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);

			if(mysqli_connect_errno()) {
				$this->printError("连接失败，原因为：".mysqli_connect_error());
				$this->mysqli=FALSE;
				exit();
			}		
			$this->showError=$showError;
		}

		protected function printError($errorMessage="") {
			if($this->showSql) {
				if($errorMessage==""){
					$errorMessage=$this->mysqli->errno.':'.	$this->mysqli->error;
					echo '<p><b>MySQL错误:</b>'.$errorMessage.'</p>';
				}else{
					echo '<p><font color="red">'.htmlspecialchars($errorMessage).'</font></p>';
				}
			}
			exit;
		}
	
		public function getVersion() {
			return $this->mysqli->server_info;
		}

		public function getDBSize($dbName, $tblPrefix=null) {
			$sql = "SHOW TABLE STATUS FROM " . $dbName;
			if($tblPrefix != null) {
				$sql .= " LIKE '$tblPrefix%'";
			}
			$result=$this->mysqli->query($sql);
			$size = 0;
			while($row=$result->fetch_assoc())
				$size += $row["Data_length"] + $row["Index_length"];
			return $size;
		}

		public function close() {
			if($this->mysqli)
				$this->mysqli->close();
			$this->mysqli=FALSE;
		}

		public function __destruct() {
			$this->close();
		}
	}
?>
