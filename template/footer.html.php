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
  $(function () {

    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];

    $('#search-me').keyboard({
      usePreview: false,
      autoAccept: true,
//      validate: function (kb, val) {
//        return val.length > 3;
//      },
    })
            .autocomplete({
    source: availableTags
  })
  .addAutocomplete({
    // add autocomplete window positioning
    // options here (using position utility)
    position: {
      of: '#results',
      my: 'center top',
      at: 'center top',
      collision: 'flip'
    }
  })
// activate the typing extension
            .addTyping({
              showTyping: true,
              delay: 250
            });

  });
</script>
</body>
</html>