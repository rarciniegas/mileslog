<?php echo validation_errors(); ?>

<?php echo form_open('vehicles/get_mpg_dates'); ?>

<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Period to report</h2>
        <p>Please fill out the dates</p>
        <div class="form-group">
				  <label>From</label>
				  <input type="date"  class="form-control" name="from" placeholder="From">
			  </div>
        <div class="form-group">
				  <label>To</label>
				  <input type="date" class="form-control" name="to" placeholder="To">
			  </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Go" class="btn btn-success btn-block">
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