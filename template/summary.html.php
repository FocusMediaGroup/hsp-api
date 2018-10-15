<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<div class="container-fluid content">
  <!-- Page Content -->
  <!--<button id="basic-demo" class="waves-effect waves-button waves-light">Basic Demo</button>-->
  <div id="content">
    <?php include_once 'summaryAjax.html.php'; ?>
  </div>  
</div>
<!-- /.container-fluid -->
<?php if ($config['touch']) { ?>
  <div class="text-center page-icon">
    <a href="touch"><span class="glyphicon glyphicon-search text-white"></span></a>
  </div>
<?php } ?>
<?php include_once 'footer.html.php'; ?>
