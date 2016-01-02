<div class="container">
	<?php if ($check) { ?>
		<h1>My favorite images</h1>
		<a class="users-link" href="<?php echo link_to_user($username, 'images') ?>">My uploaded images</a>
	<?php } else { ?>
		<h1><?php echo $username; ?>'s favorite images</h1>
		<a class="users-link" href="<?php echo link_to_user($username, 'images') ?>"><?php echo $username; ?>'s uploaded images</a>
	<?php } ?>

	<?php if (!empty($images)) { ?>
		<div class="row">
			<?php foreach($images as $image){ ?>
				<div class="col-xs-12 col-sm-6 col-md-3" id="<?php echo $image->id ?>">				
					<div class="thumbnail">
						<a href="<?php echo link_to('images', 'show') . "/" . $image->id ?>">
							<?php echo cl_image_tag($image->filename, array('width' => 200, 'height' => 200, 'crop' => 'fill')); ?>
						</a>
						<?php if (!$image->is_liked()){ ?>
							<a class="link-thumbs-up" href="<?php echo link_to('images', 'like') . "/" . $image->id ?>"><i title="Like this image" class="thumbnail-thumbs-up fa fa-thumbs-o-up fa-2x"></i></a>
						<?php } else {?>
							<a class="link-thumbs-down" href="<?php echo link_to('images', 'unlike') . "/" . $image->id ?>"><i title="Unlike" class="thumbnail-thumbs-down fa fa-thumbs-o-up fa-2x"></i></a> 
						<?php } ?>
						<p class="text-thumbs-up"><?php echo $image->likes ?> likes</p>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } else { ?>
		<?php if ($check) { ?>
			<h2>You haven't liked any images yet!</h2>
		<?php } else { ?>
			<h2>This user doesn't have any favorite images</h2>
		<?php } ?>
	<?php } ?>
</div>