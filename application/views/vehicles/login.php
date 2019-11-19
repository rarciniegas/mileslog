<?php echo validation_errors(); ?>

<?php echo form_open('vehicles/login'); ?>
	<div class="row justify-content-center">
		<div class="col-md-4 col-md-offset-4">
    		<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
			<div class="form-group">
				<input type="text" name="vehicle_name" class="form-control" placeholder="Vehicle name" required autofocus>
			</div>
			<div class="form-group">
				<input type="text" name="license" class="form-control" placeholder="License" required autofocus>
			</div>
			<button type="submit" class="btn btn-primary btn-block">Sign in</button>
		</div>
	</div>
<?php echo form_close(); ?>