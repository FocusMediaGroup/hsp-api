<?php include_once 'template/head.html.php'; ?>
<!-- Page Content -->
<div class="container-fluid">
  <h1 class="text-center"><image src='images/Sofitel Hotel Logo 150.png'/></h1>
  <h2 class="text-center">Today's Events</h2>
  <div class="container" id="content">
    <table class="table table-condensed table-responsive">
      <tbody>
        <?php
        if (is_array($currentReservations)) {
          foreach ($currentReservations as $reservation) {
            ?>
            <tr>
              <td class="col-md-1 tbl-logo-bg"> 
                <?php if (!in_array($reservation['arrowDirection'], array('right', 'down'))) { ?>
                  <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
                <?php } ?>
              </td>
              <td class="col-md-4 tbl-title-bg">
                <?php echo $reservation['title']; ?>
              </td>
              <td class="col-md-1 tbl-logo-bg">
                <?php if (file_exists('./images/logos/' . $reservation['title'] . '.png')) { ?>
                  <image class='img-responsive' src='images/logos/<?php echo $reservation['title'] ?>.png'/>
                  <?php
                }
                ?>
              </td>
              <td class="col-md-4 tbl-title-bg" style="height: 100%;">
                <table class='table table-condensed table-responsive table-desc' style="height: 100%;">
                  <tbody>
                    <tr><td class="tbl-title-bg">
                        <?php echo $reservation['resourceName']; ?></td></tr>
                    <tr><td class="tbl-title-bg">
                        <?php echo $reservation['description']; ?></td></tr>
                  </tbody>
                </table>
              </td>
              <td class="col-md-1 tbl-logo-bg">
                <?php if (in_array($reservation['arrowDirection'], array('right', 'down'))) { ?>
                  <span class="glyphicon glyphicon-circle-arrow-<?php echo $reservation['arrowDirection']; ?>"></span>
                <?php } ?>
              </td>

            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>    
</div>
<!-- /.container-fluid -->
<?php include_once 'template/footer.html.php'; ?>