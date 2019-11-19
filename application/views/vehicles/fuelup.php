<?php echo validation_errors(); ?>

<?php echo form_open('vehicles/fuelup'); ?>

<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Fuel up</h2>
        <p>Please fill out this form to fuel up a vehicle</p>
        <div class="form-group">
				  <label>Amount</label>
				  <input type="number" step="0.01" class="form-control" name="amount" placeholder="Amount">
			  </div>
        <div class="form-group">
				  <label>Gallons</label>
				  <input type="number" step="0.01" class="form-control" name="gallons" placeholder="Gallons">
			  </div>
        <div class="form-group">
				  <label>Miles</label>
				  <input type="number" class="form-control" name="miles" placeholder="Miles">
			  </div>
 
          <div class="row">
            <div class="col">
              <input type="submit" value="Fuel up" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo base_url(); ?>home" class="btn btn-light btn-block">Cancel</a>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>


<?php echo form_close(); ?>