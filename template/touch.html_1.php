<?php include_once 'head.html.php'; ?>
<header>
  <div class="container">
    <h1><img src='<?php echo $config['logo']; ?>' height="150px"/></h1>
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
    <ul class="list-group  row">
      <?php
      foreach ($reservations as $reservation) {
        ?>
        <li class="list-group-item col-md-6">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-2">
                  <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
                </div>
                <div class="col-md-4">
                  <div>
                    <!-- Room name -->
                    <?php echo $reservation['resourceName']; ?>
                  </div>
                  <!-- Floor Title -->
                  <?php echo $reservation['floorTitle']; ?>
                </div>
                <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
                  <div class="col-md-6">
                    <img class='img-thumbnail img-responsive' src='images/logos/<?php echo $reservation['title'] ?>.png'/>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-8">
                  <div><strong><?php echo $reservation['title']; ?></strong></div>
                  <!-- Event name -->
                  <?php echo $reservation['description']; ?>
                </div>
              </div>
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
<!-- Search-->
<div id="search">
  <div class="row">
    <div id="custom-search-input" class="col-md-8 col-md-offset-2">
      <div class="input-group col-md-12">
        <input type="text" class="form-control input-lg" placeholder="Touch me to search ;)" />
        <span class="input-group-btn">
          <button class="btn btn-info btn-lg" type="button">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </span>
      </div>
    </div>
  </div>
</div>
<!-- /.Search-->
<!-- /.container -->
<footer class="footer">
  <div class="container-fluid">
    <h5 class="time pull-left" id="time-part"><?php echo date(TIME_FORMAT); ?></h5>
    <h5 class="pull-right" id="date-part"><?php echo date(DATE_FORMAT); ?></h5>
  </div>
</footer>
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/moment.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="assets/plugins/jquery.virtual_keyboard/jquery.virtual_keyboard.js" type="text/javascript"></script>

<script>
  $(document).ready(function () {
    var $colon = '';
    var interval = setInterval(function () {
      var momentNow = moment();
      $('#date-part').html(momentNow.format('dddd, MMMM Do YYYY'));
      $colon = (':' == $colon) ? ' ' : ':';
      $('#time-part').html(momentNow.format('h') + $colon
              + momentNow.format('mm a'));
    }, 1000);

<?php
if ($height > 15) {
  ?>
      $(".fit-text").fitText(1);
  <?php
} else {
  ?>
      $(".fit-text").fitText(2.4);
  <?php
}
?>
    $(".footer h5").fitText(1.5);

    $('#custom-search-input input').keyboard({

      //theme: 'default',

      //is_hidden: false,

      //close_speed: 1000,

      //enabled: false,

      //layout: 'en_US',

      // definimos un trigger al keyboard.
      // Al hacer click sobre el selector que tenga el id (#) o la clase (.) definida
      // se ocultara o mostrara el keyboard segun corresponda.
      trigger: '#buttom1'
    });
  });

</script>
</body>
</html>