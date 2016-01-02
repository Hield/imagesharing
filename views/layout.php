<?php
	session_start();
	require_once('assets/init.php');
	require_once('assets/helpers.php');
?>
<!doctype html>
<html>
	<head>
		<title>Image Share</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/readable/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo relative_path() ?>assets/css/style.css">
	</head>
	<body>
		<?php require_once('assets/navbar.php'); ?>

		<?php if (isset($_SESSION['alert'])) { ?>
			<div class="container alert"><?php echo $_SESSION['alert']; unset($_SESSION['alert']); ?></div>
		<?php } ?>
		<?php if (isset($_SESSION['notice'])) { ?>
			<div class="container notice"><?php echo $_SESSION['notice']; unset($_SESSION['notice']); ?></div>
		<?php } ?>

		<?php require_once('routes.php'); ?>
		<?php $_SESSION['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>
		<?php require_once('assets/modals.php'); ?>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo relative_path() ?>assets/js/function.js"></script>
	</body>
</html>