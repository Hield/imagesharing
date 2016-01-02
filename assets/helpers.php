<?php 
	function relative_path(){
		$path = "";
		if (isset($_SERVER['PATH_INFO'])){
			for ($i = 0; $i < substr_count($_SERVER['PATH_INFO'], "/"); $i++){
				$path = $path . "../";
			}
		}
		return $path;
	}

	function absolute_path(){
		return "https://myimgshare.herokuapp.com/index.php/";
	}


	function link_to($controller, $action){
		return absolute_path() . "$controller/$action";
	}

	function link_to_user($username, $action){
		return absolute_path() . "users/$username/$action";
	}

	function redirect_to($controller, $action){
		header("Location: " . link_to($controller, $action));
		die();
	}
?>
