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
            <?php
              $min_price = 9999.0;
              $max_price = 0.0;
              $average = 0.0;
              $fuelup_count = 0;
            ?>
          	<?php foreach($fuelups as $fuelup) : ?>
            <tr>
              <td><?php echo $fuelup['fueled_at']; ?></a></td>
              <td><?php echo number_format(($fuelup['amount'] / $fuelup['gallons'] ), 2); ?></a></td>
            </tr>
            <?php
              $average += $fuelup['amount'] / $fuelup['gallons'];
              $fuelup_count += 1;
              if ($fuelup['amount'] / $fuelup['gallons'] > $max_price):
                $max_price = $fuelup['amount'] / $fuelup['gallons']; 
              endif;
              if ($fuelup['amount'] / $fuelup['gallons'] < $min_price):
                $min_price = $fuelup['amount'] / $fuelup['gallons']; 
              endif; 
            ?>
            <?php endforeach; ?>
            <tr>
              <td><b>Max price</b></td>
              <td><?php echo number_format( $max_price, 2); ?></a></td>
            </tr>
            <tr>
              <td><b>min price</b></td>
              <td><?php echo number_format($min_price, 2); ?></a></td>
            </tr>
            <tr>
              <td><b>Avg price</b></td>
              <td><?php echo number_format(($average / $fuelup_count), 2); ?></a></td>
            </tr>

          </tbody>
            
        </table>
      </div>
    </main>
  </div>
</div>
