<?php include_once 'template/head.html.php'; ?>
<!-- Page Content -->
<div class="container">
  <h1 class="title text-center"><img src='images/Sofitel Hotel Logo 150.png'></h1>
  <h2 class="text-center">Today's Event - <?php echo $floor_title; ?></h2>
  <table class="table">
    <tbody>
      <?php
      if (is_array($currentReservations)) {
        foreach ($currentReservations as $reservation) {
          ?>
          <tr> 
            <td class="col-md-1 tbl-logo-bg"> 
              <?php if ("left" == $reservation['arrowDirection']) { ?>
                <span class="glyphicon glyphicon-circle-arrow-left"></span>
              <?php } ?>
            </td>
            <td class="col-md-4 tbl-title-bg">
              <?php echo $reservation['title']; ?>
            </td>
            <td class="col-md-1 tbl-logo-bg">
              <?php
              if (file_exists('./images/logos/' . $reservation['title'] . '.png')) {
                ?>
                <img class='text-center' src='images/logos/<?php echo $reservation['title'] . '.png'; ?>' />
                <?php
              }
              ?>
            </td>
            <td class="col-md-4 tbl-title-bg">
              <div style="border-bottom:2px solid #3fa63b;height: 50%"><?php echo $reservation['description']; ?></div>
              <div style="height: 50%"><?php echo $reservation['resourceName']; ?></div>
            </td>
            <td class="col-md-1 tbl-logo-bg"> 
              <?php if ("right" == $reservation['arrowDirection']) { ?>
                <span class="glyphicon glyphicon-circle-arrow-right"></span>
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

<!-- /.container -->
<?php include_once 'template/footer.html.php'; ?>
