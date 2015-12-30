<div class="container">
	<h1>Image ID <?php echo $image->id ?></h1>
	<div class="row">
		<div class="col-md-7">
			<div class="image-div">
				<img class="big-img" src="<?php echo relative_path() . $image->img_src ?>"/>
				<p class="image-date">Uploaded at <?php echo $image->created_on ?> by 
					<span class="label label-success">
						<?php echo ($image->created_by == '' ? "anonymous" : $image->get_user()) ?>
					</span>
				</p>
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
						<p class="comment-header">Posted by <span class="label label-default"><?php echo ($comment->user_id == '' ? "anonymous" : $comment->get_user()) ?></span> at <?php echo $comment->created_on ?>
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