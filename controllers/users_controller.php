<?php
	class UsersController{
		public function login(){
			if (!isset($_POST['username']) || !isset($_POST['pwd'])){
				return call('pages', 'error');
			}
			$user = User::find($_POST['username'], $_POST['pwd']);
				if (empty($user)){
					$_SESSION['alert'] = "Wrong username or password.";
					redirect_to('images', 'index');
				} else {
					$_SESSION['user_id'] = $user->id;
					$_SESSION['username'] = $user->username;
					$_SESSION['permission'] = $user->permission;
					$_SESSION['notice'] = "Logged in successfully.";
					redirect_to('images', 'index');
				}
		}

		public function register(){
			if (!isset($_POST['username']) || !isset($_POST['pwd'])){
				return call('pages', 'error');
			}
			if (!User::is_valid($_POST['username'])){
				$_SESSION['alert'] = "Username has already been used.";
				redirect_to('images', 'index');
			} else {
				User::create($_POST['username'], $_POST['pwd']);
				$_SESSION['notice'] = "Registered successfully.";
				redirect_to('images', 'index');
			}
		}

		public function logout(){
			session_unset();
			$_SESSION['notice'] = "Logged out.";
			redirect_to('images', 'index');
		}

		public function images(){
			$username = Request::get_id();
			$user = User::find_by_username($username);
			if (empty($user)){
				redirect_to('pages', 'error');
			}			
			$check = true;
			if (!isset($_SESSION['username'])){
				$check = false;
			} else if ($username != $_SESSION['username']){
				$check = false;
			}
			require_once('models/image.php');
			$images = Image::find_by_username($username);
			require_once('views/users/images.php');
		}

		public function favorites(){
			$username = Request::get_id();
			$user = User::find_by_username($username);
			if (empty($user)){
				redirect_to('pages', 'error');
			}			
			$check = true;
			if (!isset($_SESSION['username'])){
				$check = false;
			} else if ($username != $_SESSION['username']){
				$check = false;
			}
			require_once('models/image.php');
			$images = Image::find_by_favorite($user->id);
			require_once('views/users/favorites.php');
		}
	}
?>