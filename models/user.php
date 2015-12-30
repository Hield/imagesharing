<?php 
	class User{
		public $id;
		public $username;
		public $permission;

		public function __construct($id, $username, $permission){
			$this->id = $id;
			$this->username = $username;
			$this->permission = $permission;
		}

		public static function create($username, $pwd){
			$db = Db::getInstance();
			$req = $db->prepare('INSERT INTO users(username, pwd) VALUES(:username, :pwd)');
			$req->execute(array(':username' => $username, ':pwd' => sha1($pwd)));
		}

		public static function is_valid($username){
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM users WHERE username = :username');
			$req->execute(array(':username' => $username));
			$user = $req->fetch();
			if (!empty($user)){
				return false;
			} else {
				return true;
			}
		}

		public static function find($username, $pwd){
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM users WHERE username = :username AND pwd = :pwd');
			$req->execute(array(':username' => $username, ':pwd' => sha1($pwd)));
			$user = $req->fetch();
			if (empty($user)){
				return false;
			} else {
				return new User($user['id'], $user['username'], $user['permission']);
			}
		}
	}
?>