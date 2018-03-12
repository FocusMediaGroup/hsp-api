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
<script>
  function clickIE() {
    if (document.all) {  //document.all specific to Internet Explorer  
      return false;
    }
  }
  function clickAll(e) {
    if (document.layers || (document.getElementById && !document.all)) {  //document.layers specific to Netscape
      if (e.which == 2 || e.which == 3) {
        return false;
      }
    }
  }
  if (document.layers) {
    document.captureEvents(Event.MOUSEDOWN);
    document.onmousedown = clickAll;
  } else {
    document.onmouseup = clickAll;
    document.oncontextmenu = clickIE;
  }

  document.oncontextmenu = new Function("return false")
</script>
</body>
</html>