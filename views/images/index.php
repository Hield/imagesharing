<div class="container">
	<h1>Welcome <?php echo (isset($_SESSION['user_id']) ? $_SESSION['username'] : "to Image Share"); ?></h1>
	<div class="row">
		<?php foreach($images as $image){ ?>
			<div class="col-xs-12 col-sm-6 col-md-3" id="<?php echo $image->id ?>">				
				<div class="thumbnail">
					<a href="<?php echo link_to('images', 'show') . "/" . $image->id ?>"><span></span></a>
					<img class="thumbnail-img" src="<?php echo relative_path() . $image->img_src ?>"/>
				</div>
			</div>
		<?php } ?>
	</div>
</div>