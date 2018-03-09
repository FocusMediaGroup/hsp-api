<?php
foreach ($scripts as $script) {
  ?>
  <script src="<?php echo $script; ?>"></script>
  <?php
}
?>
<script type="text/javascript">
  Waves.attach('.btn', ['waves-button']);
  Waves.init();
</script>
<script>
// Prevent touch scroll
  document.body.addEventListener('touchmove', function (event) {
    event.preventDefault();
  }, false);
</script>
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