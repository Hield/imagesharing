<?php 
	class Comment{

		public $image_id;
		public $user_id;
		public $created_on;
		public $comment;
		private $username;

		public function __construct($image_id, $user_id, $created_on, $comment){
			$this->image_id = $image_id;
			$this->user_id = $user_id;
			$this->created_on = $created_on;
			$this->comment = $comment;
		}

		public static function find_by_image($image_id){
			$list = [];
			$image_id = intval($image_id);
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM comments WHERE image_id = :image_id');
			$req->execute(array(':image_id' => $image_id));

			foreach($req->fetchAll() as $comment){
				$list[] = new Comment($comment['image_id'], $comment['user_id'], $comment['created_on'], $comment['comment']);
			}
			return $list;
		}

		public static function create($image_id, $comment){
			$db = Db::getInstance();
			$image_id = intval($image_id);
			if (isset($_SESSION['user_id'])){
				$req = $db->prepare('INSERT INTO comments(image_id, user_id, created_on, comment) VALUES(:image_id, :user_id, CURDATE(), :comment)');
				$req->execute(array(':image_id' => $image_id, ':user_id' => $_SESSION['user_id'], ':comment' => $comment));
			} else {
				$req = $db->prepare('INSERT INTO comments(image_id, created_on, comment) VALUES(:image_id, CURDATE(), :comment)');
				$req->execute(array(':image_id' => $image_id, ':comment' => $comment));
			}
		}

		public function get_user(){
			if (!isset($this->username)){
				$db = Db::getInstance();
				$req = $db->prepare('SELECT username FROM users WHERE id = :id');
				$req->execute(array(':id' => $this->user_id));
				$this->username = $req->fetch()['username'];
			}
			return $this->username;
		}
	}
?>