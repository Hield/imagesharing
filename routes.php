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
		}

		// call the action
		$controller->{ $action }();
	}

	$controllers = array('pages'  => ['home'],
						 'images' => ['index', 'show', 'add']);

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