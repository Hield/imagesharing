<?php
	class Image{

		public $id;
		public $user_id;
		public $img_src;
		public $created_on;
		public $created_by;
		public $filename;
		public $likes;
		private $username = NULL;

		public function __construct($id, $user_id, $img_src, $created_on, $created_by, $filename, $likes){
			$this->id = $id;
			$this->user_id = $user_id;
			$this->img_src = $img_src;
			$this->created_by = $created_by;
			$this->created_on = $created_on;
			$this->filename = $filename;
			$this->likes = $likes;
		}

		public static function all(){
			$list = [];
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM images ORDER BY likes DESC');

			foreach($req->fetchAll() as $image){
				$list[] = new Image($image['id'], $image['user_id'], $image['img_src'], $image['created_on'], $image['created_by'], $image['filename'], $image['likes']);
			}
			return $list;
		}

		public static function create($id, $img_src, $filename){
			$db = Db::getInstance();
			if (isset($_SESSION['user_id'])){
				$req = $db->prepare('INSERT INTO images(id, user_id, img_src, created_on, created_by, filename, likes) VALUES(:id, :user_id, :img_src, current_date, :created_by, :filename, 0)');
				$req->execute(array(':id' => $id, ':user_id' => $_SESSION['user_id'], ':img_src' => $img_src, ':created_by' => $_SESSION['username'], ':filename' => $filename));
			} else {
				$req = $db->prepare('INSERT INTO images(id, img_src, created_on, created_by, filename, likes) VALUES(:id, :img_src, current_date, :created_by, :filename, 0)');
				$req->execute(array(':id' => $id, ':img_src' => $img_src, ':created_by' => 'anonymous', ':filename' => $filename));
			}
		}

		public static function find($id){
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM images WHERE id = :id');
			$req->execute(array(':id' => $id));
			$image = $req->fetch();
			if (empty($image)){
				redirect_to('pages', 'error');
			} else {
				return new Image($image['id'], $image['user_id'], $image['img_src'], $image['created_on'], $image['created_by'], $image['filename'], $image['likes']);
			}
		}

		public static function find_by_username($username){
			$list = [];
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM images WHERE created_by = :username');
			$req->execute(array(':username' => $username));
			foreach($req->fetchAll() as $image){
				$list[] = new Image($image['id'], $image['user_id'], $image['img_src'], $image['created_on'], $image['created_by'], $image['filename'], $image['likes']);
			}
			return $list;				
		}

		public static function find_by_favorite($user_id){
			$list = [];
			$images = [];
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM likes WHERE user_id = :user_id');
			$req->execute(array(':user_id' => $user_id));
			foreach($req->fetchAll() as $like){
				$list[] = '"' . $like['image_id'] . '"';
			}
			if (sizeof($list) == 0){
				return false;
			}
			$image_list = join(',', $list);
			$req = $db->query('SELECT * FROM images WHERE id IN (' . $image_list . ')');
			if (empty($req)){
				return false;
			}
			foreach($req->fetchAll() as $image){
				$images[] = new Image($image['id'], $image['user_id'], $image['img_src'], $image['created_on'], $image['created_by'], $image['filename'], $image['likes']);
			}
			return $images;
		}

		public static function like($image_id){
			$db = Db::getInstance();
			$req = $db->prepare('INSERT INTO likes VALUES(:image_id, :user_id)');
			$req->execute(array(':image_id' => $image_id, ':user_id' => $_SESSION['user_id']));
			$req = $db->prepare('UPDATE images SET likes = likes + 1 WHERE id = :id');
			$req->execute(array(':id' => $image_id));
		}

		public static function unlike($image_id){
			$db = Db::getInstance();
			$req = $db->prepare('DELETE FROM likes WHERE image_id = :image_id AND user_id = :user_id');
			$req->execute(array(':image_id' => $image_id, ':user_id' => $_SESSION['user_id']));
			$req = $db->prepare('UPDATE images SET likes = likes - 1 WHERE id = :id');
			$req->execute(array(':id' => $image_id));
		}

		public function is_liked(){
			if (!isset($_SESSION['user_id'])){
				return false;
			}
			$db = Db::getInstance();
			$req = $db->prepare('SELECT * FROM likes WHERE image_id = :image_id AND user_id = :user_id');
			$req->execute(array(':image_id' => $this->id, ':user_id' => $_SESSION['user_id']));
			if (empty($req->fetch())){
				return false;
			} else {
				return true;
			}
		}
	}
?>