<?php
	class ImagesController{
		public function index(){
			$images = Image::all();
			require_once('views/images/index.php');
		}

		public function show(){
			$image = Image::find(Request::get_id());
			require_once('views/images/show.php');
		}

		public function add(){
			if (!$_FILES['image']['name']){
				return call('pages', 'error');
			}
			$target_dir = "assets/img/";
			$target_file = $target_dir . basename($_FILES['image']['name']);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

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
				if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)){
					Image::create($target_file);
					$_SESSION['notice'] = "The image " . basename($_FILES['image']['name']) . " has been uploaded.";
				} else {
					$_SESSION['alert'] = "Sorry, there was an error uploading your file. ";	
				}
			}
			redirect_to('images', 'index');
		}
	}
?>