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
<?php if($config['touch']) { ?>
  <div class="text-center" 
       style="font-size: 2em;position: absolute; bottom: 10%; left: 20%;">
    <a href="touch"><span class="glyphicon glyphicon-home text-white" 
                          ></span></a>
  </div>
<?php } ?>
<!-- /.container-fluid -->
<?php include_once 'footer.html.php'; ?>
