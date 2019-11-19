<div class="container-fluid">
  <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <h2><?= $title; ?></h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Date</th>
              <th>Miles driven</th>
              <th>Days</th>
              <th>Miles per day</th>
            </tr>
          </thead>
          <tbody>
            <?php $prev_miles = 0;?>
          	<?php foreach($fuelups as $fuelup) : ?>
            <?php $current_time = strtotime($fuelup['fueled_at']);?>

            <tr>
              <td><?php echo $fuelup['fueled_at']; ?></a></td>
              <td><?php if ($prev_miles > 0): ?>
                <?php $miles = ($fuelup['miles'] - $prev_miles); ?>
                <?php echo number_format(($fuelup['miles'] - $prev_miles), 2); ?></a>
              <?php endif ?>
              <td>
                <?php if ($prev_miles > 0): ?>
                  <?php $days = (($current_time - $prev_time)/86400); ?>
                  <?php echo number_format((($current_time - $prev_time)/86400), 2); ?></a>
                <?php endif ?>  
              </td>
              <td>
                <?php if ($prev_miles > 0): ?>
                  <?php $days = (($current_time - $prev_time)/86400); ?>
                  <?php echo number_format(($miles / $days), 2); ?></a>
                <?php endif ?>  
              </td>
              <?php $prev_miles = $fuelup['miles']; ?>
              <?php $prev_time = strtotime($fuelup['fueled_at']);?>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
