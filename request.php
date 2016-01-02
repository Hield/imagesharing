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
				switch (sizeof($comps)){
					case 2:
						if ($comps[1] == ''){
							$this->controller = 'images';
							$this->action = 'index';
						} else {
							$this->controller = $comps[1];
							$this->action = 'index';
						}
						break;
					case 3:
						$this->controller = $comps[1];
						if ($comps[2] == ''){
							$this->action = 'index';
						} else {
							$this->action = $comps[2];
						}

						break;
					case 4:
						$this->controller = $comps[1];
						$this->action = $comps[2];
						$this->id = $comps[3];
						break;
					default:
						$this->controller = 'pages';
						$this->action = 'error';
				}
			} else {
				$this->controller = 'images';
				$this->action = 'index';
			}
			if (sizeof(explode("//", $_SERVER['REQUEST_URI'])) > 1){
				$this->controller = 'pages';
				$this->action = 'error';
			}
			if ($comps[1] == 'users'){
				$temp = $this->action;
				$this->action = $this->id;
				$this->id = $temp;
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