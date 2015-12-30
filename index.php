<?php 
	require_once('connection.php');
	require_once('request.php');
	$controller = Request::get_controller();
	$action = Request::get_action();
	require_once('views/layout.php');
?>