<?php
foreach ($scripts as $script) {
  ?>
  <script src="<?php echo $script; ?>"></script>
  <?php
}
?>
<script>
  $('#basic-demo').click(function () {
    Snarl.addNotification({
      title: 'Custom Timeouts',
      text: 'This notification has an 8000ms timeout!',
      icon: '<span class="glyphicon glyphicon-time"></span>',
      timeout: 8000
    });
  });
</script>
</body>
</html>