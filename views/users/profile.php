<div class="container">
	<?php if ($username == $_SESSION['username']){ ?>
		<h1>My profile</h1>
	<?php } else { ?>
		<h1><?php echo $username; ?>'s profile</h1>
	<?php } ?>
</div>