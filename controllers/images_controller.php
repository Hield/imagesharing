<?php
	class ImagesController{
		public function index(){
			$images = Image::all();
			require_once('views/images/index.php');
		}

		public function show(){
			require_once('models/comment.php');
			$image = Image::find(Request::get_id());
			$comments = Comment::find_by_image(Request::get_id());
			require_once('views/images/show.php');
		}

		public function add(){
			if (!$_FILES['image']['name']){
				return call('pages', 'error');
			}
			$uploadOk = 1;

			// check if image file is a actual image or fake image

			if (isset($_POST['submit'])){
				$check = getimagesize($_FILES['image']['tmp_name']);
				if ($check !== false){
					$uploadOk = 1;
				} else {
					$_SESSION['alert'] = "File is not an image.";
					$uploadOk = 0;
				}
			}
			if ($uploadOk == 0){
				$_SESSION['alert'] = $_SESSION['alert'] . " Sorry, your file was not uploaded.";
			} else {
				$image = \Cloudinary\Uploader::upload($_FILES["image"]["tmp_name"]);
				if (!empty($image)){
					Image::create($image['public_id'], $image['url'], basename($image['url']));
					$_SESSION['notice'] = "The image " . basename($_FILES['image']['name']) . " has been uploaded.";
				} else {
					$_SESSION['alert'] = "Sorry, there was an error uploading your file. ";	
				}
			}
			redirect_to('images', 'index');
		}

		public function add_comment(){
			if (!isset($_POST['comment']) || !isset($_POST['image_id'])){
				return call('pages', 'error');
			}
			require_once('models/comment.php');
			Comment::create($_POST['image_id'], $_POST['comment']);
			$_SESSION['notice'] = "Comments saved successfully";
			redirect_to('images', 'show/' . $_POST['image_id']);
		}

		public function like(){
			if (!isset($_SESSION['user_id'])){
				$_SESSION['alert'] = "You must register in order to like an image";
				header('Location: '. $_SESSION['url']);
				die();
			}
			Image::like(Request::get_id());
			header('Location: '. $_SESSION['url']);
			die();
		}

		public function unlike(){
			if (!isset($_SESSION['user_id'])){
				redirect_to('pages', 'error');
			}
			Image::unlike(Request::get_id());
			header('Location: '. $_SESSION['url']);
			die();
		}
	}
?>