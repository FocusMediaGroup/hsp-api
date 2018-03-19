<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<style>
  .left-col,
  .right-col {
    height: 350px;
    width: 350px;
  }
  .middle-col{
    width: calc(100% - 702px);
  }
  .box{
    height: 375px;
  }
  .right-col img{
    max-width: 348px;
  }
</style>
<div class="container-fluid content" >
  <!-- Page Content -->
  <button id="basic-demo" class="waves-effect waves-button waves-light">Basic Demo</button>
  <div id="content">
    <?php include_once 'roomAjax.html.php'; ?>
  </div>  
</div>
<?php if ($config['touch']) { ?>
  <div class="text-center page-icon" 
       style="font-size: 2em;position: fixed;
       left: 50%;
       bottom: 20px;
       transform: translate(-50%, -50%);
       margin: 0 auto;">
    <a href="touch"><span class="glyphicon glyphicon-home text-white" 
                          ></span></a>
  </div>
<?php } ?>
<!-- /.container-fluid -->
<?php include_once 'footer.html.php'; ?>
