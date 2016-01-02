<div class="container image-show-container">
	<div class="row">
		<div class="col-md-7">
			<div class="image-div">
				<img class="big-img" src="<?php echo $image->img_src ?>"/>
				<p class="image-date">Uploaded at <?php echo $image->created_on ?> by 
					<?php if ($image->created_by != "anonymous") { ?>
						<span class="label label-success" title="Check out this user">
							<a href="<?php echo link_to_user($image->created_by, 'images'); ?>"><?php echo $image->created_by ?></a>
						</span>
					<?php } else { ?>
						<span class="label label-default">
							<?php echo $image->created_by ?>
						</span>
					<?php } ?>
				</p>
				<?php if (!$image->is_liked()){ ?>
					<a class="link-thumbs-up" href="<?php echo link_to('images', 'like') . "/" . $image->id ?>"><i title="Like this image" class="show-image-thumbs-up fa fa-thumbs-o-up fa-2x"></i></a>
					<p class="show-image-text-like"><?php echo $image->likes ?> people like this image</p>
				<?php } else {?>
					<a class="link-thumbs-down" href="<?php echo link_to('images', 'unlike') . "/" . $image->id ?>"><i title="Unlike" class="show-image-thumbs-up fa fa-thumbs-o-up fa-2x"></i></a> 
					<p class="show-image-text-like">You <?php if ($image->likes != 1) {echo "and " . ($image->likes - 1) . " people ";} ?>like this image</p>
				<?php } ?>
				
			</div>
		</div>
		<div class="col-md-5">
			<div class="comment-form-div">
				<form role="form" action="<?php echo link_to('images', 'add_comment') ?>" method="post">
					<div class="form-group">
						<textarea class="form-control" name="comment" placeholder="Give a comment"></textarea>
					</div>
					<input hidden name="image_id" value="<?php echo $image->id ?>">
					<button type="submit" class="btn btn-default">Save</button>
				</form>
			</div>
			<?php if (!empty($comments)){ ?>
				<div class="comments-div">
					<?php foreach($comments as $comment){ ?>
					<div class="comment-div">
						<p class="comment-header">Posted by
							<?php if ($comment->created_by != "anonymous") { ?>
								<span class="label label-primary" title="Check out this user"><a href="<?php echo link_to_user($comment->created_by, 'images'); ?>"><?php echo $comment->created_by; ?></a></span> at <?php echo $comment->created_on; ?>
							<?php } else { ?>
								<span class="label label-default"><?php echo $comment->created_by; ?></span> at <?php echo $comment->created_on; ?>
							<?php } ?>
						</p>
						<p class="comment-content">
							<?php echo $comment->comment ?>
						</p>
					</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>