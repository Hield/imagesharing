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
				<form class="add-image-form" role="form" action="<?php echo link_to('images', 'add') ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn-default btn-file">
									Browse&hellip; <input type="file" name="image" multiple id="modal-image-input">
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
					</div>
					<p class="add-image-form-warning form-warning">Please choose an image</p>
					<button type="submit" name="submit" class="btn btn-default" disabled="">Upload</button>
				</form>
			</div>

			<div class="modal-preview">
				<hr>
				<div class="row">
					<div class="col-xs-3">
						<h3 class="preview-header">Preview</h3>
					</div>
					<div class="col-xs-9">
						<img id="preview-img" src="#" alt="preview image"/>	
					</div>
				</div>		
			</div>
		</div>

	</div>
</div>

<!-- Login form modal -->
<div id="modal-login-form" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Log in</h3>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form id="login-form" role="form" action="<?php echo link_to_user('temp', 'login') ?>" method="post">
					<div class="form-group">
						<label for="modal-login-username">Username: </label>
						<input type="text" class="form-control" name="username" id="modal-login-username">
					</div>
					<p class="login-form-username-warning form-warning"></p>
					<div class="form-group">
						<label for="modal-login-pwd">Password: </label>
						<input type="password" class="form-control" name="pwd" id="modal-login-pwd">
					</div>
					<p class="login-form-pwd-warning form-warning"></p>
					<button type="submit" class="btn btn-success">Log in</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Register form modal -->
<div id="modal-register-form" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Register</h3>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				<form id="register-form" role="form" action="<?php echo link_to_user('temp', 'register') ?>" method="post">
					<div class="form-group">
						<label for="modal-register-username">Username: </label>
						<input type="text" class="form-control" name="username" id="modal-register-username">
					</div>
					<p class="register-form-username-warning form-warning"></p>
					<div class="form-group">
						<label for="modal-register-email">Email: </label>
						<input type="email" class="form-control" name="email" id="modal-register-email">
					</div>
					<p class="register-form-email-warning form-warning"></p>
					<div class="form-group">
						<label for="modal-register-pwd">Password: </label>
						<input type="password" class="form-control" name="pwd" id="modal-register-pwd">
					</div>
					<p class="register-form-pwd-warning form-warning"></p>
					<div class="form-group">
						<label for="modal-register-pwd-again">Retype password: </label>
						<input type="password" class="form-control" name="pwd-again" id="modal-register-pwd-again">
					</div>
					<p class="register-form-pwd-again-warning form-warning"></p>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
</div>