  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Home</h1>
      <p>Miles log tracks your mileage automatically using GPS so you no longer need to keep a mileage log or logbook -- all you need to do is let the app record your trips in the background and swipe trips to the left if personal or to the right if for business.</p>
      <?php if($this->session->userdata('logged_in')) : ?>
      	<p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>vehicles/fuelup" role="button">Fuel up &raquo;</a></p>
      <?php endif;?>
    </div>
  </div>