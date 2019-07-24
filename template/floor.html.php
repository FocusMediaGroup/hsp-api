<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<!-- Page Content -->
<div class="container">
  <h2 class="text-center text-uppercase">Today's Event - <?php echo $floorTitle; ?></h2>
  <?php
  if (is_array($reservations)) {
    $height = floor(65 / count($reservations)) / 2;
    ?>
    <style>
      .table > tbody > tr > td {
        height: <?php echo (15 > $height) ? $height : 15; ?>vh;
      }
    </style>
    <div class="table-holder">
      <div class="table-div">
        <table class="table">
          <tbody>
            <?php
            foreach ($reservations as $reservation) {
              ?>
              <tr> 
                <td class="col-md-1 tbl-logo-bg" rowspan="2"> 
                  <?php if ("left" == $reservation['arrowDirection']) { ?>
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                  <?php } ?>
                </td>
                <td class="col-md-4 tbl-title-bg fit-text" rowspan="2">
                  <?php echo $reservation['title']; ?>
                </td>
                <td class="col-md-1 tbl-logo-bg" rowspan="2">
                  <?php
                  if (file_exists('./images/logos/' . $reservation['title'] . '.png')) {
                    ?>
                    <img class='text-center' src='images/logos/<?php echo $reservation['title'] . '.png'; ?>' />
                    <?php
                  }
                  ?>
                </td>
                <td class="col-md-4 tbl-title-bg fit-text split-cell">
                  <?php echo $reservation['description']; ?>
                </td>
                <td class="col-md-1 tbl-logo-bg" rowspan="2"> 
                  <?php if ("right" == $reservation['arrowDirection']) { ?>
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td class="fit-text tbl-title-md text-uppercase">
                  <!--Room name-->
                  <?php echo $reservation['resourceName']; ?>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
        <style>
          .table > tbody > tr > td {
            height: <?php echo $height; ?>vh;
          }
        </style>
      </div>
    </div>
    <?php
  } else {
    include_once 'ad.html.php';
  }
  ?>
</div>
<!-- /.container -->
<?php include_once 'footer.html.php'; ?>
