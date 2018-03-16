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
<script>
  $(".mat-input").focus(function () {
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function () {
    if ($(this).val() === "")
      $(this).parent().removeClass("is-completed");
    $(this).parent().removeClass("is-active");
  })
</script>
<script>

  $('#search-me').keyboard({
    usePreview: false,
    acceptValid: true,
    validate: function (kb, val) {
        return val.length > 3;
    }
})
// activate the typing extension
.addTyping({
    showTyping: true,
    delay: 250
}).addExtender({
    layout: 'numpad',
    showing: false,
    reposition: true
});
</script>
</body>
</html>