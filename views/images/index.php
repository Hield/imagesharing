<div class="container">
	<h1>Welcome <?php echo (isset($_SESSION['user_id']) ? $_SESSION['username'] : "to Image Share"); ?></h1>
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
</div>