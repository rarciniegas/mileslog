<?php echo validation_errors(); ?>

<?php echo form_open('vehicles/oil_change'); ?>

<div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-5">
        <h2>Oil change</h2>
        <p>Please fill out this form to record the oil change</p>

        <div class="form-group">
				  <label>Miles</label>
				  <input type="number" class="form-control" name="miles" placeholder="Miles">
			  </div>
 
          <div class="row">
            <div class="col">
              <input type="submit" value="Oil changed" class="btn btn-success btn-block">
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