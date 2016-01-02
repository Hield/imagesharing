<?php
	class Db{
		private static $instance = NULL;
		
		private function __construct(){}
		
		private function __clone(){}
		
		public static function getInstance(){
			if (!isset(self::$instance)){
				$dsn = "pgsql:"
					 ."host=ec2-107-21-224-11.compute-1.amazonaws.com;"
				     . "dbname=dfhl9mo6lrpjtq;"
				     . "user=zgzkbxywkyytcc;"
				     . "port=5432;"
				     . "sslmode=require;"
				     . "password=zkJazJtFPfO_FctNQFeYW2bJMg";
				self::$instance = new PDO($dsn);
			}
			return self::$instance;
		}
	}
?>
