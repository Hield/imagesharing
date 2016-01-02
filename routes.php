<?php 
	function call($controller, $action){
		require_once('controllers/'.$controller.'_controller.php');

		switch($controller){
			case 'pages':
				$controller = new PagesController();
			break;
			case 'images':
				require_once('models/image.php');
				$controller = new ImagesController();
			break;
			case 'users':
				require_once('models/user.php');
				$controller = new UsersController();
			break;
		}

		// call the action
		$controller->{ $action }();
	}

	$controllers = array('pages'  => ['home'],
						 'images' => ['index', 'show', 'add', 'add_comment', 'like', 'unlike'],
						 'users'  => ['login', 'register', 'logout', 'images', 'favorites']);

	if (array_key_exists($controller, $controllers)){
		if (in_array($action, $controllers[$controller])){
			call($controller, $action);
		} else {
			call('pages', 'error');
		}
	} else {
		call('pages', 'error');
	}
?>