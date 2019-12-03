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
            <?php $total_gallons = 0.0;?>
            <?php $total_spend = 0.0;?>
            <?php $min_miles = 999999;?>
            <?php $max_miles = 0;?>

          	<?php foreach($fuelups as $fuelup) : ?>
            <tr>
              <td><?php echo $fuelup['fueled_at']; ?></a></td>
              <td><?php echo $fuelup['amount']; ?></a></td>
              <td><?php echo $fuelup['gallons']; ?></a></td>
              <td><?php echo number_format($fuelup['miles'], 0); ?></a></td>
              <td>
                <?php if ($prev_miles > 0): ?>
                  <?php echo number_format((($fuelup['miles'] - $prev_miles) / $fuelup['gallons'] ), 2); ?></a>
                <?php endif ?>
              </td>
            </tr>
            <?php 
              $total_gallons += $fuelup['gallons']; 
              $total_spend += $fuelup['amount'];
              if ($fuelup['miles'] > $max_miles):
                $max_miles = $fuelup['miles']; 
              endif;
              if ($fuelup['miles'] < $min_miles):
                $min_miles = $fuelup['miles']; 
              endif; 
              $prev_miles = $fuelup['miles']; 
            ?>
            <?php endforeach; ?>
            <tr>
              <td><b>Totals</b></td>
              <td><?php echo $total_spend; ?></a></td>
              <td><?php echo $total_gallons; ?></a></td>
              <td><?php echo number_format (($max_miles - $min_miles), 0); ?></a></td>
              <td><?php echo number_format((($max_miles - $min_miles) / $total_gallons ), 2); ?></a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
