<?php include_once 'head.html.php'; ?>
<header>
  <div class="container">
    <h1><img src='<?php echo $config['logo']; ?>' height="150px"/></h1>
    <h2 class="text-center">Today's Events</h2>
  </div>
</header>
<div class="container">
  <?php
  if (is_array($reservations)) {
    $height = floor(65 / count($reservations)) / 2;
    ?>
    <style>
      .table > tbody > tr > td {
        height: <?php echo (15 > $height) ? $height : 15; ?>vh;
      }
    </style>
    <!-- Page Content -->
    <ul class="list-group list-inline row">
      <?php
      foreach ($reservations as $reservation) {
        ?>
        <li class="list-group-item list-group-item-info col-md-4">
          <div class="row">
            <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
              <div class="col-md-3">
                <img class='img-thumbnail img-responsive' src='images/logos/<?php echo $reservation['title'] ?>.png'/>
              </div>
              <?php
            }
            ?>
            <div class="col-md-8">
              <strong><?php echo $reservation['title']; ?></strong>
            </div>
            <div class="col-md-8">
              <!-- Room name -->
              <!--<div style="border-bottom:2px solid #3fa63b;height: 50%" class="text-uppercase">-->
              <?php echo $reservation['resourceName']; ?>
            </div>
            <div class="col-md-8">
              <!-- Event name -->
              <?php echo $reservation['description']; ?>
            </div>
            <div class="col-md-8">
              <!-- Floor Title -->
              <?php echo $reservation['floorTitle']; ?>
            </div>
            <div class="col-md-1">
              <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
            </div>
          </div>
        </li>
      <?php }
      ?>
    </ul>
    <?php
  } else {
    include_once 'ad.html.php';
  }
  ?>
</div>
<!-- /.container-fluid -->
<?php include_once 'footer.html.php'; ?>
