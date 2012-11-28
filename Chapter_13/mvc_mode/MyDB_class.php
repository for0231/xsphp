<?php
	class MyDB{
		protected $mysqli;
		protected $showError;

		public function __construct($configFile="password.inc.php", $showError=TRUE) {
			require_once($configFile);
			$this->mysqli=new mysqli($dbhost, $dbuser, $dbpasswd, $dbname);

			if(mysqli_connect_errno()) {
				$this->printError("连接失败，原因为：".mysqli_connect_error());
				$this->mysqli=FALSE;
				exit();
			}		
			$this->showError=$showError;
		}


		protected function printError($errorMessage) {
			if($this->showSql) {
				echo '<p><font color="red">'.htmlspecialchars($errorMessage).'</font></p>';
			}
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
