<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<style>
  #content{
    top: 100px;
    position: relative;
  }
  h1 { 
    color: #000;
    font-weight: bold;
    text-transform: uppercase;
    text-shadow: 0px 1px 0px rgba(255,255,255,.5); /* 50% white from bottom */
    width: calc(100% - 450px);
    display: inline-block;
  }
</style>
<div class="container-fluid" id='content'>
  <!-- Page Content -->
  <button id="basic-demo" class="waves-effect waves-button waves-light">Basic Demo</button>
  <div id="example" class="section page show appear flow row">
    <?php include_once 'sample_reservation.html.php'; ?>
  </div>  
</div>

<!-- /.container-fluid -->
<?php include_once 'footer.html.php'; ?>
