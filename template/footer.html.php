<?php
foreach ($scripts as $script) {
  ?>
  <script src="<?php echo $script; ?>"></script>
  <?php
}
?>
<script>
  $(document).ready(function () {
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
  });

// Prevent touch scroll
  document.body.addEventListener('touchmove', function (event) {
    event.preventDefault();
  }, false);
</script>
</body>
</html>