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
				<li><a href="#">Log in</a></li>
				<li><a href="#">Register</a></li>
			</ul>

		</div>

	</div>
</nav>