<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<!-- Navigation header -->

		<div class="navbar-header">

			<!-- Responsive collapse navigation bar -->

			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Navigation bar main link -->

			<a class="navbar-brand" href="<?php echo link_to('images', 'index'); ?>">IMGSHARE</a>

		</div>

		<!-- Navigation bar body -->

		<div class="navbar-collapse collapse main-navbar-collapse">

			<!-- Left navigation bar -->

			<ul class="nav navbar-nav">
				<li><button type="button" class="btn btn-primary navbar-btn" data-toggle="modal" data-target="#modal-add-image-form">Upload image</button></li>
			</ul>

			<!-- Right navigation bar -->

			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['user_id'])){ ?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
							<?php echo $_SESSION["username"]; ?>	
							<span class="caret"></span>					
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo link_to_user($_SESSION['username'],'images'); ?>">Images</a></li>
							<li><a href="<?php echo link_to_user($_SESSION['username'],'favorites'); ?>">Favorites</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo link_to_user('temp','logout'); ?>">Logout</a></li>
						</ul>
					</li>
				<?php } else { ?>
					<li><a href="#" data-toggle="modal" data-target="#modal-login-form">Log in</a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal-register-form">Register</a></li>
				<?php } ?>
			</ul>

		</div>

	</div>
</nav>