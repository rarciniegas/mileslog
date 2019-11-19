<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <h2><?= $title; ?></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Fueled at</th>
              <th>This sale</th>
              <th>Gallons</th>
              <th>Miles</th>
              <th>MPG</th>
            </tr>
          </thead>
          <tbody>
            <?php $prev_miles = 0;?>
          	<?php foreach($fuelups as $fuelup) : ?>
            <tr>
              <td><?php echo $fuelup['fueled_at']; ?></a></td>
              <td><?php echo $fuelup['amount']; ?></a></td>
              <td><?php echo $fuelup['gallons']; ?></a></td>
              <td><?php echo $fuelup['miles']; ?></a></td>
              <td><?php if ($prev_miles > 0): ?>
                  <?php echo number_format((($fuelup['miles'] - $prev_miles) / $fuelup['gallons'] ), 2); ?></a>
              <?php endif ?>
              <?php $prev_miles = $fuelup['miles']; ?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
