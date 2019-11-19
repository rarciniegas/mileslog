<?php echo validation_errors(); ?>

<?php echo form_open('vehicles/register'); ?>

<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Register a vehicle</h2>
        <p>Please fill out this form to register a vehicle</p>
        <div class="form-group">
				  <label>Vehicle name</label>
				  <input type="text" class="form-control" name="vehicle_name" placeholder="Vehicle name">
			  </div>
        <div class="form-group">
				  <label>Make</label>
				  <input type="text" class="form-control" name="make" placeholder="Make">
			  </div>
        <div class="form-group">
				  <label>Model</label>
				  <input type="text" class="form-control" name="model" placeholder="Model">
			  </div>
        <div class="form-group">
          <label>License</label>
          <input type="text" class="form-control" name="license" placeholder="License">
        </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo base_url(); ?>vehicle/login" class="btn btn-light btn-block">Login</a>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>


<?php echo form_close(); ?>