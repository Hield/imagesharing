<?php
	class Image{

		public $id;
		public $img_src;
		public $created_on;
		public $created_by;

		public function __construct($id, $img_src, $created_on, $created_by){
			$this->id = $id;
			$this->img_src = $img_src;
			$this->created_by = $created_by;
			$this->created_on = $created_on;
		}

		public static function all(){
			$list = [];
			$db = Db::getInstance();
			$req = $db->query('SELECT * FROM images');

			foreach($req->fetchAll() as $image){
				$list[] = new Image($image['id'], $image['img_src'], $image['created_on'], $image['created_by']);
			}
			return $list;
		}

		public static function create($img_src){
			$db = Db::getInstance();
			if (isset($_SESSION['user_id'])){
				$req = $db->prepare('INSERT INTO images(img_src, created_on, created_by) VALUES(:img_src, CURDATE(), :created_by)');
				$req->execute(array('img_src' => $img_src, 'created_by' => $_SESSION['user_id']));
			} else {
				$req = $db->prepare('INSERT INTO images(img_src, created_on) VALUES(:img_src, CURDATE())');
				$req->execute(array('img_src' => $img_src));
			}
		}

		public static function find($id){
			$db = Db::getInstance();
			$id = intval($id);
			$req = $db->prepare('SELECT * FROM images WHERE id = :id');
			$req->execute(array('id' => $id));
			$image = $req->fetch();
			if (empty($image)){
				redirect_to('pages', 'error');
			} else {
				return new Image($image['id'], $image['img_src'], $image['created_on'], $image['created_by']);
			}
		}
	}
?>