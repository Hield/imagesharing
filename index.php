<?php 
	require('cloudinary/Cloudinary.php');
	require('cloudinary/Uploader.php');
	require('cloudinary/Api.php');
	\Cloudinary::config(array( 
	  "cloud_name" => "vung1996", 
	  "api_key" => "671193746799838", 
	  "api_secret" => "jrbslPmrhH6z9n4aeXjHkikdlww" 
	));
	require_once('connection.php');
	require_once('request.php');
	$controller = Request::get_controller();
	$action = Request::get_action();
	require_once('views/layout.php');
?>