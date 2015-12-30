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
	}
?>