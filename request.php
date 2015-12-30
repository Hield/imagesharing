<?php
	class Request{
		private static $instance = NULL;
		private $controller;
		private $action;
		private $id;

		private function __construct(){
			if (isset($_SERVER['PATH_INFO'])){
				$path = $_SERVER['PATH_INFO'];
				$comps = explode('/', $path);
				if (sizeof($comps) > 4){
					$this->controller = 'pages';
					$this->action = 'error';
				} else {
					$this->controller = $comps[1];
					$this->action = $comps[2];
				}
				if (sizeof($comps) == 4){
					$this->id = $comps[3];
				}
			} else {
				$this->controller = 'images';
				$this->action = 'index';
			}
		}

		public static function get_controller(){
			if (!isset(self::$instance)){
				self::$instance = new Request();
			}
			return self::$instance->controller;
		}

		public static function get_action(){
			if (!isset(self::$instance)){
				self::$instance = new Request();
			}
			return self::$instance->action;
		}

		public static function get_id(){
			if (!isset(self::$instance)){
				self::$instance = new Request();
			}
			return self::$instance->id;
		}
	}
?>