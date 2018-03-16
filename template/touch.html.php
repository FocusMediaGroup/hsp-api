<?php
include_once 'head.html.php';
include_once 'header.html.php';
?>
<style>
  /*http://fian.my.id/Waves/#examples*/
  /*https://hoxxep.github.io/snarl/*/
</style>
<div class="container-fluid content">
  <!-- Page Content -->
  <div id="content">
    <div class="search-loader"></div>
  </div>
</div>
<!--<div class="line"></div>-->
<!--<div id="coords"></div>-->
<div id="results"></div>
<!-- Search-->
<div id="search">
  <div class="mat-div">
    <label for="search-me" class="mat-label">Search me</label>
    <input type="text" class="mat-input" id="search-me">
  </div>
</div>
<!-- /.Search-->
<img src="images/Hand-Touch-icon-black.png" alt=""
     id="touch-icon"
     width="100"
     style="opacity: 0.5;"
     />
<div class="row custom-btns hide">
  <div class="col-md-2">
    <button class="btn btn-block bg-orange">GrEEK</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-red">LIBRARY</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-yellow">WALLACE</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-green">FALAKI</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-blue">JAMEEL</button>
  </div>
  <div class="col-md-2">
    <button class="btn btn-block bg-grey"><i class="glyphicon glyphicon-home" ></i></button>
  </div>
</div>
<!-- /.container -->
<?php include_once 'footer.html.php'; ?>
