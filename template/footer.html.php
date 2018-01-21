<footer class="footer">
  <div class="container-fluid">
    <h5 class=" pull-left"><?php echo date(TIME_FORMAT); ?></h5>
    <h5 class=" pull-right"><?php echo date(DATE_FORMAT); ?></h5>
  </div>
</footer>
<!-- jQuery Version 1.11.1 -->
<script src="js/jquery.js"></script>
<script src="js/jquery.fittext.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script>
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
</script>
</body>
</html>