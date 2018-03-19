<footer>
  <div class="container-fluid">
    <h1 class="text-right engraved">
      The GrEEK CAMPUS
    </h1>
    <h1 class="text-right engraved">
      <small>Tech Valley in the heart of Cairo</small></h1>
  </div>
</footer>
<script>
  var touch = <?php print_r($config['touch'] ? "true" : "false"); ?>;
</script>
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