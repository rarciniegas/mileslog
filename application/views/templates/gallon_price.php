<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <h2><?= $title; ?></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th>Gallon price</th>
            </tr>
          </thead>
          <tbody>
          	<?php foreach($fuelups as $fuelup) : ?>
            <tr>
              <td><?php echo $fuelup['fueled_at']; ?></a></td>
              <td><?php echo number_format(($fuelup['amount'] / $fuelup['gallons'] ), 3); ?></a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
