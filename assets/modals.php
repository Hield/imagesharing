<!-- Modal -->
<div id="modal-add-image-form" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content -->
		<div class="modal-content">

			<!-- Modal header -->

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Upload image</h3>
			</div>

			<!-- Modal body -->

			<div class="modal-body">
				<form role="form" action="<?php echo link_to('images', 'add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse&hellip; <input type="file" name="image" multiple>
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-default">Upload</button>
				</form>
			</div>

		</div>

	</div>
</div>